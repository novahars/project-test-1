<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Konser Musik', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Festival Film', 'created_at' => now(), 'updated_at' => now()], 
            ['name' => 'Pameran Seni', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pertunjukan Teater', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Seminar', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
