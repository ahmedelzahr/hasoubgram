<x-app-layout>
    <div class="md:flex h-screen" dir="ltr">
        {{-- left --}}
        <div class="bg-black md:w-7/12  object-cover overflow-clip flex items-center">
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-full">
        </div>
        {{-- right --}}
        
        <div class="bg-white md:w-5/12 w-full flex flex-col">
            {{-- top --}}
            <div class="flex  items-center border-b-2 p-4">
                <img src="{{ $post->owner->image }}" alt="user_img" class="rounded-full h-10 w-10 ltr:mr-5 rtl:ml-5">
                <a href="" class="text-sm font-bold grow">{{ $post->owner->name }}</a>
            </div>
            {{-- middle --}}
            <div class="grow">
                <div class="flex  items-center p-4">

                    <img src="{{ $post->owner->image }}" alt="user_img"
                        class="rounded-full h-10 w-10 ltr:mr-5 rtl:ml-5">

                    <div class="flex flex-col">
                        <div>
                            <a href="" class="text-sm font-bold grow">{{ $post->owner->name }}</a>
                            <span class="inline">{{ $post->description }}</span>
                        </div>
                        <div class="text-sm mt-1 text-gray-400">{{ $post->created_at->diffForHumans(null, true, true) }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
