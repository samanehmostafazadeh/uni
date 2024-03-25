<x-app-layout :user="$user->id">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Post: ') }} {{ $post->title }}
        </h2>
        <p> {{ __('by: '). $post->user->name }} </p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <img src="{{ $post->img }}" />{{ $post->title }}
                </div>
            </div>

            <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{ $post->body }}
                </div>
            </div>

            @if( $user->id == 1 || $post->isUserAuthorOfThisPost($user) )
                <div class="flex items-center gap-4">
                    <a href="{{ route('post.edit', $post) }}">
                    <x-primary-button>

                        {{ __('Edit') }}

                    </x-primary-button>
                    </a>
                </div>
            @endif

            <div class="bg-gray-100 p-6">
                <h2 class="text-lg font-bold mb-4">{{ __('Comments') }}</h2>
                <div class="flex flex-col space-y-4">

                    @foreach($post->comments as $comment)
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h3 class="text-lg font-bold">{{ $comment->user->name }}</h3>
                            <p class="text-gray-700 text-sm mb-2">{{ __('Posted on ') }} {{ $comment->created_at }}</p>
                            <p class="text-gray-700">{{ $comment->body }}
                            </p>
                        </div>
                    @endforeach
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <h3 class="text-lg font-bold">John Doe</h3>
                            <p class="text-gray-700 text-sm mb-2">Posted on April 17, 2023</p>
                            <p class="text-gray-700">This is a sample comment. Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                    <form class="bg-white p-4 rounded-lg shadow-md">
                        <h3 class="text-lg font-bold mb-2">{{ __('Add a comment') }}</h3>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="comment">
                                {{ __('Comment') }}
                            </label>
                            <textarea
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="comment" rows="3" placeholder="Enter your comment"></textarea>
                        </div>
                        <button
                            class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
