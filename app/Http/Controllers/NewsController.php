<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index(int $cat)
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
}
