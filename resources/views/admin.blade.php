<x-app-layout :user="$user->id">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('داشبورد') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full whitespace-no-wrapw-full whitespace-no-wrap">
                        <thead>
                        <tr class="text-center font-bold">
                            <td class="border px-6 py-4">نام </td>
                            <td class="border px-6 py-4">ایمیل</td>
                            <td class="border px-6 py-4">نقش</td>
                            <td class="border px-6 py-4">پست</td>
                            <td class="border px-6 py-4">لینک</td>
                        </tr>
                        </thead>
                        @foreach($users as $u)
                            <tr>
                                <td class="border px-6 py-4">{{$u->name}}</td>
                                <td class="border px-6 py-4">{{$u->email}}</td>
                                <td class="border px-6 py-4"> @if($u->id == 1) Admin @else User @endif </td>
                                <td class="border px-6 py-4"> {{ $u->posts()->count() }} </td>
                                <td class="border px-6 py-4"> <a href="{{ route('admin.profile.edit', $u) }}"> ادیت </a> </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
