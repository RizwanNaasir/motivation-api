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
    public function run(): void
    {
//        User::factory()->create(10);

        $this->call([
            StorySeeder::class,
        ]);
    }
}
