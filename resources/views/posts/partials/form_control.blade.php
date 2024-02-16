<div class="mt-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div class="md:flex-row flex flex-col">
        <div class="md:w-2/3 w-full">
            <div class="flex flex-wrap mb-4">
                <label for="tags" class="flex flex-col w-full">
                    Tags
                    <select name="tags[]" id="tags" class="select2 block mt-2 text-sm" multiple="multiple">
                        @foreach ($post->tags as $tag)
                        <option selected value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </label>
            </div>
            <label for="name" class="flex flex-col mb-4">
                Title
                <input type="text" value="{{old('title') ?? $post->title}}" id="title" name="title"
                    class="form-input text-gray-800 rounded">
            </label>
            <label for="overview" class="flex flex-col mb-4">
                Overview
                <textarea id="overview" name="overview" rows="4" cols="50"
                    class="form-textarea text-gray-800 rounded">{{old('overview') ?? $post->overview}}</textarea>
            </label>
            <label for="description" class="flex flex-col mb-4">
                Description
                <textarea id="description" name="description" class="form-input text-gray-800 rounded">
                {{old('description') ?? $post->description}}
                </textarea>
            </label>
        </div>
        <div class="md:w-1/3 w-full p-2">
            <div class="flex flex-wrap mb-4">
                <div class="relative w-full mt-4 mb-4 overflow-hidden">
                    <button
                        class="hover:bg-blue-400 inline-flex items-center w-full px-4 py-2 font-light text-white bg-blue-500"
                        type="button" style="transition:all .15s ease">
                        <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z" />
                        </svg>
                        <span class="ml-2">Thumbnail</span>
                        <input value="{{old('thumbnail') ?? $post->thumbnail}}"
                            class="pin-r pin-t absolute block w-full px-4 py-2 opacity-0 cursor-pointer" type="file"
                            name="thumbnail" id="thumbnail" onchange="previewThumbnail();">
                    </button>
                </div>
                <img class="object-cover w-full" id="img-thumbnail"
                    src="@if($post->thumbnail){{old('thumbnail') ?? asset($post->thumbnail)}} @else https://place-hold.it/400x300?text=Post Thumbnail&italic&fontsize=20 @endif" />

            </div>
            {{-- Images --}}
            <div class="relative w-full mt-4 mb-4 overflow-hidden">
                <button
                    class="hover:bg-blue-400 inline-flex items-center w-full px-4 py-2 font-light text-white bg-blue-500"
                    type="button" style="transition:all .15s ease">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="ml-2">Images Galeri</span>
                    <input class="pin-r pin-t absolute block w-full px-4 py-2 opacity-0 cursor-pointer" type="file"
                        name="images[]" id="file-input" multiple accept="image/*">
                    @if ($errors->has('files'))
                    @foreach ($errors->get('files') as $error)
                    <span class="text-red-500" role="alert">
                        <strong>{{ $error }}</strong>
                    </span>
                    @endforeach
                    @endif
                </button>
            </div>
            <div id="preview" class="inline-flex overflow-x-auto"></div>
            @if($post->images)
            <div class="p-1">
                <h1 class="text-sm capitalize">Old Images</h1>
                <div class="inline-flex overflow-x-auto border">
                    @foreach(json_decode($post->images, true) as $key => $value)
                    <img class="object-cover w-24 h-24" src="{{'/storage/images/posts/galeri/'.$value}}"
                        alt="Gallery Pic {{$key}}" />
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="mt-2">
        <x-button>
            {{$submit}}
        </x-button>
    </div>
</div>
@push('script')
<script>
    CKEDITOR.replace('description');
</script>
<script type="text/javascript">
    function previewThumbnail() {
        document.getElementById("img-thumbnail").style.display = "block";
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("thumbnail").files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("img-thumbnail").src = oFREvent.target.result;
        };
    };
</script>
<script>
    function previewImages() {
        var preview = document.querySelector('#preview');

        if (this.files) {
            [].forEach.call(this.files, readAndPreview);
        }

        function readAndPreview(file) {
            // Make sure `file.name` matches our extensions criteria
            if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                return alert(file.name + " is not an image");
            } // else...

            var reader = new FileReader();

            reader.addEventListener("load", function() {
                var image = new Image();
                image.className = 'w-24 h-24 object-cover';
                image.title = file.name;
                image.src = this.result;
                preview.appendChild(image);
            });

            reader.readAsDataURL(file);

        }
    }
    document.querySelector('#file-input').addEventListener("change", previewImages);
</script>
@endpush