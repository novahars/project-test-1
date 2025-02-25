<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    public function tickets()
    {
        return $this->belongsToMany(Ticket::class); // Menggunakan tabel pivot label_ticket
    }

}