<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use NewsTrait;

    public function index()
    {
        return \view('news.index', [
            'news' => $this->getNews()
        ]);
    }

    public function show(int $id)
    {
        return $this->getNews($id);
    }
}
