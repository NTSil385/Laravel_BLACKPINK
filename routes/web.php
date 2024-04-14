<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;


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
//     return view('home');
// });
Route::get("/",[HomeController::class, 'showLanding'])->name("home");

Auth::routes();
// Route User
Route::middleware(['auth','user-role:user'])->group(function()
{
   
    Route::get("/shopping",[HomeController::class, 'showAllProducts'])->name("home.shopping");
    Route::get("/shopping/{id}",[HomeController::class, 'showProductDetail'])->name("home.details");
});
// Route Admin
Route::middleware(['auth','user-role:admin'])->group(function()
{
    Route::get("/authen",[AdminController::class, 'adminHome'])->name("admin.home");

     //Add category
    Route::get('/create-category', [AdminController::class, 'createCategory'])->name('category.create');
    Route::post('/store-category', [AdminController::class, 'storeCategory'])->name('category.store');

    //Product
    Route::get('/product-show',[AdminController::class, 'showProduct'])->name('product.all');
    Route::get('/create-product', [AdminController::class, 'createProduct'])->name('product.create');
    Route::post('/store-product', [AdminController::class, 'storeProduct'])->name('product.store');

    Route::get('/edit-product/{id}',[AdminController::class, 'editProduct'])->name('product.edit');
    Route::post('/update-product/{id}',[AdminController::class, 'updateProduct'])->name('product.update');

    Route::get('delete-product/{id}',[AdminController::class,'deleteProduct'])->name('product.delete');

    //User
    Route::get('/users-show',[AdminController::class, 'showUsers'])->name('users.all');
    Route::get('/edit-users/{id}',[AdminController::class, 'editUsers'])->name('users.edit');
    Route::post('/update-users/{id}',[AdminController::class, 'updateUsers'])->name('users.update');
    
    Route::get('delete-users/{id}',[AdminController::class,'deleteUsers'])->name('users.delete');

});
