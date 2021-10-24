<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
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

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard1', function () {
        return view('dashboard1');
    });
    Route::get('/dashboard', [PostController::class, 'index']);
    Route::get('/categories/{category}', [PostController::class, 'PostCategory']);
    Route::get('/users', [PostController::class, 'Users']);
    Route::get('/users/{id}', [PostController::class, 'UserPostCategory']);
    Route::get('/post', [PostController::class, 'create']);
    Route::post('/post', [PostController::class, 'store']);

    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/createcategory', [CategoryController::class, 'create']);
    Route::post('/createcategory', [CategoryController::class, 'store']);

});

    Route::get('/register', [AuthController::class, 'registration'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/verification/{user}/{token}', [AuthController::class, 'verification']);
    Route::get('/logout', [AuthController::class, 'logout']);
    //Route::get('/', [AuthController::class, 'homepage'])->name('home');
    Route::get('/change_password', [AuthController::class, 'forget_password']);

