   <button wire:click="readAndRedirect()" class="flex">

       <x-user.user-avatar :image="$this->notification->data['userImage']" class="h-9 w-9 " />
       <P>{{ $notification->data['message'] }}</P>
   </button>
