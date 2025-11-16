 <div class="flex flex-col md:flex-row md:space-x-1 ">
     <div class="font-bold">{{ $this->followingCount }}</div>
     <button onclick="Livewire.dispatch('openModal', { component: 'following-list', arguments:{ user_id: {{ $user_id }} }})">{{ __('following') }}</button>
 </div>
