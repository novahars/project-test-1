<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            usercreated::class,
            CategorySeeder::class,
            LabelSeeder::class,
            TicketSeeder::class,
            AttachmentSeeder::class,
            CommentSeeder::class,
            LogSeeder::class,
            // Tambahkan seeder lain di sini
        ]);


    }
}
