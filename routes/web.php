<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Auth;

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
//     // return view('home.index');
// });

Auth::routes();
Route::get('/login-register', ['as'=>'login','uses'=> 'App\Http\Controllers\UserController@loginRegister']);
Route::post('/login', [App\Http\Controllers\UserController::class, 'loginUser']);
// Route::post('/register', [App\Http\Controllers\UserController::class, 'registerUser']);
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logoutUser']);


Route::group(['middleware'=>['auth']],function(){

    Route::get('/dashboard', function () {
        return view('home.index');
    });
    // Route::get('/user/account',[App\Http\Controllers\UserController::class, 'account']);
    Route::get('/clinic-edit/{id}',[App\Http\Controllers\UserController::class, 'editInstitution']);
    Route::delete('/clinic-delete/{id}',[App\Http\Controllers\UserController::class, 'deleteInstitution']);
    // Route::get('/clinic-delete/{id}',[App\Http\Controllers\UserController::class, 'deleteInstitution']);
    Route::post('/user/account',[App\Http\Controllers\UserController::class, 'account']);
    Route::get('/add-clinic',[App\Http\Controllers\UserController::class, 'addClinic']);
    Route::get('/list-clinic',[App\Http\Controllers\UserController::class, 'listClinic']);
    Route::post('/save-institution',[App\Http\Controllers\UserController::class, 'saveInstitution']);

    Route::put('update-institution/{id}',[App\Http\Controllers\UserController::class, 'updateInstitution']);


   

});

