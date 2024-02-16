<div class="mt-4">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div>
        <label for="role" class="md:w-1/2 flex flex-col w-full">
            Role
            <select class="form-select text-gray-800 rounded" name="role" id="role">
                <option selected disabled>Choose a Role !</option>
                @foreach ($roles as $item)
                <option {{$role->id == $item->id ? 'selected' : '' }} {{ $item->guard_name ===
                    'web' ? 'disabled' : '' }} value="{{$item->id}}">{{$item->name}} ({{ $item->guard_name ===
                    'web' ? 'web' : 'api' }})</option>
                @endforeach
            </select>
        </label>
        <label for="permissions" class="md:w-1/2 flex flex-col w-full">
            Permissions
            <select class="select2 form-select text-gray-800 rounded" name="permissions[]" id="permissions" multiple>
                @foreach ($permissions as $permission)
                <option {{$role->permissions()->find($permission->id) ? 'selected' : ''}} {{ $permission->guard_name ===
                    'web' ? 'disabled' : '' }}
                    value="{{$permission->id}}">{{$permission->name}} ({{ $permission->guard_name ===
                    'web' ? 'web' : 'api' }})</option>
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