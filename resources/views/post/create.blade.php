<x-app-layout>
    <div class="card p-10">
        <h2 class="text-2xl mb-10">{{ __("Create a New Post") }}</h2>
        @if($errors->any())
        <div class="w-full bg-red-50 text-red-700 p5 mb-5">
            <ul class="disc-list-pl-4">
                @foreach ($errors as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      
        @endif
         <form action="posts/create" method="post" enctype="multipart/form-data" >
            @csrf
            <input    type="file" class="w-full border border-gray-200 rounded-xl " name="image" >
            <p class="text-sm text-gray-500 mt-2">PNG,JPG or GIF </p>
           <textarea name="description" class="w-full border border-gray-200 rounded-xl mt-10 " rows="5" placeholder={{ __('write a descriprtion')}}></textarea>
           <x-primary-button class="mt-4">
            {{ __("Create Post") }}
           </x-primary-button>
            
        </form>
    </div>
     
</x-app-layout>