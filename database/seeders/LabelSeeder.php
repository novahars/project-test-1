<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    public function run()
    {
        DB::table('labels')->insert([
            ['name' => 'Urgent', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Low Priority', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'In Progress', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
