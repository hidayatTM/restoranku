<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        $roles = [
            [
                'role_name' => 'admin',
                'description' => 'Administrator with full access',
            ],
            [
                'role_name' => 'cashier',
                'description' => 'Cashier with limited access',
            ],
            [
                'role_name' => 'cheft',
                'description' => 'Chef with limited access',
            ],
            [
                'role_name' => 'customer',
                'description' => 'Regular user with limited access',
            ],
        ];

        DB::table('roles')->insert($roles);
    }
}
