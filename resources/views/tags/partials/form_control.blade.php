<div class="mt-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div>
        <label for="name" class="md:w-1/2 flex flex-col w-full">
            Tag Name
            <input type="text" value="{{old('name') ?? $tag->name}}" id="name" name="name"
                class="form-input text-gray-800 rounded">
        </label>
        <label for="name" class="flex flex-col w-full md:w-1/2 {{$hidden ?? 'block'}}">
            Tag Slug
            <input type="text" value="{{old('slug') ?? $tag->slug}}" id="slug" name="slug"
                class="form-input text-gray-800 rounded">
        </label>
    </div>
    <div class="mt-2">
        <x-button>
            {{$submit}}
        </x-button>
    </div>
</div>