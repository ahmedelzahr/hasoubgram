 @if ($errors->any())
         <div class="w-full bg-red-50 text-red-700 p5 mb-5">
             <ul class="list-disc pl-4">
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif