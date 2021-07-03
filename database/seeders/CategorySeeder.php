<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use DB;
class CategorySeeder extends Seeder
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
                'name' => $faker->name
            ];
            DB::table('categories')->insert($data);
        }
    }
}
