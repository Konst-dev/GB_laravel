<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryHasNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_has_news')->insert($this->getData());
    }
    private function getData(): array
    {
        $data = [];
        for ($i = 1; $i <= 50; $i++) {
            $data[] = [
                'category_id' => intdiv($i - 1, 10) + 1,
                'news_id' => $i,
            ];
        }
        return $data;
    }
}
