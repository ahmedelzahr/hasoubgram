  <div class="md:w-7/12 w-full">
      @forelse ($posts as $post)
          <livewire:post :post="$post" wire:key="post.{{ $post->id }}"/>
      @empty
      @endforelse
  </div>
