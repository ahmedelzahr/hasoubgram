<x-app-layout>
    <div class="md:flex h-screen">
        {{-- left --}}
        <div class="bg-black md:w-7/12  object-cover overflow-clip flex items-center">
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-full">
        </div>
        {{-- right --}}

        <div class="bg-white md:w-5/12 w-full flex flex-col">
            {{-- top --}}
            <div class="flex  items-center border-b-2 p-4">
                <x-user.user-avatar :image="$post->owner->image" />
                <div class="grow">
                    <a href="{{ route('user_profile', $post->owner->userName) }}"
                        class="text-sm font-bold">{{ $post->owner->name }}</a>
                </div>


                @can('update', $post)
                    <a href={{ route('edit_post', $post->slug) }}>
                        <box-icon name='edit-alt'></box-icon>
                    </a>
                    <form action="{{ route('delete_post', $post->id) }}" method="POST"
                        id="delete_form_{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDelete({{ $post->id }})">
                            <box-icon name='trash' class="fill-red-700"></box-icon>
                        </button>
                        <p id="tets"></p>
                    </form>
                @endcan
                @cannot('update', $post)
                    @if (auth()->user()->isFollowing($post->owner))
                        <form action="{{ route('unfollow_user', $post->owner->id) }}" method="POST"
                            class="text-red-500 text-sm font-bold">
                            @csrf
                            <button type="submit">
                                {{ __('Unfollow') }}
                            </button>
                        </form>
                    @elseif (auth()->user()->isPending($post->owner))
                        <div type="submit" class="text-red-700 text-sm font-bold">
                            {{ __('Pending') }}
                        </div>
                    @else
                        <form action="{{ route('follow_user', $post->owner->id) }}" method="POST"
                            class="text-blue-500 text-sm font-bold">
                            @csrf
                            <button type="submit">
                                {{ __('Follow') }}
                            </button>
                        </form>
                    @endif
                @endcannot




            </div>
            {{-- middle --}}
            <div class="grow">
                <div class="flex  items-center p-4">

                    <img src="{{ $post->owner->image }}" alt="user_img"
                        class="rounded-full h-10 w-10 ltr:mr-5 rtl:ml-5">

                    <div class="flex flex-col">
                        <div>
                            <a href="" class="text-sm font-bold grow">{{ $post->owner->name }}</a>
                            <span class="inline">{{ $post->description }}</span>
                        </div>
                        <div class="text-sm mt-1 text-gray-400">
                            {{ $post->created_at->diffForHumans(null, true, true) }}
                        </div>
                    </div>
                </div>
                @foreach ($post->comments as $comment)
                    <div class="flex  items-center p-4">
                        <x-user.user-avatar :image="$comment->owner->image" />
                        <div class="flex flex-col">
                            <div>
                                <a href="" class="text-sm font-bold grow">{{ $comment->owner->name }}</a>
                                <span class="inline">{{ $comment->body }}</span>
                            </div>
                            <div class="text-sm mt-1 text-gray-400">
                                {{ $comment->created_at->diffForHumans(null, true, true) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="flex space-x-2 p-4 border-t border-t-gray-200">
                <x-post.like-form :post="$post" />
                <button onclick="document.getElementById('comment-area').focus()">
                    <box-icon name='comment'></box-icon>
                </button>
            </div>


            {{-- comment form --}}
            <x-post.comment-form :post="$post" />
        </div>
    </div>

</x-app-layout>
<script>
    function confirmDelete(post) {
        Swal.fire({
            title: 'delete_form_' + post,
            text: 'Do you want to continue',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete_form_' + post).submit();
            }
        });
    }
</script>
