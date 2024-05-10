<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Secondcategory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'sub_category_id',
        
    ];

    public function secondcategory(){
        return $this->belongsTo(Secondcategory::class,'sub_category_id');
    }
    public function rates(){
        return $this->hasMany(Rate::class,'books_id');
    }
    public function favorites(){
        return $this->hasMany(Favorite::class,'books_id');
    }

     
}
