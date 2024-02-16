<div class="mt-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div>
        <label for="email" class="md:w-1/2 flex flex-col w-full">
            User Email
            <input value="{{$user->email}}" name="email" id="email" type="email" placeholder="User Email"
                class="form-input text-gray-800 rounded">
        </label>
        <label for="role" class="md:w-1/2 flex flex-col w-full">
            Role
            <select class="select2 form-select text-gray-800 rounded" name="role[]" id="role" multiple>
                @foreach ($roles as $role)
                <option {{$user->roles()->find($role->id) ? 'selected' : ''}} value="{{$role->id}}">{{$role->name}}
                </option>
                @endforeach
            </select>
        </label>
    </div>
    <div class="mt-2">
        <x-button>
            {{$submit}}
        </x-button>
    </div>
</div>