<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('محتوای پست') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("محتوای پستت رو ویرایش کن") }}
        </p>
    </header>

    <form method="post" action="{{ route('post.update',$post) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="title" :value="__('عنوان')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $post->title)" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="body" :value="__('توضیحات')" />
            <x-text-input id="body" name="body" type="text" class="mt-1 block w-full" :value="old('body', $post->body)" required autocomplete="body" />
            <x-input-error class="mt-2" :messages="$errors->get('body')" />
        </div>

        {{--        <div>--}}
        {{--            <x-input-label for="img" :value="__('لینک عکس')" />--}}
        {{--            <x-text-input id="img" name="img" type="text" class="mt-1 block w-full" :value="old('img', $post->img)" autocomplete="img" />--}}
        {{--            <x-input-error class="mt-2" :messages="$errors->get('img')" />--}}
        {{--        </div>--}}

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('ذخیره') }}</x-primary-button>

            @if (session('status') === 'post-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('ذخیره شد') }}</p>
            @endif
        </div>
    </form>
</section>
