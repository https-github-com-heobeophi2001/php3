<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        for ($i = 0; $i < 20; $i++) {
            $data = [
                'name' => $faker->name,
                'price' => $faker->randomNumber(1, 6),
                'image' => $faker->image,
                'quantity' =>  $faker->randomNumber(6),
                'category_id' => $faker->randomNumber(1, 9)
            ];
            DB::table('products')->insert($data);
        }
    }
}
