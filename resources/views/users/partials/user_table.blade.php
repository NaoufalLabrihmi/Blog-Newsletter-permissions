<div class="flex flex-col mt-8">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <div class="sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8 py-2 -my-2 overflow-x-auto">
        <div class="sm:rounded-lg inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <x-th>ID</x-th>
                        <x-th>Name</x-th>
                        <x-th>Username</x-th>
                        <x-th>Email</x-th>
                        <x-th>Verified</x-th>
                        <x-th>Joined</x-th>
                        <x-th>Updated</x-th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach ($users as $item)
                    <tr>
                        <x-td>
                            {{ $item->id }}
                        </x-td>
                        <x-td>
                            {{ $item->name }}
                        </x-td>
                        <x-td>
                            {{ $item->username }}
                        </x-td>
                        <x-td>
                            {{ $item->email }}
                        </x-td>
                        <x-td>
                            <div class="flex items-center justify-center">
                                @if ($item->email_verified_at === null)
                                <div class="w-4 h-4 px-1 py-2 bg-yellow-500 rounded-full"></div>
                                @else
                                <div class="w-4 h-4 px-1 py-2 bg-green-500 rounded-full"></div>
                                @endif
                            </div>
                        </x-td>
                        <x-td>
                            {{ $item->created_at->format('d F Y') }}
                        </x-td>
                        <x-td>
                            {{ $item->updated_at->format('d F Y') }}
                        </x-td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <section class="py-4">
            {{$users->onEachSide(1)->links()}}
        </section>
    </div>
</div>