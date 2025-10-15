<x-app-layout>

    <div class="flex md:flex-row flex-col w-full gap-20">
        {{-- left side --}}
        <div class="md:w-7/12 w-full">
            @forelse ($posts as $post)
                <x-post :post="$post" />
            @empty
            @endforelse
        </div>

        {{-- right side --}}
        <div class="hidden md:w-5/12 md:flex md:flex-col md:items-start">
            <x-user.user-card :user="auth()->user()" />
            <h2 class="text-gray-500 font-bold mb-4">{{ __('Sugessted For You') }}</h2>
            @foreach ($sugesstions as $sugesstion)
                <x-user.user-card :user="$sugesstion" />
            @endforeach
        </div>


    </div>

</x-app-layout>
