<div class="overflow-x-auto border-b border-gray-200 rounded-lg shadow">
    <table class="min-w-full bg-green-500">
        <thead>
            <tr>
                <x-th>ID</x-th>
                <x-th>Name</x-th>
                <x-th>Email</x-th>
                <x-th>Roles</x-th>
                <x-th>Created</x-th>
                <x-th>Updated</x-th>
                <x-th>Edit</x-th>
            </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($users as $index => $user)
            <tr>
                <x-td>
                    {{$index+1}}
                </x-td>
                <x-td>
                    {{$user->name}}
                </x-td>
                <x-td>
                    <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{$user->email}}</span>
                </x-td>
                <x-td>
                    <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{
                        implode(' |
                        ', $user->getRoleNames()->toArray())}}</span>
                </x-td>
                <x-td>
                    {{$user->created_at->format('d/m/y')}}
                </x-td>
                <x-td>
                    {{$user->updated_at->format('d/m/y')}}
                </x-td>
                <x-td>
                    <a href="{{route('assign.user.edit', $user)}}"
                        class="hover:text-indigo-900 text-indigo-600">Edit</a>
                </x-td>
            </tr>
            @endforeach
        </tbody>
        {{-- End User Role Permission --}}
    </table>
</div>