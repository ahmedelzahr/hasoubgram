<x-app-layout>
    <div class="grid grid-cols-3 gap-2 sm:gap-10">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('show_post', $post->slug) }}" >
                    <img src="{{ asset('storage/' . $post->image) }}" alt="" class=" object-cover w-full h-64 rounded">
                </a>
            </div>
        @endforeach
    </div>
    <div class="mt-5">
    {{ $posts->links() }}
    </div>

</x-app-layout>
