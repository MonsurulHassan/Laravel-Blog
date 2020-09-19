<?php

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
        // $this->call(UserSeeder::class);
		factory('App\Category', 10)->create();
		factory('App\Tag', 10)->create();
		factory('App\Post', 10)->create();
    }
}
