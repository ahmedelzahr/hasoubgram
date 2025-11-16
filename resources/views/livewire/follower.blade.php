 <div class="flex flex-col md:flex-row md:space-x-1 ">
     <div class="font-bold">{{ $this->followerCount }}</div>
     <button onclick="Livewire.dispatch('openModal', { component: 'follower-list', arguments:{ user_id: {{ $user_id }} }})">{{ $this->followerCount > 1 ? __('followers') : __('follower') }}</button>
 </div>
