<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\Secondcategory;
use App\Models\Category;
use App\Models\Rate;
use App\Models\Favorite;




use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
          }
    
        public function add()
        {
          }



            public function add_sub_category(){
                       
                return view('admin.add_sub_category'); 
                 }
  
            public function add_main_category()
            {              
             
                return view('admin.add_main_category');    }
  
  
  
public function create(array $data){
    return Book::create([
       'title' => $data['title'],
       'category' => $data['category'],
      
      ]);


    }


  }


    
   
