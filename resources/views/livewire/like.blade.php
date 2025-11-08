<div>
    <a wire:click="toggleLike" class="cursor-pointer">
        @if ($post->isLiked(auth()->user()))
            <box-icon 
            wire:key="liked-icon"
            name='heart' type="solid" class="fill-red-600 hover:fill-gray-300"></box-icon>
        @else
            <box-icon
            wire:key="unliked-icon"
             name='heart' class="hover:fill-gray-300"></box-icon>
        @endif

    </a>
</div>
