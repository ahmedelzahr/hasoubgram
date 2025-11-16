<div class="flex flex-col rounded-lg">
    <h1 class="flex items-center justify-center border-b border-b-1 py-2">Followers</h1>
    <ul class="p-4">
        @forelse ($this->followers as $follower)
            <li class="flex w-full justify-between items-center">
                <div>
                    <x-user.user-card :user="$follower" class="h-9 w-9 " />
                </div>
                @auth
                    @if (auth()->id() === $user_id)
                        <button class="text-red-700 font-bold text-sm"
                            wire:click="removeFollower({{ $follower }})">{{ __('remove') }}</button>
                    @endif
                @endauth

            </li>
        @empty
            <li>{{ __("you dont't have any follower") }}</li>
        @endforelse

    </ul>

</div>
