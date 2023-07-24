<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RowController;
use App\Http\Controllers\sizeController;
use App\Http\Controllers\teamController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth:sanctum','chackAdminForDashbord'])->group(function () {

//ourteam
Route::get('ourteam', [teamController::class, "ourteam"])->name('ourteam');

//product
Route::get('/dashboard', [ProductController::class, "show_product"])
->middleware(['auth', 'verified'])->name('dashboard');
Route::get('softDeleteProduct/{id}', [ProductController::class, "softDelete"])->name('softDeleteProduct');
Route::get('pageAddProduct', [ProductController::class, "pageAddProduct"])->name('pageAddProduct');
Route::post('creatProduct', [ProductController::class, "creat_product"])->name('creatProduct');
Route::get('pageEditProduct/{id}', [ProductController::class, "pageEditProduct"])->name('pageEditProduct');
Route::post('editProduct/{id}', [ProductController::class, "edit_product"])->name('editProduct');

//category
Route::get('showcategory', [CategoryController::class, "showcategory"])->name('showcategory');
Route::get('pageaddcategory', [CategoryController::class, "pageaddcategory"])->name('pageaddcategory');
Route::get('pageeditcategory/{id}', [CategoryController::class, "pageeditcategory"])->name('pageeditcategory');
Route::post('create_category', [CategoryController::class, "create_category"])->name('create_category');
Route::post('edit_category/{id}', [CategoryController::class, "edit_category"])->name('edit_category');
Route::get('softDeleteCategory/{id}', [CategoryController::class, "softDelete"])->name('softDeleteCategory');

//rows
Route::get('showrows', [RowController::class, "showrows"])->name('showrows');
Route::post('create_row', [RowController::class, "create_row"])->name('create_row');
Route::post('edit_row/{id}', [RowController::class, "edit_row"])->name('edit_row');
Route::get('soft_delete_row/{id}', [RowController::class, "soft_delete_row"])->name('soft_delete_row');

//size
Route::get('show_size', [sizeController::class, "show_size"])->name('show_size');
Route::post('create_size', [sizeController::class, "create_size"])->name('create_size');
Route::post('edit_size/{id}', [sizeController::class, "edit_size"])->name('edit_size');
Route::get('soft_delete_size/{id}', [sizeController::class, "soft_delete_size"])->name('soft_delete_size');

}); //end group middleware









// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
