<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    public function attachable()
    {
        return $this->morphTo(); // Polymorphic relasi ke Ticket
    }
}