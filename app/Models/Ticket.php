<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;


    // Jika nama tabel di database bukan 'tickets', tentukan nama tabel secara eksplisit
    protected $table = 'tickets';

    // Tentukan kolom yang boleh diisi (mass assignable)
    protected $fillable = ['title', 'description', 'priority', 'status', 'created_by', 'assigned_agent_id'];


    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class); // Menggunakan tabel pivot category_ticket
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class); // Menggunakan tabel pivot label_ticket
    }


    public function comments()
    {
        return $this->hasMany(Comment::class); // Relasi ke Comment
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable'); // Polymorphic relasi ke Attachment
    }

}