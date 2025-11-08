<div>
    @if ($post->isLiked(auth()->user()))
        <button wire:click="toggleLike">
            <box-icon name='heart' Type="solid" class="fill-red-600 hover:fill-gray-300"></box-icon>
        </button>
    @else
    
        <button wire:click="toggleLike">
            <box-icon name='heart' class="hover:fill-gray-300"></box-icon>
        </button>
    @endif


</div>
