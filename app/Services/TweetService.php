<?php

namespace App\Services;

use App\Repositories\TweetRespository;

class TweetService
{

    protected $tweetRepository;

    public function __construct(TweetRespository $tweetRepository)
    {
        $this->tweetRepository = $tweetRepository;
    }

    public function getAllPaginated()
    {
        return $this->tweetRepository->with('user')->latest()->paginate(10);
    }

    public function create($data)
    {
        $this->tweetRepository->create($data);
    }

    public function like($idTweet)
    {
        $this->tweetRepository->like($idTweet);
    }

    public function unlike($idTweet)
    {
        $this->tweetRepository->unlike($idTweet);
    }
}
