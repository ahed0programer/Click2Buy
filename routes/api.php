<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\api\commentEvaluationController;
use App\Http\Controllers\api\deliveryCompanyController;
use App\Http\Controllers\api\detailsProductController;
use App\Http\Controllers\api\filterController;
use App\Http\Controllers\api\orderController;
use App\Http\Controllers\api\productCategoryController;
use App\Http\Controllers\api\productHomeController;
use App\Http\Controllers\api\serchController;
use App\Http\Controllers\api\topBarController;
use App\Http\Controllers\api\userController;
use App\Http\Controllers\api\wishListController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\superAdminController;
use App\Models\wishList;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



//Category
Route::get('getcategory', [productCategoryController::class, "getcategory"]);

//productcategory
Route::get('productcategory/{id}', [productCategoryController::class, "productcategory"]);



//row_product_home
Route::get('row_product', [productHomeController::class, "row_product"]);
// Route::get('see_more_row_product/{row_id}', [productHomeController::class, "see_more_row_product"]);


//details_product
Route::get('details_product/{id}', [detailsProductController::class, "details_product"]);



//super Admin
// Route::post('add_new_account', [superAdminController::class, "add_new_account"]);
// Route::post('edit_account/{id}', [superAdminController::class, "edit_account"]);
// Route::get('show_account_user', [superAdminController::class, "show_account_user"]);
// Route::delete('delete_account/{id}', [superAdminController::class, "delete_account"]);
// Route::post('add_size', [superAdminController::class, "add_size"]);


//filter
Route::get('filter_elements', [filterController::class, "filter_elements"]);
Route::get('search_filter', [filterController::class, "search_filter"]);


//deliveryCompany
Route::get('deliveryCompany', [deliveryCompanyController::class, "deliveryCompany"]);
Route::get('deliveryCompanyaddress/{id}', [deliveryCompanyController::class, "deliveryCompanyaddress"]);

//quantity_inventory
Route::get('quantity_inventory', [orderController::class, "quantity_inventory"]);


//top_bar
Route::get('get_photo_top_bar', [topBarController::class, "get_photo_top_bar"]);


// group middleware
Route::middleware(['auth:sanctum','verified'])->group(function () {

    //admin
    Route::post('edit_profile', [AdminController::class, "edit_profile"]);

    //comment
    Route::post('add_comment/{product_id}', [CommentController::class, "add_comment"]);
    Route::post('edit_comment/{comment_id}', [CommentController::class, "edit_comment"]);
    Route::delete('soft_delete_comment/{comment_id}', [CommentController::class, "soft_delete_comment"]);

    //evaluation
    Route::post('add_evaluation/{product_id}', [EvaluationController::class, "add_evaluation"]);
    Route::post('edit_evaluation/{evaluation_id}', [EvaluationController::class, "edit_evaluation"]);
    Route::delete('soft_delete_evaluation/{evaluation_id}', [EvaluationController::class, "soft_delete_evaluation"]);



    //comment and evaluation
    Route::post('add_edit_comment_evaluation/{product_id}', [commentEvaluationController::class, "add_edit_comment_evaluation"]);
    // Route::post('edit_comment_evaluation/{evaluation_id}/{comment_id}', [commentEvaluationController::class, "edit_comment_evaluation"]);
    Route::get('get_user_comment_evaluation/{id}', [commentEvaluationController::class, "get_user_comment_evaluation"]);




    //profile
    Route::get('profile', [ProfileController::class, "profile"]);

    //order
    Route::get('order_user', [orderController::class, "order_user"]);
    Route::post('add_order', [orderController::class, "add_order"]);
    Route::post('update_order/{id}', [orderController::class, "update_order"]);


    //wishList
    Route::get('show_wish_list', [wishListController::class, "show_wish_list"]);
    Route::post('add_wish_list/{product_id}', [wishListController::class, "add_wish_list"]);
    Route::delete('delete_wish_list/{wish_list_id}', [wishListController::class, "delete_wish_list"]);


    //user
    Route::post('edit_name_phone', [userController::class, "edit_name_phone"]);
    Route::post('edit_password', [userController::class, "edit_password"]);
    Route::post('check_password', [userController::class, "check_password"]);

}); //end group middleware


Route::get('send-notification', [OtpController::class, "send_notification"]);

require __DIR__ . "/auth_api.php";

require __DIR__ . "/product.php";
