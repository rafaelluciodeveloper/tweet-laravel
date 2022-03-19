<?php

namespace App\Http\Livewire;

use App\Models\Tweet;
use App\Services\TweetService;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTweets extends Component
{

    use WithPagination;

    protected $tweetService;

    public $content = 'Apenas um teste';

    protected $rules = array(
        'content' => 'required|min:3|max:255',
    );

    public function boot(TweetService $tweetService){
        $this->tweetService = $tweetService;
    }

    public function render()
    {
        $tweets = $this->tweetService->getAllPaginated();
        return view('livewire.show-tweets',compact('tweets'));
    }

    public function create(){
        $this->validate();

        auth()->user()->tweets()->create([
            'content' => $this->content
        ]);

        $this->content = '';
    }

    public function like(Tweet $tweet){
        $this->tweetService->like($tweet);
    }

    public function unlike(Tweet $tweet){
        $this->tweetService->unlike($tweet);
    }
}
