<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate existing records to start from scratch
        App\Post::truncate();

        //create a few posts
        $faker = Faker\Factory::create();

        for ($i=1; $i<=5;$i++) {
            App\Post::create([
                'username' => $faker->name,
                'content' => $faker->text(),
                ]);
        }
    }
}
