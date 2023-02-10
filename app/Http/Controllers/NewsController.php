<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(int $cat): View
    {
        $model = new News();
        $newslist = $model->getNewsByCategory($cat);
        $modelC = new Category();
        $categorylist = $modelC->getCategories();
        return \view('news.index', [
            'news' => $newslist,
            'cat' => $cat,
            'categories' => $categorylist
        ]);
    }

    public function show(int $id)
    {
        $model = new News();
        $news = $model->getNewsById($id);
        $modelC = new Category();
        $categorylist = $modelC->getCategories();
        return \view('news.show', ['news' => $news, 'categories' => $categorylist]);
    }

    public function showCategories()
    {
        $model = new Category();
        $categorylist = $model->getCategories();
        return \view('news.categories', ['categories' => $categorylist]);
    }

    public function feedBack()
    {
        $model = new Category();
        $categorylist = $model->getCategories();
        return \view('news.feedback', ['categories' => $categorylist]);
    }

    public function order()
    {
        $model = new Category();
        $categorylist = $model->getCategories();
        return \view('news.order', ['categories' => $categorylist]);
    }

    public function saveFeedBack(Request $request)
    {
        //dd($request->all());
        $fn = 'feedback.txt';
        $s = $request->input('name') . ": " . $request->input('comment') . "\n";
        if (file_exists($fn))
            file_put_contents($fn, $s, FILE_APPEND | LOCK_EX);
        else file_put_contents($fn, $s, LOCK_EX);
        return redirect()->route('categories.show');
    }

    public function saveOrder(Request $request)
    {
        $fn = 'order.txt';
        $s = "Имя: " . $request->input('name') . "\nТелефон: " . $request->input('tel') . "\n";
        $s .= "Электронная почта: " . $request->input('email') . "\nЗаказ:" . $request->input('comment') . "\n\n";
        if (file_exists($fn))
            file_put_contents($fn, $s, FILE_APPEND | LOCK_EX);
        else file_put_contents($fn, $s, LOCK_EX);
        return redirect()->route('categories.show');
    }
}
