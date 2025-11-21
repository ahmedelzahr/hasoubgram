<div class="flex flex-col rounded-lg min-w-96" wire:poll.2sec>
      <h1 class="flex items-center justify-center border-b border-b-1 py-2">Pending Requests</h1>
    <ul class="p-4">
        @forelse ($this->requests as $request)
            <li class="flex w-full justify-between items-center" wire:key="{{ $request->id }}">
                <div wire:key="img.{{ $request->id }}">
                    <x-user.user-card :user="$request" class="h-9 w-9 " />
                </div>
                <div class="flex gap-2">
                    <button wire:click="confirm({{$request->id  }})" class="rounded-md py-1 px-2 bg-blue-300 text-sm">{{ __('Confirm') }}</button>
                    <button wire:click="removeFollower({{$request->id  }})" class="rounded-md py-1 px-2 bg-neutral-200 text-sm">{{ __('Cancel') }}</button>
                </div>
            </li>
        @empty
            <li>{{ __('No Pending Request Found') }}</li>
        @endforelse
    </ul>
</div>
