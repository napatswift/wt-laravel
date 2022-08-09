<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = \App\Models\Post::all();
        $tags = \App\Models\Tag::all();

        foreach ($posts as $post) {
            $post->tags()->sync($tags->random(rand(1, 3)));
        }
    }
}
