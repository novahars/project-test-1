<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_labels_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelsTable extends Migration
{
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->id(); // BIGINT auto-increment
            $table->string('name')->unique(); // VARCHAR(255)
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('labels');
    }
}