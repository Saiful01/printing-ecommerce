<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use App\Models\Applicant;
use App\Models\BlogCategory;
use App\Models\Department;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\News;
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


        Gallery::create([
            'title' => "Title",
            'featured_image' => "/uploads/gallery.jpg",
        ]);

        Gallery::create([
            'title' => "Title",
            'featured_image' => "/uploads/gallery.jpg",
        ]);

        Gallery::create([
            'title' => "Title",
            'featured_image' => "/uploads/gallery.jpg",
        ]);
        Gallery::create([
            'title' => "Title",
            'featured_image' => "/uploads/gallery.jpg",
        ]);
        Gallery::create([
            'title' => "Title",
            'featured_image' => "/uploads/gallery.jpg",
        ]);
        Gallery::create([
            'title' => "Title",
            'featured_image' => "/uploads/gallery.jpg",
        ]);
        Gallery::create([
            'title' => "Title",
            'featured_image' => "/uploads/gallery.jpg",
        ]);
        Gallery::create([
            'title' => "Title",
            'featured_image' => "/uploads/gallery.jpg",
        ]);

        BlogCategory::create([
            'category_title' => "Category 1",
            'featured_image' => "/uploads/news.png",
        ]);
        BlogCategory::create([
            'category_title' => "Category 2",
            'featured_image' => "/uploads/news.png",
        ]);

        News::create([
            'title' => "Etiam laoreet sem eget eros rhoncus",
            'featured_image' => "/uploads/news.png",
            'details' => getDummyNews(),
        ]);
        News::create([
            'title' => "Etiam laoreet sem eget eros rhoncus",
            'featured_image' => "/uploads/news.png",
            'details' => getDummyNews(),
        ]);
        News::create([
            'title' => "Etiam laoreet sem eget eros rhoncus",
            'featured_image' => "/uploads/news.png",
            'details' => getDummyNews(),
        ]);


    }


}
