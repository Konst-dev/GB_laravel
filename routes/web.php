<?php

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

function getNews()
{
    $news = [
        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur, nobis?',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, nulla.',
        'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Itaque, eaque?',
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores voluptas animi molestias quam quibusdam dolores! Eveniet illo similique cum quia!',
        'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur dolorem deleniti minima, fugiat repellat expedita.'
    ];
    return $news;
}

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', static function (string $name): string {
    return "Hello, {$name}";
});

Route::get('/welcome', static function (): string {
    return "<h1 style='text-align:center'>Добро пожаловать на наш сайт!</h1>";
});

Route::get('/news', static function (): string {
    $news = getNews();
    $str = '';
    $i = 0;
    foreach ($news as $item)
        $str .= '<p>' . $i++ . '. ' . $item . '</p>';
    return $str;
});

Route::get('/news/{id}', static function (int $id): string {
    $news = getNews();
    if ($id < count($news)) return '<p>' . $news[$id] . '</p>';
    else return '<h2>Страница не найдена</h2>';
});

Route::get('/info', static function (): string {
    return '<p>На этом сайте будут публиковаться новости.</p>';
});
