<div class="lg:flex ">
    @if (session('error'))
        <div class="text-sm text-sm-500 py-5">
            {{ session('error') }}
        </div>
    @endif
    {{-- left Side --}}
    <div class="lg:w-7/12 h-[50rem]">
        <img class="w-full h-full" src="{{ $newImage ? $newImage->temporaryUrl() : asset('storage/' . $image) }}"
            alt="filter image">

    </div>

    {{-- Right Side --}}
    <div class="lg:w-5/12 p-4 flex flex-col justify-betweenc gap-2">
        {{-- Filter Section --}}
        <div class="flex items-center">
            <x-user.user-avatar :image="auth()->user()->image"></x-user.user-avatar>
            <a href="{{ route('user_profile', auth()->user()->userName) }}">{{ auth()->user()->name }}</a>
        </div>
        <label>{{ __('Change Image') }}</label>
        <input type="file" wire:model.live="newImage"
            class="file:border-0 file:text-blue-700 file:bg-blue-50 hover:file:bg-blue-100 file:text-sm">
        {{-- <h2 class="w-full text-center pb-4">Filters</h2> --}}
        {{-- <div class="grid grid-cols-3 gap-5">
            @foreach ($filters as $key => $value)
                <div class="cursor-pointer  justify-center items-center gap-2"
                    wire:click="processImage('{{ $key }}')">

                    <img class="w-full aspect-square" src="{{ asset('storage/filters_thumb/' . $key . '.jpg') }}"
                        alt="">
                    <p class="w-full text-center">{{ $key }}</p>
                </div>
            @endforeach
        </div> --}}
        <div class="flex flex-col justify-center">

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
        <div class="flex-grow">

        </div>
        <x-primary-button class="justify-center" wire:click="update">
            {{ __('Update') }}
        </x-primary-button>
    </div>
</div>
