<div class="mt-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div>
        <label for="name" class="md:w-1/2 flex flex-col w-full">
            Permission Name
            <input type="text" value="{{old('name') ?? $permission->name}}" id="name" name="name"
                class="form-input text-gray-800 rounded">
        </label>
        <label for="name" class="md:w-1/2 flex flex-col w-full">
            Guard
            <select class="form-select text-gray-800 rounded" name="guard_name" id="guard_name">
                <option value="web">web</option>
                <option value="api">api</option>
            </select>
        </label>
    </div>
    <div class="mt-2">
        <x-button>
            {{$submit}}
        </x-button>
    </div>
</div>