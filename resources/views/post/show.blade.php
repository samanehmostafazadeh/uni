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
                    <x-primary-button>
                        <a href="{{ route('post.edit', $post) }}">
                        {{ __('Edit') }}
                        </a>
                    </x-primary-button>
                </div>
            @endif
        </div>

    </div>

</x-app-layout>
