<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Spatie\Permission\Contracts\Role;

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

// Route::get('/', function () {
//     return view('welcome');
// });

////////////////////l Register && login //////////////
Route::get('/register',[AuthController::class, 'register']);

Route::post('/create_account',[AuthController::class, 'create_account']);

Route::get('/login',[AuthController::class, 'login_page']);

Route::post('/login_into',[AuthController::class, 'login']);

Route::post('/logout',[AuthController::class, 'logout']);




Route::get('/',[CategoryController::class, 'index']);


Route::get('/category',[CategoryController::class, 'category']);

Route::get('/inputCategory',[CategoryController::class, 'ajouter']);

Route::post('/ajouter/category',[CategoryController::class, 'ajouter_categories']);

Route::get('/updateCategory/{id}',[CategoryController::class, 'fetch_categories']);

Route::post('/update/category',[CategoryController::class, 'update_categories']);

Route::get('/deleteCategory/{id}',[CategoryController::class, 'delete_categories']);

//////////////////// Products /////////////////

Route::get('/products',[ProductsController::class, 'product']);  

Route::get('/inputProduct',[ProductsController::class, 'ajouter']);

Route::post('/ajouter/product',[ProductsController::class, 'ajouter_Product']);

Route::get('/deleteProduct/{id}', [ProductsController::class, 'delete_product']);

Route::get('/updateProduct/{id}',[ProductsController::class, 'fetch_all']);

Route::post('/update/product',[ProductsController::class, 'update_product']);

///////////////////// Role ///////////////////////

Route::get('Role',[RoleController::class,'afficher_role']);

Route::get('inputRole',[RoleController::class,'ajouter']);

Route::post('/ajouter/Role',[RoleController::class,'ajouter_role']);

Route::get('/deleteRole/{id}',[RoleController::class,'delete_role']);

Route::get('/updateRole/{id}',[RoleController::class, 'fetch_Role']);

Route::post('/update/Role',[RoleController::class,"update_Role"]);


////////////////// Users ///////////////////////

Route::get('user',[UserController::class,'afficher_user']);

Route::get('inputUser',[UserController::class,'ajouter']);

Route::post('/ajouter/user',[UserController::class,'ajouter_User']);

Route::get('/deleteUser/{id}',[UserController::class,'deleteUser']);

Route::get('/updateUser/{id}',[UserController::class,'fetch_User']);

Route::post('/update/user',[UserController::class,'update_user']);

