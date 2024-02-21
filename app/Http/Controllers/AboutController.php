<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('products.about_us');
    }
    public function contact()
    {

        return view('products.contact');
    }
    public function view()
    {
        $contact=ContactUs::all();
        return view('admin.view',compact('contact'));
    }
    public function store(Request $request)
    {
        // Проверка данных из формы
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
            
        ]);

        // Создание нового товара и сохранение в базу данных
        $contact = new ContactUs;
        $contact->name = $validatedData['name'];
        $contact->email = $validatedData['email'];
        $contact->subject = $validatedData['subject'];
        $contact->message = $validatedData['message'];
        

        $contact->save();

        // Перенаправление с сообщением об успешном создании товара
        return redirect()->route('product.index')->with('success', 'Товар успешно создан');
    }
}