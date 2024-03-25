<section>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center gap-4" style="margin-bottom: 20px; margin-top: -80px">
                <x-primary-button>
                    <a href="{{ route('post.form.create') }}">
                        {{ __('Publish New Post') }}
                    </a>
                </x-primary-button>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @foreach($posts as $post)
                    <div class="...">
                        <img src="{{ $post->img }}" alt="{{ $post->title}}" />
                        <a href="{{ route('post.show', $post) }}"> {{ $post->title }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
