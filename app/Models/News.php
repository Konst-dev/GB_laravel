<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews(): Collection
    {
        return DB::table($this->table)->select(['id', 'title', 'author', 'status', 'description', 'created_at'])->get();
    }

    public function getNewsById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'author', 'status', 'description', 'created_at']);
    }
    public function getNewsByCategory(int $id): Collection
    {
        $model = new News();
        $newslist = $model->getNews();
        return DB::table('news')
            ->join('category_has_news as chn', 'news.id', '=', 'chn.news_id')
            ->join('categories', 'chn.category_id', '=', 'categories.id')
            ->select('news.*', 'chn.category_id', 'categories.title as ctitle')
            ->where('chn.category_id', '=', "{$id}")
            ->get();
    }
}
