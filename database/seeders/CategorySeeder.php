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
                'cat_name' => 'makanan',
                'description' => 'makanan',
            ],
            [
                'cat_name' => 'minuman',
                'description' => 'minuman',
            ],
            [
                'cat_name' => 'camilan',
                'description' => 'camilan',
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
