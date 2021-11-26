<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         User::insert([
            ['name'=>'Husein',
            'email'=>'husikaa_988@hotmail.com',          
            'password'=>Hash::make(12345678)
             ],
            ['name'=>'Emina',   
            'email'=>'emina_988@hotmail.com',         
            'password'=>Hash::make(12345678)
            ]
        ]);
         Post::insert([
            ['title' => 'Post 1',
            'content'=>' post content 1',
            'date'=>Carbon::now(),
            'imageUrl'=>'img'
            ],
             ['title' => 'Post 2',
            'content'=>' post content 2',
            'date'=>Carbon::now(),
            'imageUrl'=>'img'
            ],
           
        ]);
    }
}
