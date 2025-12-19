<div class="flex flex-col rounded-lg min-w-96" wire:poll.2sec>
      <h1 class="flex items-center justify-center border-b border-b-1 py-2">{{ __('Notification') }}</h1>
    <ul class="p-4">
        @forelse ($this->notifications as $notification)
            <li class="flex w-full justify-between items-center" wire:key="{{ $notification->id }}">
             <livewire:notification :notification="$notification"/>
              
            </li>
        @empty
            <li>{{ __("You don't have any notification") }}</li>
        @endforelse
    </ul>
</div>