<div>
    @if ($isFollowing)
        <div class="{{ $showButton ?'grid grid-cols-4 mt-4  px-4':'text-red-500 text-sm font-bold'}}">
            <button wire:key="b1" wire:click="toggleUser" class="{{$showButton ?'grid-button':''  }}">
                {{ __('Unfollow') }}
            </button>
        </div>
    @elseif ($isPending)
        <div class="{{ $showButton ?'grid grid-cols-4 mt-4  px-4':'text-red-700 text-sm font-bold'}}">
            <div  class="{{$showButton ?'grid-button':''  }}">
                {{ __('Pending') }}
            </div>
        </div>
    @else
        <div class="{{ $showButton ?'grid grid-cols-4 mt-4  px-4':'text-blue-500 text-sm font-bold'}}">
            <button wire:key="b2" wire:click="toggleUser"  class="{{$showButton ?'grid-button':''  }}">
                {{ __('Follow') }}
            </button>
        </div>
    @endif
</div>
