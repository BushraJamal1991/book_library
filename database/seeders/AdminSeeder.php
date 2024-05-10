<?php

namespace Database\Seeders;

use c\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $password=Hash::make('12341234');
    
    User::create([
     'name'=>'Bushra Jamal',
     'email'=>'bushra@gmail.com',
     'role'=>'admin',
     'password'=> $password,
   ]);
    }
}
