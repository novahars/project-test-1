<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttachmentSeeder extends Seeder
{
    public function run()
    {
        DB::table('attachments')->insert([
            [
                'file_path' => 'path/to/file1.jpg',
                'file_name' => 'file1.jpg',
                'attachable_id' => 1,
                'attachable_type' => 'App\Models\Ticket',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'file_path' => 'path/to/file2.png',
                'file_name' => 'file2.png',
                'attachable_id' => 2,
                'attachable_type' => 'App\Models\Ticket',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
