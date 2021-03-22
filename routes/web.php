<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;

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
Route::get('/', function(){
    if((!auth()->user())){
        return redirect()->route('login');
    }
    
    return redirect()->route('home');
});


Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');

Route::post('/login',[LoginController::class,'login']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/logout',[LoginController::class,'logout'])->name('logout');

Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class);