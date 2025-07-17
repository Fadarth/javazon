<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dummyuserseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData =[
            [
                'name'=>'costomer 1',
                'email'=>'user@gmail.com',
                'role'=>'user',
                'password'=>bcrypt('user'),
            ],
            [
                'name'=>'admin 1',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('admin'),
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
