<div class="overflow-x-auto border-b border-gray-200 rounded-lg shadow">
    <table class="min-w-full bg-green-500">
        <thead>
            <tr>
                <x-th>#</x-th>
                <x-th>Role</x-th>
                <x-th>Guard</x-th>
                <x-th>Permission</x-th>
                <x-th>Edit</x-th>
            </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($roles as $index => $role)
            <tr>
                <x-td>
                    {{$index+1}}
                </x-td>
                <x-td>
                    {{$role->name}}
                </x-td>
                <x-td>
                    <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{$role->guard_name}}</span>
                </x-td>
                <x-td>
                    {{ implode(' | ', $role->getPermissionNames()->toArray())}}
                </x-td>
                <x-td>
                    <a href="{{route('assign.edit', $role)}}" class="hover:text-indigo-900 text-indigo-600">Edit</a>
                </x-td>
            </tr>
            @endforeach
        </tbody>
        {{-- End User Role role --}}
    </table>
</div>