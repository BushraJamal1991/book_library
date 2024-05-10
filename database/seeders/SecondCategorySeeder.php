<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Secondcategory;

class SecondCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Secondcategory::create([
            'name'=>'Sea Animals',
            'main_category_id'=>'3',
             ]);

         Secondcategory::create([
            'name'=>'Anatomy',
            'main_category_id'=>'1',  
             ]); 
             
             
         Secondcategory::create([
            'name'=>'Flying Animals',
            'main_category_id'=>'3',
             ]);   
             
         Secondcategory::create([
            'name'=>'Stone Age',
            'main_category_id'=>'4',
             ]);
                 
                 
        Secondcategory::create([
           'name'=>'Umayyad Era',
           'main_category_id'=>'4',
             ]);



      
        Secondcategory::create([
          'name'=>'Algebra',
          'main_category_id'=>'5',
             ]);



        Secondcategory::create([
          'name'=>'Mosques',
          'main_category_id'=>'7',
            ]);








    }
}
