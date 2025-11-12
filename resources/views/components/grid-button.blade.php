   <div class="grid grid-cols-4 mt-4  px-4">
       <button wire:key="b2" wire:click="toggleUser" {{ $attributes->merge(['class' => "w-full col-span-4 md:col-start-2 primary-button md:col-span-2"]) }}>
        {{ $slot }}
       </button>
   </div>
