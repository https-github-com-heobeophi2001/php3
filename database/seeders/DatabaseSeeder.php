<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
