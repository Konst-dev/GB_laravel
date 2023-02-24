<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => \fake()->userName(),
                'phone' => '+71234567890',
                'email' => \fake()->email(),
                'description' => \fake()->text(200),
                'created_at' => \now(),
                'updated_at' => \now(),
            ];
        }
        return $data;
    }
}
