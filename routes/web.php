<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\DashboardCrontroller;
use App\Http\Controllers\LoginCrontroller;
use App\Http\Controllers\SignupCrontroller;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Routing\RouteGroup;
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

Route::get('/login', [LoginCrontroller::class,'index'])->name('login');

Route::post('/verify-login', [LoginCrontroller::class,'verify_login'])->name('verify-login');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginCrontroller::class,'logout'])->name('logout');
    Route::get('/', [DashboardCrontroller::class,'index'])->name('home');
    Route::get('/user-dashboard', [DashboardCrontroller::class,'user_dashboard'])->name('user-dashboard');
    Route::get('/create-catalog/{id}/{parent_id}', [CatalogController::class,'create_page']);
    Route::get('/edit-catalog/{id}/{catalog_name}', [CatalogController::class,'edit_page']);
    Route::get('/delete-catelog/{id}', [CatalogController::class,'delete']);
    Route::post('/create-catelog-form', [CatalogController::class,'create'])->name('create-catelog-form');
    Route::post('/edit-catelog-form', [CatalogController::class,'edit'])->name('edit-catelog-form');
    Route::get('/admin-dashboard', [DashboardCrontroller::class,'admin_dashboard'])->name('admin-dashboard');
});
