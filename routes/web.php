<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\{NewsController, OrderController};
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
    return view('welcome');
});

Route::get('/hello/{name}', static function (string $name): string {
    return "Hello, {$name}";
});

Route::get('/welcome', static function (): string {
    return "<h1 style='text-align:center'>Добро пожаловать на наш сайт!</h1>";
});

Route::get('/info', [InfoController::class, 'showInfo']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {
    Route::get('/', AdminController::class)->name('index');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
});

Route::group(['prefix' => ''], static function () {
    Route::get('/all', [NewsController::class, 'showCategories'])->name('categories.show');
    Route::get('/news/{cat}', [NewsController::class, 'index'])->where('cat', '\d+')->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id', '\d+')->name('news.show');
    Route::get('/news/feedback', [OrderController::class, 'feedback'])->name('feedback');
    Route::get('/news/order', [OrderController::class, 'order'])->name('order');
    Route::get('/news/savefeedback', [OrderController::class, 'saveFeedBack'])->name('save.feedback');
    Route::get('/news/saveorder', [OrderController::class, 'saveOrder'])->name('save.order');
    Route::get('/news/editorder/{id}', [OrderController::class, 'editOrder'])->where('id', '\d+')->name('edit.order');
    Route::get('/news/updateorder', [OrderController::class, 'updateOrder'])->name('update.order');
});
