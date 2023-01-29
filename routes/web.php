<?php

use App\Http\Controllers\InfoController;
use App\Http\Controllers\NewsController;
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

Route::group(['prefix' => ''], static function () {
    Route::get('/all', [NewsController::class, 'showCategories'])->name('categories.show');
    Route::get('/news/{cat}', [NewsController::class, 'index'])->where('cat', '\d+')->name('news');
    Route::get('/news/{id}/show', [NewsController::class, 'show'])->where('id', '\d+')->name('news.show');
});
