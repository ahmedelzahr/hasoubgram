<x-app-layout>
    {{-- top --}}
    <div class="grid grid-cols-4 px-4 space-y-4 justify-center items-center">
        <div
            class=" justify-center items-center flex col-start-1 col-span-2 md:col-start-2 md:col-span-1 order-1 row-start-2 md:row-span-4 ">
            <x-user.user-avatar :image="$user->image" class="h-20 w-20 md:h-40 md:w-40" />
        </div>
        <div class="col-start-1 col-span-2 order-2  md:col-start-3 md:order-2 md:text-sm  font-bold md:font-thin">
            <p>{{ $user->name }}</p>
        </div>
        <div class="col-start-1 col-span-2 order-3 md:col-start-3 md:order-4 text-sm">
            <p>{!! nl2br(e($user->bio)) !!}</pr>
            </p>
        </div>

        <div class="row-start-1 col-start-3 md:order-3 font-bold md:text-xl">
            <p>{{ $user->userName }}</p>
        </div>
        <div class="flex flex-row space-x-2 col-start-3  md:order-3 md:text-sm">
            <div class="flex flex-col md:flex-row md:space-x-1 ">
                <div class="font-bold">{{ $user->posts->count() }}</div>
                <div>{{ $user->posts->count() > 1 ? __('posts') : __('post') }}</div>
            </div>
            <livewire:follower :user_id='$user->id' />
            <livewire:following :user_id='$user->id' />

        </div>

    </div>
    @guest
        <div class="grid grid-cols-4 mt-4 space-x-2 px-4">
            <form action="{{ route('follow_user', $user->id) }}" method="POST"
                class="col-span-4 md:col-start-2 primary-button md:col-span-2">
                @csrf
                <button type="submit" class="w-full">
                    {{ __('Follow') }}
                </button>
            </form>

        </div>
    @endguest
    {{-- buttons --}}
    @auth
        @if (auth()->id() === $user->id)
            <div class="grid grid-cols-4 mt-4 space-x-2 px-4">
                <a href="{{ route('profile.edit') }}" class="col-span-4 md:col-start-2 primary-button md:col-span-2">
                    Edit Profile
                </a>

            </div>
        @else
            <livewire:follow :targetedUser='$user' :showButton='true' />
        @endif

    @endauth





    @if ($user->dataVisible())
        <div class="grid grid-cols-3 gap-1 md:grid-cols-4 mt-4">
            @foreach ($user->posts as $post)
                <a href={{ route('show_post', $post->slug) }} class='relative group'>
                    <img src="{{ asset('storage/' . $post->image) }}" alt=""
                        class="object-cover aspect-square  w-full ">
                    <div
                        class="flex justify-center items-center absolute top-0 w-full h-full space-x-2 group-hover:bg-black/40">
                        <div
                            class="invisible flex text-white text-xl font-bold fill-white justify-center items-center group-hover:visible space-x-1">
                            <box-icon name='heart' type='solid'></box-icon>
                            <p>{{ $post->likes()->count() }}</p>
                        </div>
                        <div
                            class="invisible flex text-white text-xl font-bold fill-white justify-center items-center group-hover:visible space-x-1">
                            <box-icon name='comment' type='solid'></box-icon>
                            <p>{{ $post->comments()->count() }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class='flex justify-center items-center text-center mt-4'></div>
        <p class="text-center">This is private account Please follow to start seing his posts</p>

    @endif






</x-app-layout>
