<?php

namespace App\Services;

use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserService implements Parser
{
    private string $link;
    public function setLink(string $link)
    {
        $this->link = $link;
        return $this;
    }
    public function getParseData()
    {
        $xml = XMLParser::load($this->link);
        return
            $xml->parse([
                'title' => [
                    'uses' => 'channel.title'
                ],
                'link' => [
                    'uses' => 'channel.link'
                ],
                'description' => [
                    'uses' => 'channel.description'
                ],
                'image' => [
                    'uses' => 'channel.image.url'
                ],
                'news' => [
                    'uses' => 'channel.item[title,link,guid,description,pubDate]'
                ],
            ]);
    }

    public function saveParseData()
    {
        $xml = XMLParser::load($this->link);
        $data =
            $xml->parse([
                'title' => [
                    'uses' => 'channel.title'
                ],
                'link' => [
                    'uses' => 'channel.link'
                ],
                'description' => [
                    'uses' => 'channel.description'
                ],
                'image' => [
                    'uses' => 'channel.image.url'
                ],
                'news' => [
                    'uses' => 'channel.item[title,link,guid,description,pubDate]'
                ],
            ]);
        $ar = \explode('/', $this->link);
        $fn = end($ar);
        $jsonEncode = json_encode($data);
        Storage::append('news/' . $fn, $jsonEncode);
    }

    public function saveParseDataToDatabase()
    {
        $xml = XmlParser::load($this->link);
        $data =
            $xml->parse([
                'title' => [
                    'uses' => 'channel.title'
                ],
                'link' => [
                    'uses' => 'channel.link'
                ],
                'description' => [
                    'uses' => 'channel.description'
                ],
                'image' => [
                    'uses' => 'channel.image.url'
                ],
                'news' => [
                    'uses' => 'channel.item[title,link,guid,description,pubDate]'
                ],
            ]);
        foreach ($data['news'] as $item) {
            // if (!DB::table('news')->select(['id', 'title', 'author', 'status', 'description', 'created_at'])->where('guid', '=', "{$item['guid']}")->get()) 
            if (!News::where('guid', '=', "{$item['guid']}")->get()->toArray()) {
                $news = new News();
                $news->title = $item['title'];
                $news->description = $item['description'];
                $news->guid = $item['guid'];
                $news->link = $item['link'];
                $news->save();
            }
        }
    }
}
