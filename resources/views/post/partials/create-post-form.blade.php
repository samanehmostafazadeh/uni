<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('ایجاد پست جدید') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("ایده هاتو بنویس با بقیه به اشتراک بذار") }}
        </p>
    </header>

    <form method="post" action="{{ route('post.create') }}" class="mt-6 space-y-6">
        @csrf
        @method('post')

        <div>
            <x-input-label for="title" :value="__('عنوان')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"  required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="body" :value="__('توضیحات')" />
            <x-text-input id="body" row="5" name="body" type="text" class="mt-1 block w-full"  required autocomplete="body" />
            <x-input-error class="mt-2" :messages="$errors->get('body')" />
        </div>

        <div>
            <x-input-label for="img" :value="__('لینک عکس')" />
            <x-text-input id="img" name="img" type="text" class="mt-1 block w-full"  autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('img')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('ذخیره') }}</x-primary-button>

            @if (session('status') === 'post-created')
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
