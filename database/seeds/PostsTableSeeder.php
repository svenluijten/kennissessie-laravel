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
        factory(App\Post::class, 50)
            ->create()
            ->each(function ($post) {
                $comments = factory(App\Comment::class, 5)->make();
                foreach ($comments as $comment) {
                    $post->comments()->save($comment);
                }
            });
    }
}
