<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            
        Category::create([
         'name'=>'Medicine',
          ]);
          
         Category::create([
            'name'=>'Science',
             ]);

        Category::create([
          'name'=>'Animals',
            ]);

        Category::create([
          'name'=>'History',
            ]);

        Category::create([
          'name'=>'Math',
             ]);

        Category::create([
           'name'=>'Geography',
             ]);

         Category::create([
           'name'=>'Architecture',
              ]);
    }
}
