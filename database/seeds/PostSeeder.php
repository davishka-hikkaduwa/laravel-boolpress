<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        for($i = 0; $i < 25; $i++){
            $post = new Post();
            $post->title = $faker->realTextBetween($minNbChars = 10, $maxNbChars = 50, $indexSize = 2);
            $post->content = $faker->realTextBetween($minNbChars = 200, $maxNbChars = 400, $indexSize = 2);

            $slug = Str::slug($post->title);
            $slug_base = $slug;
            $counter = 1;
            $existingPost = Post::where('slug', $slug)->first();
            while($existingPost){
                $slug = $slug_base . '_' . $counter;
                $existingPost = Post::where('slug', $anotherSlug)->first();
                $counter++;
            }

            $post->slug = $slug;
            $post->save();

        }
    }
}
