<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Secondcategory;
use App\Models\Category;
use App\Models\Rate;
use App\Models\Favorite;
use App\Http\Resources\BookResource;


class BookController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$book= Book::all();
        $book=BookResource::collection(Book::get());
          
        return view('home',compact('book')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category=Secondcategory::get();       
        return view('admin.add_book',compact('category')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        
        Book::create(['title'=>$request->title,
       'sub_category_id'=>$request->sub_category, ]);
       $book=Book::all();
       return view('home',compact('book'));

    
        }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
