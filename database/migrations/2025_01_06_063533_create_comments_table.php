<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_comments_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // BIGINT auto-increment
            $table->foreignId('ticket_id')->constrained('tickets'); // Foreign key
            $table->foreignId('user_id')->constrained('users'); // Foreign key
            $table->text('content'); // TEXT
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
