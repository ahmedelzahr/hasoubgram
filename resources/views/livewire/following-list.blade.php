<div>
    <div class="flex flex-col rounded-lg">
        <h1 class="flex items-center justify-center border-b border-b-1 py-2">Followeing</h1>
        <ul class="p-4">
            @forelse ($this->following as $follwing)
                <li class="flex w-full justify-between items-center" wire:key="{{ $follwing->id }}">
                    <div wire:key="img.{{ $follwing->id }}">
                        <x-user.user-card :user="$follwing" class="h-9 w-9 " />
                    </div>
                    @auth
                        @if (auth()->id() === $user_id)
                            <livewire:follow :targetedUser='$follwing' :showButton='false' wire:key="but.{{ $follwing->id }}" />
                        @endif
                    @endauth
                </li>
            @empty
            <li>{{__("The User Don't have any following")  }}</li>
            @endforelse
            </ul>
    </div>
</div>
