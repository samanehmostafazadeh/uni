<x-app-layout :user="$user->id">

    {{--    <x-slot name="header">--}}
    {{--        <p> عنوان</p>--}}
    {{--        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">--}}
    {{--            {{ $post->title }}--}}
    {{--        </h2>--}}
    {{--        <p> {{ __('ایجاد شده توسط:   '). $post->user->name }} </p>--}}
    {{--    </x-slot>--}}


    {{--comment
    {{--            <div class="bg-gray-100 p-6">--}}
    {{--                <h2 class="text-lg font-bold mb-4">{{ __('دیدگاه ها') }}</h2>--}}
    {{--                <div class="flex flex-col space-y-4">--}}

    {{--                    @foreach($post->comments as $comment)--}}
    {{--                        <div class="bg-white p-4 rounded-lg shadow-md">--}}
    {{--                            <h3 class="text-lg font-bold">{{ $comment->user->name }}</h3>--}}
    {{--                            <p class="text-gray-700 text-sm mb-2">{{ __('Posted on ') }} {{ $comment->created_at }}</p>--}}
    {{--                            <p class="text-gray-700">{{ $comment->body }}--}}
    {{--                            </p>--}}
    {{--                        </div>--}}
    {{--                    @endforeach--}}

    {{--                    <form  method="post" action="{{ route('comment.create', $post) }}" class="bg-white p-4 rounded-lg shadow-md">--}}
    {{--                        @csrf--}}
    {{--                        @method('post')--}}
    {{--                        <h3 class="text-lg font-bold mb-2">{{ __('نوشتن نظر') }}</h3>--}}
    {{--                        <div class="mb-4">--}}
    {{--                            <label class="block text-gray-700 font-bold mb-2" for="body">--}}
    {{--                                {{ __('نظر') }}--}}
    {{--                            </label>--}}
    {{--                            <textarea--}}
    {{--                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"--}}
    {{--                                id="body" rows="3" placeholder="نظر خودتون رو بنویسید"></textarea>--}}
    {{--                        </div>--}}
    {{--                        <button--}}
    {{--                            class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"--}}
    {{--                            type="submit">--}}
    {{--                            ثبت--}}
    {{--                        </button>--}}
    {{--                    </form>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </div>--}}
    <div class="container">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="{{ $post->img }}" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h4 class="display-6 fw-bold lh-4 mb-3">{{ $post->title }}</h4>
                <span class=""> {{ __('ایجاد شده توسط:   '). $post->user->name }} </span>
                <p class="lead">{{ $post->body }}</p>
                @if( $user->id == 1 || $post->isUserAuthorOfThisPost($user) )
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
                        {{--                    <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Primary</button>--}}
                        {{--                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Default</button>--}}

                        <a href="{{ route('post.edit', $post) }}" >
                            <button type="button" class="btn btn-outline-secondary  px-4 me-md-2">{{ __('ویرایش') }}</button>
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
