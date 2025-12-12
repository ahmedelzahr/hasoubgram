<div class="lg:flex ">

    {{-- left Side --}}
    <div class="lg:w-7/12 h-[50rem]">
        <img class="w-full h-full" src="{{ asset('storage/' . $processedImagePath) }}" alt="filter image">
    </div>

    {{-- Right Side --}}
    <div class="lg:w-5/12 p-4 flex flex-col justify-between">
        {{-- Filter Section --}}
        <h2 class="w-full text-center pb-4">Filters</h2>
        <div class="grid grid-cols-3 gap-5">
            @foreach ($filters as $key => $value)
                <div class="cursor-pointer  justify-center items-center gap-2"
                    wire:click="processImage('{{ $key }}')">

                    <img class="w-full aspect-square" src="{{ asset('storage/filters_thumb/' . $key . '.jpg') }}"
                        alt="">
                    <p class="w-full text-center">{{ $key }}</p>
                </div>
            @endforeach
        </div>
        <div class="flex-grow flex flex-col justify-center">
            <div class="flex items-center">
                <x-user.user-avatar :image="auth()->user()->image"></x-user.user-avatar>
                <a href="{{ route('user_profile',auth()->user()->userName ) }}">{{auth()->user()->name }}</a>
            </div>
            <div>
                <textarea name="description" id="description" class="border-none w-full mt-4" wire:model="description"
                    placeholder="Description" type="text"></textarea>
                @error('description')
                    <span class="text-sm text-red-500 py-5">
                        {{ $message }}
                    </span>
                @enderror
            </div>

        </div>
<x-primary-button class="justify-center" wire:click="save">
    Publish
</x-primary-button>
    </div>
</div>
