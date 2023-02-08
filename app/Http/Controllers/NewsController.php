<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(int $cat): View
    {
        if ($cat < count($this->categories))
            return \view('news.index', [
                'news' => $this->getNews(),
                'cat' => $cat,
                'categories' => $this->getCategories()
            ]);
    }

    public function show(int $id)
    {
        return \view('news.show', ['news' => $this->getNews($id), 'categories' => $this->getCategories()]);
    }

    public function showCategories()
    {
        return \view('news.categories', ['categories' => $this->getCategories()]);
    }

    public function feedBack()
    {
        return \view('news.feedback', ['categories' => $this->getCategories()]);
    }

    public function order()
    {
        return \view('news.order', ['categories' => $this->getCategories()]);
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
