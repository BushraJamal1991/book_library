<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use App\Http\Resources\BookResource;
use App\Models\User;
use App\Models\Book;
use App\Models\Secondcategory;
use App\Models\Category;
use App\Models\Rate;
use App\Models\Favorite;

class BookController extends Controller
{
    public function index(){
        $books=BookResource::collection(Book::get());
        $msg=["ok"];
         return response()->json($books,200,$msg);
    }



    public function show($id){
        $books=new BookResource(Book::find($id));

        $msg=["ok"];
        if($books){
            return response()->json($books,200,$msg);
        }
        return  response()->json(null, 401,'The book not found');
    }

public function store(Request $request){

    $validator=Validator::make($request->all(),[
    'title'=>'required|max:255',
    'sub_category_id'=>'required',]);

    if($validator->fails()){

        return response()->json(null,$validator->errors(),400);
    }

$book=Book::create($request->all());

if($books){
    return response()->json($books,201,'TThe book added');
} 
    return  response()->json(null, 400,'The book not found');

}




public function update(Request $request,$id){

$validator=Validator::make($request->all(),[
    'title'=>'required|max:255',
    'sub_category_id'=>'required',]);

    if($validator->fails()){
        return response()->json(null,$validator->errors(),400);
                         }

    $book=Book::find($id);

    $book->update($request->all());

    if($books){
      return response()->json($books,201,'The book updated');
            } 
      return  response()->json(null, 400,'The book not found');

}

public function destroy($id){
    $book=Book::find($id);
    if(!$books){
        return response()->json(null,404,'The book not found');
              } 
              
     $book->delete($id); 
     if($books){
        return  response()->json(null, 200,'The book deleted');
     }
   }

public function filterByCategory($id){
 
    $books=Book::whereHas('secondcategory.category',function($query) use ($id){
        $query->where('id',$id);})->get();
    
         return response()->json($books);
}


public function filterBySubCategory($id){

    $books=Book::whereHas('secondcategory',function($query) use ($id){
    $query->where('id',$id);})->get();

     return response()->json($books);
}

}