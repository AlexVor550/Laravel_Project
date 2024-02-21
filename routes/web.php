<?php
use App\Http\Controllers\Home;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

// Manager Routes

Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/dashboard', [HomeController::class, 'managerDashboard'])->name('manager.dashboard');
});

// Super Admin Routes

Route::middleware(['auth', 'user-access:super-admin'])->group(function () {

    Route::get('/super-admin/dashboard', [HomeController::class, 'superAdminDashboard'])->name('super.admin.dashboard');
});

Route::group(['namespace' => 'Product'], function () {
    Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
    Route::delete('/product/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/{id}/restore', [App\Http\Controllers\ProductController::class, 'delete']);
    Route::patch('/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
    Route::get('/product/{id}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.rating');
    Route::post('/product/{id}', [App\Http\Controllers\ProductController::class, 'storeRating'])->name('product.show');
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

    Route::get('/favorite', [App\Http\Controllers\ProductController::class, 'favorite'])->name('product.favorite');
    Route::post('/favorite/add', [App\Http\Controllers\ProductController::class, 'favoriteAdd'])->name('favorite.add');
    Route::post('/favorite/remove', [App\Http\Controllers\ProductController::class, 'removeFromFavorite'])->name('favorite.remove');

    Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
});
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [App\Http\Controllers\AboutController::class, 'contact'])->name('contact');
Route::post('/contact', [App\Http\Controllers\AboutController::class, 'store'])->name('contact.store');

Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
Route::get('/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');


Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.product.index');
    Route::get('/contact/view', [App\Http\Controllers\AdminController::class, 'view'])->name('admin.view.index');
});

Route::group(['namespace' => 'Cart'], function () {
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'viewCart'])->name('cart.index');
    Route::get('/cart/order', [App\Http\Controllers\CartController::class, 'viewOrders'])->name('cart.order');
    Route::post('/cart/add', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'updateCartItem'])->name('cart.update');
    Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');

});







Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
