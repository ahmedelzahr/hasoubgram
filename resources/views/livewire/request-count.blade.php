<div class="absolute rounded-full bottom-5 right-3 {{ $this->count===0?'hidden':''}} w-4 h-4 flex justify-center items-center bg-red-500" wire:poll.2sec>
   <p>{{ $this->count }}</p> 
</div>
