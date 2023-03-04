<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use  Faker\Factory as Faker;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
        for($i=1;$i<50;$i++){
            $brand = new Brand;
            $brand->brand_name = $faker->company;
            $brand->brand_logo = $faker->imageUrl;
            $brand->save();
        }
    }
}