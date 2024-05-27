<section>

    <div class="container mt-2 mb-4">
        <a href="{{ route('post.form.create') }}">
            <x-primary-button>
                {{ __('انتشار پست جدید') }}
            </x-primary-button>
        </a>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($posts as $post)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ $post->img }}" class="bd-placeholder-img card-img-top"  style=" height: 200px" width="100%" height="200">

                        <div class="card-body">
                            <p class="card-text mb-3">{{ $post->title }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('post.show', $post) }}">
                                        <button type="button" class="btn btn-sm btn-outline-secondary mr-2">مشاهده</button>
                                    </a>
                                    @if( $user->id == 1 || $post->isUserAuthorOfThisPost($user) )
                                        <a href="{{ route('post.edit', $post) }}">
                                            <button type="button" class="btn btn-sm btn-outline-secondary">  {{ __('ویرایش') }}</button>
                                        </a>

                                    @endif

                                </div>
                                {{--                                <small class="text-muted">9 mins</small>--}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
    {{--            <div class="grid grid-cols-3 gap-4">--}}
    {{--                @foreach($posts as $post)--}}
    {{--                    <div class="...">--}}
    {{--                        <img src="{{ $post->img }}"    width="100%" height="225" alt="{{ $post->title}}" />--}}
    {{--                        <a href="{{ route('post.show', $post) }}"> {{ $post->title }}</a>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    </div>
    </div>
</section>



