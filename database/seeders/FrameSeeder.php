<?php

namespace Database\Seeders;

use App\Models\AluminiumPrint;
use App\Models\FoamCoreBoard;
use App\Models\PosterPrint;
use App\Models\CustomPrint;
use App\Models\Shipping;
use App\Models\Tax;
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
            "title" => '12 X 18',
            "price" => '25.16',
        ]);
        FoamCoreBoard::create([
            "title" => '16 X 20',
            "price" => '32.64',
        ]);
        FoamCoreBoard::create([
            "title" => '16 X 24',
            "price" => '35.44',
        ]);
        FoamCoreBoard::create([
            "title" => '18 X 24',
            "price" => '38.53',
        ]);
        FoamCoreBoard::create([
            "title" => '20 X 30',
            "price" => '40.14',
        ]);
        FoamCoreBoard::create([
            "title" => '24 X 32',
            "price" => '42.24',
        ]);
        FoamCoreBoard::create([
            "title" => '24 X 36 Best Value!',
            "price" => '45.62',
        ]);
        FoamCoreBoard::create([
            "title" => '30 X 40 Best Value!',
            "price" => '82.80',
        ]);
        FoamCoreBoard::create([
            "title" => '36 X 36 Best Value!',
            "price" => '104.20',
        ]);

        PosterPrint::create([
            'value' => "",
            "title" => '12 X 18',
            "photo_premium_glossy" => '10.48',
            "canvas" => '32.38',
            "banner" => '26.98',
            "self_adhesive" => '15.17',
        ]);

        PosterPrint::create([
            'value' => "",
            "title" => '16 X 20',
            "photo_premium_glossy" => '15.26',
            "canvas" => '42.24',
            "banner" => '35.20',
            "self_adhesive" => '20.57',
        ]);
        PosterPrint::create([
            'value' => "",
            "title" => '16 X 20',
            "photo_premium_glossy" => '15.26',
            "canvas" => '42.24',
            "banner" => '35.20',
            "self_adhesive" => '20.57',
        ]);
        PosterPrint::create([
            'value' => "",
            "title" => '16 X 24',
            "photo_premium_glossy" => '17.27',
            "canvas" => '46.06',
            "banner" => '38.38',
            "self_adhesive" => '22.40',
        ]);
        PosterPrint::create([
            'value' => "",
            "title" => '18 X 24',
            "photo_premium_glossy" => '19.42',
            "canvas" => '51.80',
            "banner" => '43.17',
            "self_adhesive" => '25.20',
        ]);
        PosterPrint::create([
            'value' => "",
            "title" => '20 X 30',
            "photo_premium_glossy" => '21.60',
            "canvas" => '57.02',
            "banner" => '47.52',
            "self_adhesive" => '28.05',
        ]);
        PosterPrint::create([
            'value' => "",
            "title" => '24 X 32',
            "photo_premium_glossy" => '23.96',
            "canvas" => '70.04',
            "banner" => '58.37',
            "self_adhesive" => '34.47',
        ]);
        PosterPrint::create([
            'value' => "selected",
            "title" => '24 X 36 Best Value!',
            "photo_premium_glossy" => '18.99',
            "canvas" => '76.73',
            "banner" => '36.94',
            "self_adhesive" => '37.32',
        ]);
        PosterPrint::create([
            'value' => "",
            "title" => '30 X 40 Best Value!',
            "photo_premium_glossy" => '41.99',
            "canvas" => '125.80',
            "banner" => '104.83',
            "self_adhesive" => '60.59',
        ]);
        PosterPrint::create([
            'value' => "",
            "title" => '36 X 36 Best Value!',
            "photo_premium_glossy" => '51.73',
            "canvas" => '173.60',
            "banner" => '144.67',
            "self_adhesive" => '83.61',
        ]);


        CustomPrint::create([
            "min" => '0',
            "max" => '200',
            "photo_premium_glossy" => '0.0485',
            "canvas" => '0.1499',
            "banner" => '0.1249',
            "self_adhesive" => '0.0702',
        ]);
        CustomPrint::create([
            "min" => '201',
            "max" => '400',
            "photo_premium_glossy" => '0.0471',
            "canvas" => '0.1454',
            "banner" => '0.1212',
            "self_adhesive" => '0.0681',
        ]);
        CustomPrint::create([
            "min" => '401',
            "max" => '600',
            "photo_premium_glossy" => '0.0457',
            "canvas" => '0.1410',
            "banner" => '0.1175',
            "self_adhesive" => '0.0661',
        ]);
        CustomPrint::create([
            "min" => '601',
            "max" => '800',
            "photo_premium_glossy" => '0.0447',
            "canvas" => '0.1382',
            "banner" => '0.1152',
            "self_adhesive" => '0.0648',
        ]);
        CustomPrint::create([
            "min" => '801',
            "max" => '1000',
            "photo_premium_glossy" => '0.0438',
            "canvas" => '0.1354',
            "banner" => '0.1129',
            "self_adhesive" => '0.0635',
        ]);
        CustomPrint::create([
            "min" => '1001',
            "max" => '1200',
            "photo_premium_glossy" => '0.0430',
            "canvas" => '0.1327',
            "banner" => '0.1106',
            "self_adhesive" => '0.0622',
        ]);
        CustomPrint::create([
            "min" => '1201',
            "max" => '1400',
            "photo_premium_glossy" => '0.0421',
            "canvas" => '0.1301',
            "banner" => '0.1084',
            "self_adhesive" => '0.0610',
        ]);
        CustomPrint::create([
            "min" => '1401',
            "max" => '1600',
            "photo_premium_glossy" => '0.0413',
            "canvas" => '0.1275',
            "banner" => '0.1062',
            "self_adhesive" => '0.0597',
        ]);
        CustomPrint::create([
            "min" => '1601',
            "max" => '1800',
            "photo_premium_glossy" => '0.0404',
            "canvas" => '0.1249',
            "banner" => '0.1041',
            "self_adhesive" => '0.0585',
        ]);

        AluminiumPrint::create([
            "title" => '12 X 18',
            "price" => '25.16',
        ]);
        AluminiumPrint::create([
            "title" => '16 X 20',
            "price" => '32.64',
        ]);
        AluminiumPrint::create([
            "title" => '16 X 24',
            "price" => '35.44',
        ]);
        AluminiumPrint::create([
            "title" => '18 X 24',
            "price" => '38.53',
        ]);
        AluminiumPrint::create([
            "title" => '20 X 30',
            "price" => '40.14',
        ]);
        AluminiumPrint::create([
            "title" => '24 X 32',
            "price" => '42.24',
        ]);
        AluminiumPrint::create([
            "title" => '24 X 36 Best Value!',
            "price" => '45.62',
        ]);
        AluminiumPrint::create([
            "title" => '30 X 40 Best Value!',
            "price" => '82.80',
        ]);
        AluminiumPrint::create([
            "title" => '36 X 36 Best Value!',
            "price" => '104.20',
        ]);
        Tax::create([
            "amount" => '15',
        ]);
        Shipping::create([
            "id" => '1',
            "title" => 'USPS 3-10 Days',
            "Shipping_charge" => '8.9',
        ]);
        Shipping::create([
            "id" => '2',
            "title" => 'Ground 2-5 Days',
            "Shipping_charge" => '12.99',
        ]);
        Shipping::create([
            "id" => '3',
            "title" => 'Express 1-2 Days',
            "Shipping_charge" => '32.99',
        ]);
    }
}
