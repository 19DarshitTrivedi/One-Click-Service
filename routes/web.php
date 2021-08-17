<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerIndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('customer.app');
// });

Route::get('/loginIndex',[LoginController::class,'index'])->name('login.index');
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::get('/logout',function(){
    Session::forget('user');
    return redirect('/login');
});
Route::get('/adminlogout',function(){
    Session::forget('admin');
    return redirect('/login');
});
Route::get('/providerlogout',function(){
    Session::forget('provider');
    return redirect('/login');
});
Route::get('/notAccess',function(){
    return view('notAccess');
});
Route::get('/register',[LoginController::class,'register'])->name('login.register');
Route::post('/registration', [LoginController::class,'registration'])->name('registration');
Route::post('/saveProvider', [ServiceProviderController::class,'save'])->name('save.provider');
Route::get('/',[CustomerIndexController::class,'index'])->name('customer.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['users'])->group(function () {
    Route::get('/add_to_cart',[CustomerIndexController::class,'cart'])->name('customer.cart');
    Route::get('/cartList',[CustomerIndexController::class,'cartList'])->name('cart.list');
    Route::get('/orderList',[CustomerIndexController::class,'orderList'])->name('order.list');
    Route::get('/givenOrders',[CustomerIndexController::class,'orders'])->name('orders');
    Route::get('/cancelOrder/{id}',[CustomerIndexController::class,'cancelOrder'])->name('cancel.order');
    Route::post('/orderPlace', [CustomerIndexController::class,'orderPlace'])->name('place.order');
    Route::get('/cart_delete/{id}',[CustomerIndexController::class,'cartDelete'])->name('cart.delete');
    Route::get('/listServices/{id}',[CustomerIndexController::class,'listService'])->name('customer.sub_service');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/orders', [AdminController::class,'list'])->name('admin.order');
    Route::get('/admin/assign',[AdminController::class,'assignToProvider'])->name('admin.assign');
    Route::get('/admin/provider',[AdminController::class,'provider'])->name('admin.provider');
    Route::get('/admin/users',[AdminController::class,'user'])->name('admin.users');
    Route::get('/user/status', [AdminController::class,'userStatusChange'])->name('user.status');

    Route::get('/service/create', [ServiceController::class,'index'])->name('service.create');
    Route::get('/services/list', [ServiceController::class,'list'])->name('service.list');
    Route::get('/services/edit/{id}', [ServiceController::class,'edit'])->name('service.edit');
    Route::post('/services/update', [ServiceController::class,'update'])->name('service.update');
    Route::get('/services/delete', [ServiceController::class,'delete'])->name('service.delete');
    Route::post('/services/status', [ServiceController::class,'statusChange'])->name('toggle.status');
    Route::post('/service/save', [ServiceController::class,'store'])->name('service.save');
});

Route::middleware(['provider'])->group(function () {
    Route::get('/provider/index', [ServiceProviderController::class,'index'])->name('provider.index');
    Route::get('/provider/completeOrder/{id}', [ServiceProviderController::class,'completeOrder'])->name('complete.order');
});