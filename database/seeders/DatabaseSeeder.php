<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use App\Models\Applicant;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Department;
use App\Models\Event;
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
        Customer::create([
            'firstName' => "Motiur ",
            'lastName' => " Rahaman",
            'email' => "memotiur@gmail.com",
            'password' => Hash::make('123456'),

        ]);
        Customer::create([
            'firstName' => "Saiful ",
            'lastName' => " Islam",
            'email' => "saiful013101@gmail.com",
            'password' => Hash::make('123456'),

        ]);
        CustomerAddress::create([
            'id' => 1,
            'customer_id' => 1,
            'address' => "Dhaka",
            'address2' => "Dhaka",
            'city' => "Dhaka",
            'state' => "Dhaka",
            'zipCode' => "1200",
            'phone' => "01303106024",
        ]);
        CustomerAddress::create([
            'id' => 2,
            'customer_id' => 2,
            'address' => "Dhaka",
            'address2' => "Dhaka",
            'city' => "Dhaka",
            'state' => "Dhaka",
            'zipCode' => "1200",
            'phone' => "01303106024",
        ]);

        $this->call(FrameSeeder::class);


        Product::create([
            'title' => "Wall Art Poster",
            'details' => "Wall Art Poster",
            'short_details' => "Wall Art Poster",
            'price' => 90,
            'tag' => "wall art poster, poster, unique design, wall art",
            'featured_image' => "/wallPoster/1.jpg",
            'is_public'=>1
        ]);
        Product::create([
            'title' => "Wall Art Poster",
            'details' => "Wall Art Poster",
            'short_details' => "Wall Art Poster",
            'price' => 100,
            'tag' => "wall art poster, poster, unique design, wall art",
            'featured_image' => "/wallPoster/1.jpg",
            'is_public'=>1
        ]);
        Product::create([
            'title' => "Wall Art Poster",
            'details' => "Wall Art Poster",
            'short_details' => "Wall Art Poster",
            'price' => 150,
            'tag' => "wall art poster, poster, unique design, wall art",
            'featured_image' => "/wallPoster/1.jpg",
            'is_public'=>1
        ]);

        Coupon::create([
            'coupon' => "Dhaka100",
            'discount' => "10",
        ]);
    }


}
