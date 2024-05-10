<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Secondcategory;
use App\Models\Category;
use App\Models\Rate;
use App\Models\Favorite;

class CategoryController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_main_category'); 
    }
    public function create_sub()       
    {   
        $maincategory=Category::get(); 
        return view('admin.add_sub_category',compact('maincategory')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Category::create(['name'=>$request->main_category, ]);
       $category=Category::all();
       $book=Book::all();
       return view('home',compact('category','book'));
           
           
    }
    public function store_sub(Request $request)
    {
        
       Secondcategory::create(['name'=>$request->sub_name,
       'main_category_id'=>$request->main_category, ]);

       $subcategory=Secondcategory::all();
       $book=Book::all();
       return view('home',compact('book','subcategory'));
          
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
