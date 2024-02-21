<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function viewCart()
    {
        // Получение всех товаров в корзине
        $cartItems = CartItem::with('product')->get();
        
        // Вычисление суммы всех товаров в корзине
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->product->price * $item->quantity;
        }
    
        // Передача данных о корзине и общей сумме в представление
        return view('cart.view', compact('cartItems', 'totalPrice'));
    }

    public function addToCart(Request $request)
    {
        // Получение ID товара для добавления в корзину
        $productId = $request->productId;
    
        // Проверка, существует ли уже такой товар в корзине
        $existingItem = CartItem::where('product_id', $productId)->first();
    
        if ($existingItem) {
            // Если товар уже есть в корзине, увеличиваем его количество
            $existingItem->update([
                'quantity' => $existingItem->quantity + 1
            ]);
        } else {
            // Если товара еще нет в корзине, добавляем новый элемент корзины
            CartItem::create([
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }
    
        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину.');
    }
    

    public function removeFromCart(Request $request)
    {
        // Получение ID элемента корзины для удаления
        $itemId = $request->itemId;
    
        // Поиск элемента корзины по его ID и удаление
        CartItem::destroy($itemId);
    
        return redirect()->back()->with('success', 'Товар успешно удален из корзины.');
    }

    public function updateCartItem(Request $request)
{
    $itemId = $request->itemId;
    $cartItem = CartItem::findOrFail($itemId);

    if ($request->has('decrease')) {
        // Уменьшение количества товара на один
        if ($cartItem->quantity > 1) {
            $cartItem->update(['quantity' => $cartItem->quantity - 1]);
        }
    } elseif ($request->has('increase')) {
        // Увеличение количества товара на один
        $cartItem->update(['quantity' => $cartItem->quantity + 1]);
    }

    return redirect()->back();
}

public function checkout(Request $request)
{
    // Создание нового заказа
    $order = new Order();
    $order->save();

    // Получение товаров из корзины
    $cartItems = CartItem::all();

    // Привязка товаров к заказу и очистка корзины
    foreach ($cartItems as $cartItem) {
        $cartItem->order_id = $order->id;
        $cartItem->save();
    }

    CartItem::truncate(); // Очистка корзины

    return redirect()->back()->with('success', 'Заказ успешно оформлен.');
}
public function viewOrders()
{
    // Получение всех заказов из базы данных с информацией о товарах
    $orders = Order::with('items.product')->orderBy('created_at', 'desc')->get();

    // Передача данных о заказах в представление для отображения
    return view('cart.order', compact('orders'));
}


    // public function checkout_data()
    // {
    //     // Получение всех товаров в корзине
    //     $cartItems = CartItem::with('product')->get();
        
    //     // Вычисление суммы всех товаров в корзине
    //     $totalPrice = 0;
    //     foreach ($cartItems as $item) {
    //         $totalPrice += $item->product->price * $item->quantity;
    //     }
    //     return view('cart.checkout',compact('cartItems', 'totalPrice'));
    // }
    
    //     public function store(Request $request)
    // {
    //     // Проверка данных из формы
    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'lastname' => 'required|max:255',
    //         'description' => 'required',
    //         'price' => 'required|numeric',
    //         'size' => 'required|max:255',
    //         'color' => 'required|max:255',
    //         'stock_quantity' => 'required|integer',
    //         'image' => 'required|url',
    //         'category_id' => 'required|exists:categories,id', // Добавлено правило для проверки существования категории
    //     ]);

    //     // Создание нового товара и сохранение в базу данных
    //     $product = new Product;
    //     $product->name = $validatedData['name'];
    //     $product->description = $validatedData['description'];
    //     $product->price = $validatedData['price'];
    //     $product->size = $validatedData['size'];
    //     $product->color = $validatedData['color'];
    //     $product->stock_quantity = $validatedData['stock_quantity'];
    //     $product->image = $validatedData['image'];
    //     $product->category_id = $validatedData['category_id'];

    //     $product->save();

    //     // Перенаправление с сообщением об успешном создании товара
    //     return redirect()->route('product.index')->with('success', 'Товар успешно создан');
    // }
    }

