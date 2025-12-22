<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'cat_name' => 'Makanan',
                'description' => 'makanan',
            ],
            [
                'cat_name' => 'Minuman',
                'description' => 'minuman',
            ],
            [
                'cat_name' => 'Camilan',
                'description' => 'camilan',
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
