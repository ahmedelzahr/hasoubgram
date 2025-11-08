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
            @session('status')
                <div class="bg-green-100 rounded-md p-2 absolute right-10 text-sm text-green-700" alert>
                    {{ session('status') }}</div>
            @endsession
            <div class="flex">
                <x-user.user-card :user="auth()->user()" />


            </div>

            <h2 class="text-gray-500 font-bold mb-4">{{ __('Sugessted For You') }}</h2>
            @foreach ($sugesstions as $sugesstion)
                <div class="flex w-full justify-between items-center">
                    <div>
                        <x-user.user-card :user="$sugesstion" class="h-9 w-9 " />
                    </div>

                    <form action="{{ route('follow_user', $sugesstion->id) }}" method="post">
                        @csrf
                        <button class="text-blue-500 text-md font-bold" type="submit">Follow</button>
                    </form>
                </div>
            @endforeach
        
        </div>


    </div>

</x-app-layout>
