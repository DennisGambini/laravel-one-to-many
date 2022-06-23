<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 50; $i++){

            $newPost = new Post();

            $newPost->title = $faker->sentence(3);
            $newPost->content = $faker->sentence(40);
            $newPost->published = $faker->boolean();
            $newPost->slug = Str::of($newPost->title)->slug('-');

            $newPost->save();
        }
    }
}
