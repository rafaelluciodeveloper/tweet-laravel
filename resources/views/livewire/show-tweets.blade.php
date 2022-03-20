<div>
    <h1 class="text-4xl py-6 font-bold h-24">Tweets</h1>

    <form method="post" wire:submit.prevent="create" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-8">
        <label class="block text-gray-700 text-sm font-bold mb-4" for="username">
            Tweet
        </label>
        <textarea name="content" id="content" rows="5" placeholder="O que está pensando?" wire:model.lazy="content"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('content') border-red-500 @enderror"></textarea>
        @error('content') <p><span class="text-red-500">{{ $message }}</span></p> @enderror
        <button type="submit" class="bg-blue-900 text-white p-2 pl-6 pr-6 rounded">Criar Tweet</button>
    </form>
    @foreach($tweets as $tweet)
        <div class="flex m-8 bg-white shadow-md rounded p-4">
            <div class="w-1/8 pl-3 text-center">
                @if($tweet->user->photo)
                    <img src="{{$tweet->user->photo}}" alt="{{ $tweet->user->name }}" class="rounded-full h-8 w-8">
                @else
                    <img src="{{ url('img/no-image.png') }}" alt="{{ $tweet->user->name }}"
                         class="rounded-full h-8 w-8">
                @endif
            </div>
            <div class="w-7/8 pl-3 inline-block align-text-middle">
                {{ $tweet->content }}
                (
                @if($tweet->likes->count())
                    <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">Descurtir</a>
                @else
                    <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
                @endif
                )
            </div>
        </div>
    @endforeach
    <div class="py-12">
        {{ $tweets->links() }}
    </div>
</div>