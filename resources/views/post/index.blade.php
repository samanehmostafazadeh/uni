<x-app-layout :user="$user->id">

    @include('post.partials.index-post-gride-show', ['posts' => $posts])
</x-app-layout>
