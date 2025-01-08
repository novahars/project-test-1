<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id(); // BIGINT auto-increment
            $table->string('file_path'); // VARCHAR(255)
            $table->string('file_name')->nullable(); // VARCHAR(255)
            $table->unsignedBigInteger('attachable_id'); // Polymorphic
            $table->string('attachable_type'); // Polymorphic
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('attachments');
    }
}
