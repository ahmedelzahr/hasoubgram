<div class="flex flex-col h-[50rem] ">
    <div class="flex justify-center items-center w-full border-b border-b-neutral-200 p-2">
        <h1 class="flex-grow flex justify-center items-center">{{ __("Creat New Post") }}</h1>
        @if ($image)
            <button class="text-sm text-blue-500 font-bold" wire:click="save()">{{ __('Next') }}</button>
        @endif
    </div>
    @if ($image)
        <img class="h-full object-cover" src="{{ $image->temporaryUrl() }}">
    @endif
    @if (!$image)
        <div class="flex flex-col items-center justify-center flex-grow">
            <svg class="w-12 h-12 mx-auto text-indigo-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <input type="file" name="" id="imageInput" class="hidden" wire:model="image">
            <x-primary-button
                onclick="document.getElementById('imageInput').click()">{{ __('Upload Image') }}</x-primary-button>
        </div>
    @endif


    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
