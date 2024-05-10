<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\FavoriteResource;
use App\Models\User;
use App\Models\Book;
use App\Models\Secondcategory;
use App\Models\Category;
use App\Models\Rate;
use App\Models\Favorite;

class FavoriteController extends Controller
{

    public function index(){
        
    }


    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'users_id'=>'required',
            'books_id'=>'required',
            ]);
    
        if($validator->fails()){
    
            return response()->json(null,$validator->errors(),400);
        }
    
    $fav=Favorite::create($validator);
    
    if($fav){
        return response()->json($fav,201,'The favorite added');
    } 
        return  response()->json(null, 400,'Something wrong');
    
    }
    
}
