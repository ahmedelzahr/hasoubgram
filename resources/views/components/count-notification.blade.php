@props(['count'])
@if ($this->count > 0)
    <div class="rounded-full bg-red-500 w-4 h-4 flex justify-center items-center text-white text-sm p-0" wire:poll.2sec>
        <p>{{ $this->count }}</p>

    </div>
@endif
