<?php

use App\Http\Controllers\manageUserController;
use App\Http\Controllers\updateProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/insertproduct', [App\Http\Controllers\insertProductController::class, 'insertProd'])->name('insertproduct');
Route::post('/insert', [App\Http\Controllers\insertProductController::class, 'create'])->name('insert');
// Route::post('/validateinsert', [App\Http\Controllers\insertProductController::class, 'validator'])->name('validator');
Route::get('/productdetail/{id}', [App\Http\Controllers\productDetailController::class, 'detailTrans']);
Route::get('/updateprofile', [App\Http\Controllers\updateProfileController::class, 'updateProfile'])->name('updateprofile');
Route::post('/updateProfile', [App\Http\Controllers\updateProfileController::class, 'create']);
Route::get('/manageuser', [manageUserController::class, 'list'])->name('manageuser');
Route::get('/delete/{id}', [manageUserController::class, 'delete']);
Route::get('/updateproduct/{id}', [App\Http\Controllers\updateProductController::class, 'updateProduct']);
Route::post('/update', [App\Http\Controllers\updateProductController::class, 'update'])->name('update');
Route::post('/addCart', [App\Http\Controllers\cartController::class, 'addCart']);
// Route::post('/addCart', [App\Http\Controllers\cartController::class, 'checkout']);
Route::get('/viewCart', [App\Http\Controllers\cartController::class, 'viewCart'])->name('viewCart');
Route::get('/deleteCart/{id}', [App\Http\Controllers\cartController::class, 'deleteCart']);
Route::post('/checkout', [App\Http\Controllers\cartController::class, 'checkout'])->name('checkout');
Route::get('/searchPage', [App\Http\Controllers\searchController::class, 'searchPage'])->name('searchPage');


 Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', function () {
        // return view('admin.dashboard');
        return "This is Admin";
     });
 });
