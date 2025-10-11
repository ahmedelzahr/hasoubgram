 <div 
 class="card p-10">
     <h2 class="text-2xl mb-10">{{ $head }} </h2>
    <x-errors/>
     <form action={{ route($url , $post->slug??'') }} method="post" enctype="multipart/form-data">
         @csrf
         @if (isSet($post ))
             @method('put')
             <img src="{{ asset('storage/'.$post->image) }}" alt="" class="w-32 h-32 rounded-xl object-cover mb-4">
         @endif
         <input type="file" class="w-full border border-gray-200 rounded-xl " name="image" >
         <p class="text-sm text-gray-500 mt-2">PNG,JPG or GIF </p>
         <textarea name="description" class="w-full border border-gray-200 rounded-xl mt-10 " rows="5"
             placeholder="{{ __('write a descriprtion') }}">{{ old('description' ,$post->description??'') }}</textarea>
         <x-primary-button class="mt-4">
             {{ $button }}
         </x-primary-button>

     </form>
 </div>
