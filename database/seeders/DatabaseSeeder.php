<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create 10 Users with Posts and Comments
        User::factory()->count(50)->create()->each(function ($user) {
            $post = Post::factory()->create(['author_id' => $user->id]);
            $comment = Comment::factory()->create(['post_id' => $post->id]);
            $post->comments()->save($comment);

            $user->posts()->save($post);
        });
    }
}
