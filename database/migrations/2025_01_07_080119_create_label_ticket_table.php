<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabelTicketTable extends Migration
{
    public function up()
    {
        Schema::create('label_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('label_id')->constrained()->onDelete('cascade'); // Relasi ke tabel labels
            $table->foreignId('ticket_id')->constrained()->onDelete('cascade'); // Relasi ke tabel tickets
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('label_ticket');
    }
}
