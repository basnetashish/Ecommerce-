<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            [
            'name' =>'Ashish',
            'email'=> 'ashishlaravel@gmal.com',
             'password' => bcrypt(123456789),
             'roles' =>'admin',
            ],
            [
                'name' =>'Hari',
                'email'=> 'harilaravel@gmal.com',
                 'password' => bcrypt(123456789),
                 'roles' =>'user',
            ],
    

        ];
        User::insert($data);
    }
}
