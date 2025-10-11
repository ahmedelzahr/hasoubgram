<x-app-layout>
    <x-post.form url='create_post'>
        <x-slot name='head'>
            {{ __('Create a Post') }}
        </x-slot>
        <x-slot name='button'>
            {{ __('Create') }}
        </x-slot>
    </x-post.form>
</x-app-layout>
