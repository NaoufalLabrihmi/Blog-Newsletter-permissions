<x-app-layout>
    <x-slot name="title">Assign Role to User</x-slot>
    <div class="py-6">
        <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto">
            <div class="sm:rounded-xl overflow-hidden bg-white shadow-md">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold">Assign Role to User by Email Address</h1>
                    <form action="{{route('assign.user.create')}}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @include('rap.roleUser.partials.form_control', [
                        'submit' => 'Assign Role'
                        ])
                    </form>
                    <div class="mt-5">
                        @include('rap.roleUser.partials.assign_user_table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>