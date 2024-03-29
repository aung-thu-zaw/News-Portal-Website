<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            NewsCategorySeeder::class,
            NewsSubcategorySeeder::class,
            NewsTagSeeder::class,
            NewsContentSeeder::class,
            PlaylistSeeder::class,
            TopicSeeder::class,
            ReelVideoSeeder::class
        ]);
    }
}
