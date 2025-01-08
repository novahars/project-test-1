<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->insert([
            [
                'ticket_id' => 1,
                'user_id' => 1,
                'content' => 'Ini adalah komentar pertama.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ticket_id' => 2,
                'user_id' => 2,
                'content' => 'Ini adalah komentar kedua.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
