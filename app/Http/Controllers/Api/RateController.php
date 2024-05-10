<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\RateResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Secondcategory;
use App\Models\Category;
use App\Models\Rate;
use App\Models\Favorite;

class RateController extends Controller
{
    public function index(){
        $rate=RateResource::collection(Rate::get());
        $msg=["ok"];
         return response()->json($rate,200,$msg);
    }


    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'books_id'=>'required',
            'users_id'=>'required',
            'rate'=>'required|numeric|min:1|max:5',]);
    
        if($validator->fails()){
    
            return response()->json(null,$validator->errors(),400);
        }
    
    $rate=Rate::create($validator);
    
    if($rate){
        return response()->json($rate,201,'The rate added');
    } 
        return  response()->json(null, 400,'Something wrong');
    
    }
    
}
