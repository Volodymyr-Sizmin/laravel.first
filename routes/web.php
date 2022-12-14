<?php

use App\Services\UserInfoHtml;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
//    dd(route('admin.dashboard'));
    return view('welcome');
});

Route::get('test', function(UserInfoHtml $info) {
    dd($info->generate());
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function ()
{
    Route::get('dashboard',\App\Http\Controllers\Admin\DashboardController::class)->name('dashboard');

    Route::resource('categories', \App\Http\Controllers\Admin\CategoriesController::class)->except(['show']);
    Route::resource('products', \App\Http\Controllers\Admin\ProductsController::class)->except(['show']);
});

