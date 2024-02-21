<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    // Получение всех товаров из базы данных
    $product= Product::find(1);
    dd($product->category);

    // Передача данных в представление и вывод
    return view('category.index', compact('product'));
    }
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Проверка данных из формы
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
    
        // Создание нового товара и сохранение в базу данных
        $category = new Category;
        $category->name = $validatedData['name'];
        $category->save();

    
        // Перенаправление с сообщением об успешном создании товара
        return redirect()->route('category.index')->with('success', 'Товар успешно создан');
    }

    public function edit($id)
    {
        // Получение товара по его идентификатору
        $category = Category::find($id);
    
        // Проверка, найден ли товар
        if (!$category) {
            abort(404, 'Товар не найден');
        }
    
        // Передача данных о товаре в представление
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Получение товара по его идентификатору
        $category = Category::find($id);
    
        // Проверка, найден ли товар
        if (!$category) {
            abort(404, 'Товар не найден');
        }
    
        // Валидация данных из формы
            $request->validate([
            'name' => 'required|max:255'
        ]);
    
        // Обновление данных товара
        $category->update([
            'name' => $request->input('name')
        ]);
        dd('create');
    }
    
    public function delete($id)
    {
        $category=Category::withTrashed()->find($id);
        $category->restore(); 
        return redirect()->route('category.index', $id)->with('success', 'Товар успешно востановлен');
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect()->route('category.index', $id)->with('success', 'Товар успешно обновлен');
    }
}