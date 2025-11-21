<div class="card ">
    <div class="card-header p-4">
        <x-user.user-avatar :image="$post->owner->image" />
        <a href="{{ route('user_profile',$post->owner->userName) }}" class="font-bold ltr:ml-1 rtl:mr-1">{{ $post->owner->userName }}</a>
    </div>
    <div class="card-body ">
        <div class="max-h-[35rem]  overflow-hidden">
            <img class="w-full object-fit-cover" src={{ asset('storage/' . $post->image) }}
                alt="{{ $post->description }}">
        </div>
        <div class="flex flex-col px-4 gap-4 my-4">
            <div class="flex">
                <a href="#" class="font-bold">{{ $post->owner->userName }}</a>
                {{ $post->description }}
            </div>
            <div class="flex space-x-2">
              <livewire:like :post="$post"/>
                <a href="{{ route('show_post' , $post->slug) }}">
                    <box-icon name='comment'></box-icon>
                </a>
            </div>
            @if ($post->comments->count() > 0)
                <a class="font-blod text-sm text-gray-500" href="{{ route('show_post', $post->slug) }}">View all
                    {{ $post->comments->count() }} Comments</a>
            @endif
            <p class="text-gray-400 text-sm uppercase">{{ $post->created_at->diffForHumans(null, true, true) }}</p>
        </div>

    </div>
    <div class="card-footer">
        <x-post.comment-form :post="$post" />
    </div>

</div>
