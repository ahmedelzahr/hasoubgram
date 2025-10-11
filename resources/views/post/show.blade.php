<x-app-layout>
    <div class="md:flex h-screen" dir="ltr">
        {{-- left --}}
        <div class="bg-black md:w-7/12  object-cover overflow-clip flex items-center">
            <img src="{{ asset('storage/' . $post->image) }}" alt="" class="w-full">
        </div>
        {{-- right --}}

        <div class="bg-white md:w-5/12 w-full flex flex-col">
            {{-- top --}}
            <div class="flex  items-center border-b-2 p-4">
                <img src="{{ $post->owner->image }}" alt="user_img" class="rounded-full h-10 w-10 ltr:mr-5 rtl:ml-5">
                <div class="grow">
                    <a href="" class="text-sm font-bold">{{ $post->owner->name }}</a>
                </div>

                @if (Auth::id() == $post->owner->id)
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
                @endif



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

                        <img src="{{ $comment->owner->image }}" alt="user_img"
                            class="rounded-full h-10 w-10 ltr:mr-5 rtl:ml-5">

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
            {{-- comments --}}

            {{-- comment form --}}
            <div class="w-full border-t p-5">
                <form action="/posts/{{ $post->slug }}/comments/create" method="post" class="w-full">
                    @csrf
                    @if ($errors->has('body'))
                        <div class="text-red-500">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                    <div class="flex  ">
                        <textarea class="h-5 grow border-none outline-0 bg-none resize-none focus:ring-0 p-0 overflow-hidden" name="body"
                            rows="2" placeholder='{{ __('add a comment ...') }}'></textarea>

                        <input type="submit" value='{{ __('submit') }}' class="px-4 text-blue-600 cursor-pointer ">
                    </div>
                </form>
            </div>
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
 
