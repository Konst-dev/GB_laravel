<?php

namespace Database\Seeders;

use App\Enums\NewsStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 50; $i++) {
            $data[] = [
                'title' => \fake()->jobTitle(),
                'author' => \fake()->userName(),
                'status' => NewsStatus::DRAFT->value,
                'description' => \fake()->text(100),
                'created_at' => \now(),
                'updated_at' => \now()
            ];
        }
        return $data;
    }
}
