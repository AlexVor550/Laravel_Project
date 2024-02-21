<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FavoriteProducts;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Получаем параметры фильтрации из запроса
        $priceRange = $request->input('price');
        $color = $request->input('color');
        $sizes = $request->input('size');
        $category = $request->input('category');
    
        // Получаем все товары
        $products = Product::query();
        $categories = Category::all();
    
        // Применяем фильтр по цене, если указан
        if ($priceRange) {
            $price = explode('-', $priceRange);
            $products->whereBetween('price', [$price[0], $price[1]]);
        }
        if ($color) {
            $products->where('color', $color);
        }
        if ($category) {
            $products->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        }
        if ($sizes) {
            $products->where('size', $sizes);
        }
        
        // Получение отфильтрованных продуктов
        $products = $products->get();
    
        // Передача данных в представление и вывод
        return view('products.index', compact('products'));
    }
    
    
    public function create()
    {
        $categories = Category::all(); // Получаем все категории

        return view('products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Проверка данных из формы
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|max:255',
            'color' => 'required|max:255',
            'stock_quantity' => 'required|integer',
            'image' => 'required|url',
            'category_id' => 'required|exists:categories,id', // Добавлено правило для проверки существования категории
        ]);

        // Создание нового товара и сохранение в базу данных
        $product = new Product;
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->size = $validatedData['size'];
        $product->color = $validatedData['color'];
        $product->stock_quantity = $validatedData['stock_quantity'];
        $product->image = $validatedData['image'];
        $product->category_id = $validatedData['category_id'];

        $product->save();

        // Перенаправление с сообщением об успешном создании товара
        return redirect()->route('product.index')->with('success', 'Товар успешно создан');
    }


    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view(('products.show'), ['product' => $product]);
    }

    public function edit($id)
    {
        // Получение товара по его идентификатору
        $product = Product::find($id);
        $categories = Category::all();

        // Проверка, найден ли товар
        if (!$product) {
            abort(404, 'Товар не найден');
        }

        // Передача данных о товаре в представление
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Получение товара по его идентификатору
        $product = Product::find($id);
        
        // Проверка, найден ли товар
        if (!$product) {
            abort(404, 'Товар не найден');
        }

        // Валидация данных из формы
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric',
            'size' => 'required|max:255',
            'color' => 'required|max:255',
            'stock_quantity' => 'required|integer',
            'image' => 'required|url',
            'category_id' => 'required|exists:categories,id'
        ]);

        // Обновление данных товара
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'size' => $request->input('size'),
            'color' => $request->input('color'),
            'stock_quantity' => $request->input('stock_quantity'),
            'image' => $request->input('image'),
            'category_id' => $request->input('category_id'),
        ]);
        

        // Возвращение на страницу с обновленными данными
        return redirect()->route('admin.product.index', $id)->with('success', 'Товар успешно обновлен');
    }
    public function storeRating(Request $request, $id)
    {
        // Находим товар по его идентификатору
        $product = Product::findOrFail($id);
        
        // Получаем оценку из отправленной формы
        $rating = $request->input('rating');
    
        // Сохраняем оценку в связанную модель или в отдельную таблицу
        $product->update([
            'rating' => $request->input('rating'),
        ]);
    
        // Перенаправляем пользователя назад на страницу товара
        return redirect()->route('product.show', $product->id)->with('success', 'Спасибо за вашу оценку!');
    }

    public function favorite(Request $request)
    {
        $favorites=FavoriteProducts::with('product')->get();
    
        // Передача данных в представление и вывод
        return view('products.favorite_product', compact('favorites'));
    }
    public function favoriteAdd(Request $request)
    {
        $productId = $request->productId;
    
        // Проверка, существует ли уже такой товар в корзине
        $existingItem = FavoriteProducts::where('product_id', $productId)->first();
        if(!$existingItem) {
            // Если товара еще нет в корзине, добавляем новый элемент корзины
            FavoriteProducts::create([
                'product_id' => $productId
            ]);
        }
        return redirect()->back()->with('success', 'Товар успешно добавлен.');
    }
    public function removeFromFavorite(Request $request)
    {
        // Получение ID элемента корзины для удаления
        $itemId = $request->itemId;
    
        // Поиск элемента корзины по его ID и удаление
        FavoriteProducts::destroy($itemId);
    
        return redirect()->back()->with('success', 'Товар успешно удален из корзины.');
    }


    public function delete($id)
    {
        $product = Product::withTrashed()->find($id);
        $product->restore();
        return redirect()->route('product.index', $id)->with('success', 'Товар успешно востановлен');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('product.index', $id)->with('success', 'Товар успешно обновлен');
    }
}
