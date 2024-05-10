<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    public function book_rate()
    {
        return $this->belongsTo(Book::class);
    }
    public function user_rate()
    {
        return $this->belongsTo(User::class);
    }
}
