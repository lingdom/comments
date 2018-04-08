<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate existing records to start from scratch
        App\Comment::truncate();

        //create a few comments
        $faker = Faker\Factory::create();

        for ($i=1; $i<=5;$i++) {
            $cmt = App\Comment::create([
                'username' => $faker->name,
                'content' => $faker->text(),
                'post_id' => rand(1,5),
                ]);
            $cmt2 = App\Comment::create([
                'username' => $faker->name,
                'content' => $faker->text(),
                'post_id' => $cmt->post_id,
                'parent_id' => $cmt->id,
                ]);
        }
    }
}
