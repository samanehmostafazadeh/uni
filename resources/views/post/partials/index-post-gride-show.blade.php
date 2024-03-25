<section>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center gap-4" style="margin-bottom: 20px; margin-top: -80px">
                <a href="{{ route('post.form.create') }}">
                <x-primary-button>

                        {{ __('Publish New Post') }}

                </x-primary-button>
                </a>
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
