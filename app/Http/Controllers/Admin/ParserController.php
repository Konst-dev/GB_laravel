<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\QueryBuilders\ResourcesQueryBuilder;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;


class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ResourcesQueryBuilder $resourcesQueryBuilder, Request $request, Parser $parser)
    {
        $urls = $resourcesQueryBuilder->getAll()->toArray();
        // [
        //     'https://news.rambler.ru/rss/technology',
        //     'https://news.rambler.ru/rss/holiday',
        //     'https://news.rambler.ru/rss/gifts',
        //     'https://news.rambler.ru/rss/world',
        //     'https://news.rambler.ru/rss/politics',
        //     'https://news.rambler.ru/rss/community',
        //     'https://news.rambler.ru/rss/incidents',
        //     'https://news.rambler.ru/rss/tech',
        //     'https://news.rambler.ru/rss/starlife',
        //     'https://news.rambler.ru/rss/army',
        //     'https://news.rambler.ru/rss/games',
        //     'https://news.rambler.ru/rss/articles',
        //     'https://news.rambler.ru/rss/video',
        //     'https://news.rambler.ru/rss/photo',
        //     'https://news.rambler.ru/rss/SaintPetersburg',
        // ];

        foreach ($urls as $url) {
            \dispatch(new JobNewsParsing($url['url']));
        }



        return "Parsing Complited";
    }
}
