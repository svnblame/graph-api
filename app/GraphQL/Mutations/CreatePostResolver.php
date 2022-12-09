<?php

namespace App\GraphQL\Mutations;

use App\Models\Post;
use Illuminate\Support\Facades\Log;

final class CreatePostResolver
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $post = Post::create([
            'user_id' => $args['user_id'],
            'title'   => $args['title'],
            'body'    => $args['body'],
        ]);

        // We use Lighthouse Resolvers to do additional things other than just creating a Post
        Log::info('New Post ID ' . $post->id . ' created by user_id: ' . $args['user_id']);

        return $post;
    }
}
