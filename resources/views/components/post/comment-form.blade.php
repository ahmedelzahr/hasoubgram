  <div class="w-full border-t p-5">
                <form action="/posts/{{ $post->slug }}/comments/create" method="post" class="w-full">
                    @csrf
                    @if ($errors->has('body'))
                        <div class="text-red-500">
                            {{ $errors->first('body') }}
                        </div>
                    @endif
                    <div class="flex  ">
                        <textarea class="h-5 grow border-none outline-0 bg-none resize-none focus:ring-0 p-0 overflow-hidden" id="comment-area" name="body"
                            rows="2" placeholder='{{ __('add a comment ...') }}'></textarea>

                        <input type="submit" value='{{ __('submit') }}' class="px-4 text-blue-600 cursor-pointer ">
                    </div>
                </form>
            </div>