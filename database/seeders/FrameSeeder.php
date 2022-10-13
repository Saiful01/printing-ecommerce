<?php

namespace Database\Seeders;

use App\Models\AluminiumPrint;
use App\Models\FoamCoreBoard;
use App\Models\PosterPrint;
use Illuminate\Database\Seeder;

class FrameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        FoamCoreBoard::create([
            "title" => '12"X18"',
            "price" => '25.16',
        ]);
        FoamCoreBoard::create([
            "title" => '16"X20"',
            "price" => '32.64',
        ]);
        FoamCoreBoard::create([
            "title" => '16"X24"',
            "price" => '35.44',
        ]);
        FoamCoreBoard::create([
            "title" => '18"X24"',
            "price" => '38.53',
        ]);

        PosterPrint::create([
            "title" => '12"X18"',
            "photo_premium_glossy" => '10.48',
            "canvas" => '32.38',
            "banner" => '26.98',
            "self_adhesive" => '15.17',
        ]);

        PosterPrint::create([
            "title" => '16"20"',
            "photo_premium_glossy" => '15.26',
            "canvas" => '42.24',
            "banner" => '35.20',
            "self_adhesive" => '20.57',
        ]);

        AluminiumPrint::create([
            "title" => '12"X18"',
            "price" => '25.16',
        ]);
        AluminiumPrint::create([
            "title" => '16"X20"',
            "price" => '32.64',
        ]);
    }
}
