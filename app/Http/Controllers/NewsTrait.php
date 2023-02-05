<?php

namespace App\Http\Controllers;

trait NewsTrait
{
    private $categories = [
        ['id' => 0, 'name' => 'Мир'],
        ['id' => 1, 'name' => 'РФ'],
        ['id' => 2, 'name' => 'Технологии'],
        ['id' => 3, 'name' => 'Дизайн'],
        ['id' => 4, 'name' => 'Культура'],
        ['id' => 5, 'name' => 'Бизнес'],
        ['id' => 6, 'name' => 'Политика'],
        ['id' => 7, 'name' => 'Наука'],
        ['id' => 8, 'name' => 'Здоровье'],
        ['id' => 9, 'name' => 'Путешествия'],
    ];



    // 0=>'Политика', 
    // 1=>'Наука', 'Спорт', 'Образование', 'Шоу-бизнес'];

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function getCategory(int $id): array
    {
        if ($id < count($this->categories)) {
            return $this->categories[$id];
        }
    }




    public function getNews(int $id = null): array
    {
        $news = [];
        $quantityNews = 40;
        if ($id === null) {
            for ($i = 1; $i < $quantityNews; $i++) {
                $news[$i] = [
                    'id' => $i,
                    'category_id' => intdiv($i - 1, 4),
                    'title' => fake()->jobTitle(),
                    'description' => fake()->text(100),
                    'author' => fake()->userName(),
                    'created_time' => now()->format('Y.m.d H:i')
                ];
            }
            return $news;
        }
        return [
            'id' => $id,
            'title' => fake()->jobTitle(),
            'category_id' => rand(0, 4),
            'description' => fake()->text(100),
            'author' => fake()->userName(),
            'created_time' => now()->format('Y.m.d H:i')
        ];
    }
}
