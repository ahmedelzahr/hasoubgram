<div class="flex  items-center mb-4 gap-2">
    <x-user.user-avatar {{ $attributes }} :image="$user->image" />
    <div class="flex flex-col items-start">
        <div>
            <a href="{{ route('user_profile' , $user->userName) }}" class="text-sm font-bold grow">{{ $user->userName }}</a>
        </div>
        <div class="text-sm mt-1 text-gray-400">
            {{ $user->name }}
        </div>
    </div>
</div>
