<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use App\Models\Applicant;
use App\Models\BlogCategory;
use App\Models\Department;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\News;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => "Respone Employee3 ",
            'email_address' => "employee3@gmail.com",
            'phone_number' => "01707079186",
            'password' => Hash::make('123456'),
        ]);


        /* Admin Seeder*/
        AdminRole::create([
            'name' => "Motiur Rahaman",
            'email' => "memotiur@gmail.com",
            'phone' => "01303106024",
            'password' => Hash::make('123456'),
            'is_admin' => true,
        ]);
        AdminRole::create([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'phone' => "0171784996",
            'password' => Hash::make('123456'),
            'is_admin' => true,
        ]);

        $this->call(FrameSeeder::class);


        Product::create([
            'title' => "Wall Art Poster",
            'details' => "Wall Art Poster",
            'price' => 100,
            'featured_image'=>"/uploads/1.jpg"
        ]);
        Product::create([
            'title' => "Wall Art Poster",
            'details' => "Wall Art Poster",
            'price' => 100,
            'featured_image'=>"/uploads/1.jpg"
        ]);
        Product::create([
            'title' => "Wall Art Poster",
            'details' => "Wall Art Poster",
            'price' => 100,
            'featured_image'=>"/uploads/1.jpg"
        ]);
    }


}
