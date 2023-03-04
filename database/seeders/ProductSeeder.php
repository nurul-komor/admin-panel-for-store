<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use  Faker\Factory as Faker;
class ProductSeeder extends Seeder
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
            $product = new Product;
            $product->product_name = $faker->company;
            $product->imei_1 = $faker->imei;
            $product->imei_2 = $faker->imei;
            $product->model_no = $faker->randomAscii;
            $product->product_code = $faker->randomAscii;
            $product->qty = time();
            $product->price = 999.99;
            $product->details = $faker->text;
            $product->product_image = $faker->imageUrl;
            $product->brand_id = '1';
            $product->save();
        }
    }
}