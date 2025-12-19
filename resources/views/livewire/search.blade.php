<div class="flex-grow mx-2 flex flex-col justify-center items-center relative">
    <input class="w-full bg-gray-200 border-none rounded-lg" type="text" wire:model.live="keyWord"
        placeholder="{{ __('Search') }}">
    @if (!@empty($keyWord))
        <button wire:click='clear' class="absolute h-full top-0  right-2  fill-red-600  flex items-center">
            <box-icon name='x'></box-icon>
        </button>
    @endif

    @if (!@empty($keyWord) and !empty($users))
        <ul class="absolute top-full w-full bg-white rounded-lg p-4">
                @forelse ($users as $user)
                    <li>
                        <button wire:click="goTo('{{ $user->userName }}')">
                            <x-user.user-card :user="$user" wire:key='{{ $user->id }}' />
                        </button>
                    </li>
                @empty
                    <div>{{ __('No users Found') }}</div>
                @endforelse
        </ul>

@endif
</div>
