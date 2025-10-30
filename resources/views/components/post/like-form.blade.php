  <form action="{{ route('like_post', $post->slug) }}" method="Post">
      @csrf
      <button type="submit">
          <box-icon name='heart' Type="{{ $post->isLiked(auth()->user()) ? 'solid' : '' }}"
              class="{{ $post->isLiked(auth()->user()) ? 'fill-red-600' : '' }} hover:fill-gray-300"></box-icon>
      </button>
  </form>
