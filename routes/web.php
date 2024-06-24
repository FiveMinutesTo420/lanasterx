<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/about', function(){
    return view('about');
})->name('about');
Route::get('/master-course', function(){
    $mal = Product::where('category_id',1)->get();
    $sum = Product::where('category_id',2)->get();
    $aks = Product::where('category_id',3)->get();

    return view('master',compact('mal','sum','aks'));
})->name('master-course');
Route::get('/contacts', function(){
    return view('contacts');
})->name('contacts');

Route::get('/auth', AuthController::class)->name('auth');
Route::get('/register', RegController::class)->name('register');
Route::post('/auth', [AuthController::class, 'store'])->name('auth.store');
Route::post('/register', [RegController::class, 'store'])->name('register.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/zapis',[HomeController::class,'zapis'])->name('zapis');
Route::post('/zapis',[HomeController::class,'zapisAdd'])->name('zapis.add');

Route::prefix('catalog')->group(function () {
    Route::get('/category/{category}', [ProductController::class, 'showCategory'])->name('category');
    Route::get('/',[ProductController::class,'showCatalog'])->name('catalog');

    Route::get('/{category}/{item}', ProductController::class)->name('product');
});
//Роуты только для авторизованных пользователей
Route::middleware(['auth'])->group(function () {
    //Корзина
    Route::post('/addToCart/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'page'])->name('cart.page');
    Route::delete('/cart/{cart}', [CartController::class, 'delete'])->name('cart.delete');
    Route::post('/cart/{cart}', [CartController::class, 'changeAmount'])->name('cart.changeAmount');
    Route::post('/cart/make/order', [CartController::class, 'makeOrder'])->name('cart.makeOrder');
    //Заказы
    Route::get('/orders', OrderController::class)->name('order');
    Route::post('/order/cancel/{order}', [OrderController::class, 'cancel'])->name('cancel.order');
});
//Роуты только для администраторов

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', AdminController::class)->name('admin');
    //Изменить пользователя
    Route::get('/user/{user?}', [AdminController::class, 'user'])->name('admin.user');
    Route::post('/user/{user?}', [AdminController::class, 'user'])->name('admin.user');
    Route::delete('/user/{user?}', [AdminController::class, 'user'])->name('admin.user');



    //Изменить бренд
    Route::get('/brand/{brand?}', [AdminController::class, 'brand'])->name('admin.brand');
    Route::post('/brand/{brand?}', [AdminController::class, 'brand'])->name('admin.brand');
    Route::delete('/brand/{brand?}', [AdminController::class, 'brand'])->name('admin.brand');



    //Изменить категорию
    Route::get('/category/{category?}', [AdminController::class, 'category'])->name('admin.category');
    Route::post('/category/{category?}', [AdminController::class, 'category'])->name('admin.category');
    Route::delete('/category/{category?}', [AdminController::class, 'category'])->name('admin.category');

    //--------ПРОДУКТЫ------------
    //Добавить продукт
    Route::get('/add/product', [AdminController::class, 'addProduct'])->name('admin.product.add');
    Route::post('/add/product', [AdminController::class, 'addProduct'])->name('admin.product.add');

    //Изменить продукт
    Route::get('/change/product/{product}', [AdminController::class, 'changeProduct'])->name('admin.product.change');
    Route::post('/change/product/{product}', [AdminController::class, 'changeProduct'])->name('admin.product.change');
    //Удалить продукт
    Route::delete('/delete/product/{product}', [AdminController::class, 'deleteProduct'])->name('admin.product.delete');
});