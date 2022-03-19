<?php

namespace App\Repositories;

use App\Models\Tweet;

class TweetRespository extends AbstractRepository
{
    protected static string $model = Tweet::class;

    public function like(Tweet $tweet)
    {
        $tweet->likes()->create([
            'user_id' => auth()->id()
        ]);
    }

    public function unlike(Tweet $tweet)
    {
        $tweet->likes()->delete();
    }

}
