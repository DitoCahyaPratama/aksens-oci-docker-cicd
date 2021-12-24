<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        $this->call(BannerSeeder::class);
        $this->call(InterpretasiSeeder::class);
        $this->call(PreTestSeeder::class);
        $this->call(PostTestSeeder::class);
        $this->call(ChatAutomaticSeeder::class);
        Article::factory(100)->create();
        User::factory()->count(10)->create();
        $this->call(UserSeeder::class);
    }
}
