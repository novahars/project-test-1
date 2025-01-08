<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LogSeeder extends Seeder
{
    public function run()
    {
        DB::table('logs')->insert([
            [
                'ticket_id' => 1,
                'user_id' => 1,
                'action' => 'Created',
                'details' => 'Tiket pertama dibuat.',
                'created_at' => now(),
            ],
            [
                'ticket_id' => 2,
                'user_id' => 2,
                'action' => 'Updated',
                'details' => 'Tiket kedua diperbarui.',
                'created_at' => now(),
            ],
        ]);
    }
}
