<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1;$i<50;$i++){
            $customer = new Customer;
            $customer->name = $faker->name;
            $customer->mobile = $faker->phoneNumber;
            $customer->password = Hash::make($faker->password);
            $customer->email = $faker->email;
            $customer->address =  $faker->address;
            $customer->save();
        }
    }
}