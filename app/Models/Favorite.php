<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    public function book_fav()
    {
        return $this->belongsTo(Book::class);
    }
    public function user_fav()
    {
        return $this->belongsTo(User::class);
    }
}
