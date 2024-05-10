<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secondcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'main_category_id',
        
    ];
    public function category(){
        return $this->belongsTo(Category::class,'main_category_id');
    }

    public function books(){
    return $this->hasMany(Book::class,'sub_category_id');



    }
}
