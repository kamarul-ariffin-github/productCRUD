<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/addproduct', [HomeController::class, 'addProduct'])->middleware('auth')->name('addproduct');
Route::get('/productdetails/{id}', [HomeController::class, 'productDetails'])->middleware('auth')->name('productdetails');
Route::get('/editproduct/{id}', [HomeController::class, 'editProduct'])->middleware('auth');
Route::post('/create_product', [HomeController::class, 'create_product'])->middleware('auth');
Route::get('/delete_product/{id}', [HomeController::class, 'delete_product'])->middleware('auth');
Route::post('/update_product/{id}', [HomeController::class, 'update_product'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
