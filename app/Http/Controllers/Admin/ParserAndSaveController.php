<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParserAndSaveController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $load = $parser->setLink("http://news.rambler.ru/rss/world/")->getParseData();
        $N = 0;
        foreach ($load['news'] as $item) {
            // if (!DB::table('news')->select(['id', 'title', 'author', 'status', 'description', 'created_at'])->where('guid', '=', "{$item['guid']}")->get()) 
            if (!News::where('guid', '=', "{$item['guid']}")->get()->toArray()) {
                $news = new News();
                $news->title = $item['title'];
                $news->description = $item['description'];
                $news->guid = $item['guid'];
                $news->link = $item['link'];
                $news->save();
                $N++;
            }
        }
        echo $N . " новостей загружено";
    }
}
