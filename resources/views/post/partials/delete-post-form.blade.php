<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('حذف پست') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('با حذف پست برای همیشه حذف خواهد شد و امکان بازگردانی نداره') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-post-deletion')"
    >{{ __('حذف پست') }}</x-danger-button>

    <x-modal name="confirm-post-deletion" :show="$errors->postDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('post.destroy',$post) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('مطمئنی می خوای پست رو حذف کنی؟') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('با حذف پست برای همیشه حذف خواهد شد و امکان بازگردانی نداره، برای حذف رمزعبورت رو نیاز داری') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('رمزعبور') }}"
                />

                <x-input-error :messages="$errors->postDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('انصراف') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('حذف پست') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
