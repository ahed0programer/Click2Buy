<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\orderwebController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RowController;
use App\Http\Controllers\sizeController;
use App\Http\Controllers\teamController;
use App\Http\Controllers\TopBarController;
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

Route::get('deleteInventory/{id}',[ProductController::class, "delete_inventory"])->name('deleteInventory');
Route::post('addInventory-To-Product/{id}',[ProductController::class, "add_inventory"])->name('addInventory');
Route::post('updateInventory-Of-Product/{id}',[ProductController::class, "update_inventory"])->name('update_inventory');

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


//order
Route::get('show_order', [orderwebController::class, "show_order"])->name('show_order');
Route::get('show_status_order/{status}', [orderwebController::class, "show_status_order"])->name('show_status_order');
Route::get('details_order/{id}', [orderwebController::class, "details_order"])->name('details_order');
Route::get('processing_order/{id}', [orderwebController::class, "processing_order"])->name('processing_order');

//top_bar
Route::get('show', [TopBarController::class, "show"])->name('top_bar');
Route::post('add_photo_top_bar', [TopBarController::class, "add_photo_top_bar"])->name('add_photo_top_bar');
Route::get('soft_delete_photo_top_bar/{id}', [TopBarController::class, "soft_delete_photo_top_bar"])->name('soft_delete_photo_top_bar');


}); //end group middleware

Route::get('delivered_order/{id}', [orderwebController::class, "delivered_order"])->name('delivered_order');






// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
