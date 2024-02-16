<div class="overflow-x-auto border-b border-gray-200 rounded-lg shadow">
    <table class="min-w-full bg-green-500">
        <thead>
            <tr>
                <x-th>ID</x-th>
                <x-th>Name</x-th>
                <x-th>Guard</x-th>
                <x-th>Created</x-th>
                <x-th>Updated</x-th>
                <x-th>Edit</x-th>
                <x-th>Delete</x-th>
            </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($permissions as $index => $permission)
            <tr>
                <x-td>
                    {{$index+1}}
                </x-td>
                <x-td>
                    {{$permission->name}}
                </x-td>
                <x-td>
                    <span
                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">{{$permission->guard_name}}</span>
                </x-td>
                <x-td>
                    {{$permission->created_at->format('d/m/y')}}
                </x-td>
                <x-td>
                    {{$permission->updated_at->format('d/m/y')}}
                </x-td>
                <x-td>
                    <a href="{{route('permission.edit', $permission)}}"
                        class="hover:text-indigo-900 text-indigo-600">Edit</a>
                </x-td>
                <x-td>
                    <form action="{{route('permission.delete', $permission)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="hover:text-red-900 -mb-3 text-red-600">Delete</button>
                    </form>
                </x-td>
            </tr>
            @endforeach
        </tbody>
        {{-- End User Role Permission --}}
    </table>
</div>