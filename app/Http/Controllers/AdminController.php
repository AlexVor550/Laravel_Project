<?php

namespace App\Http\Controllers;
use App\Models\ContactUs;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Получаем все товары
        $filteredProducts = Product::all();
        return view('admin.admin',compact('filteredProducts'));
    }
    public function view(Request $request)
    {
        // Получаем все товары
        $filteredProducts = Product::all();
        $contact=ContactUs::all();

        return view('admin.view',compact('filteredProducts','contact'));
    }
}