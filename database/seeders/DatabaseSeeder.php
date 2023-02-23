<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            IndustriesTableSeeder::class,
            ServicesTableSeeder::class,
            ProposalsTableSeeder::class,
            ArticlesTableSeeder::class,
            StaffCategoriesTableSeeder::class,
            StaffsTableSeeder::class,
        ]);
    }
}
