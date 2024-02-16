<x-app-layout>
    <x-slot name="title">Assigns Permissions</x-slot>
    <div class="py-6">
        <div class="max-w-7xl sm:px-6 lg:px-8 mx-auto">
            <div class="sm:rounded-xl overflow-hidden bg-white shadow-md">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-semibold">Assigns Permissions | Api</h1>
                    <form action="{{route('assign.create')}}" method="POST" autocomplete="off"
                        enctype="multipart/form-data">
                        @csrf
                        @include('rap.assignsApi.partials.form_control', [
                        'submit' => 'Assign Permission'
                        ])
                    </form>
                    <div class="mt-5">
                        @include('rap.assigns.partials.assign_table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>