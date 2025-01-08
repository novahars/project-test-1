<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTicketTable extends Migration
{
    public function up()
    {
        Schema::create('category_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Relasi ke tabel categories
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade');  // Relasi ke tabel tickets
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_ticket');
    }
}
