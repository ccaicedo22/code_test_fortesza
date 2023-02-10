<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayUsers = [
             "user1" => array(
                 "created_at" => date('Y-m-d H:i:s'),
                 "updated_at" => date('Y-m-d H:i:s'),
                 "fullname" => "Daniel Felipe Caicedo",
                 "username" => "DANIEL485",
                 "email" => "DANIEL485@gmail.com",
                 "password" => "Daniel485",
             ),
             "user2" => array(
                 "created_at" => date('Y-m-d H:i:s'),
                 "updated_at" => date('Y-m-d H:i:s'),
                 "fullname" => "Maria Andrea Chaparro",
                 "username" => "MARIA_1234",
                 "email" => "MARIA_1234@gmail.com",
                 "password" => "Maria1234",
             ),
             
         ];
         foreach ($arrayUsers as $user){
             $userAdd = new User();
             if (is_array($user)) {
                 foreach ($user as $key => $value){
                     $userAdd -> $key = $value;
                 }
                 $userAdd -> save();
             }
         }
     }
 }