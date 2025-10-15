<div class="flex  items-center mb-4">
    <x-user.user-avatar :image="$user->image" />
    <div class="flex flex-col">
        <div>
            <a href="" class="text-sm font-bold grow">{{ $user->userName }}</a>
        </div>
        <div class="text-sm mt-1 text-gray-400">
            {{ $user->name }}
        </div>
    </div>
</div>
