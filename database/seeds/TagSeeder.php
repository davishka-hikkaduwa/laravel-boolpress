<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = ['Rock', 'Metal', 'Classical', 'Jazz', 'Pop', 'HipHop', 'EDM', 'Country', 'Blues', 'Roma', 'Milano', 'Firenze', 'Verona', 'Napoli'];

        foreach($tags as $model){
            $tag = new Tag();
            $tag->name = $model;
            $tag->slug = Str::slug($tag->name);
            $tag->save();
        }
    }
}
