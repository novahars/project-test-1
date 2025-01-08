<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_logs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id(); // BIGINT auto-increment
            $table->foreignId('ticket_id')->constrained('tickets'); // Foreign key
            $table->foreignId('user_id')->constrained('users'); // Foreign key
            $table->string('action'); // VARCHAR(255)
            $table->text('details')->nullable(); // TEXT
            $table->timestamps(); // created_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
