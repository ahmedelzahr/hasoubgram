<x-app-layout>
    <x-post.form :post='$post' url='update_post'>
        <x-slot name='head'>
            {{ __('Edit the Post') }}
        </x-slot>
        <x-slot name='button'>
            {{ __('Edit') }}
        </x-slot>
    </x-post.form>
    
</x-app-layout>
