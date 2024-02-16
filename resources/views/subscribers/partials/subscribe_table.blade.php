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
                        <th class="text-gray-50 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left uppercase bg-blue-300 border-b border-gray-200">
                            Email</th>
                        <th class="text-gray-50 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left uppercase bg-blue-300 border-b border-gray-200">
                            Edit</th>
                        <th class="text-gray-50 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left uppercase bg-blue-300 border-b border-gray-200">
                            Delete</th>
                        <th class="text-gray-50 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left uppercase bg-blue-300 border-b border-gray-200">
                            Send Email</th>
                    </tr>



                    <x-modal>
                        <x-slot name="trigger">
                            <x-button type="submit" class="hover:bg-blue-600 bg-blue-500">
                                Send Email to Subscribers
                            </x-button>
                        </x-slot>
                        <x-slot name="content">
                            <div class="p-2 mb-5">
                                <h3 class="text-lg text-gray-600">Send an email to All <span class="font-bold text-gray-800"></span>:</h3>
                            </div>
                            <form action=<?= "subscribers/sendemailall" ?> method="post">
                                @csrf
                                <div class="mb-4">
                                    <label for="greeting" class="block text-sm font-medium leading-5 text-gray-700">Greeting</label>
                                    <input id="greeting" name="greeting" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('greeting') }}" required>
                                </div>
                                <!-- <div class="mb-4">
                                            <label for="body" class="text-xl text-gray-600">Body</label></br>
                                            <textarea id="body" name="body" class="border-2 border-gray-500" required>{{ old('body') }}</textarea>
                                        </div> -->
                                <div class="mb-8">
                                    <label for="content" class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                                    <textarea name="content" class="border-2 border-gray-500" require>{{ old('body') }}

                                    </textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="actiontext" class="block text-sm font-medium leading-5 text-gray-700">Action Text</label>
                                    <input id="actiontext" name="actiontext" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('actiontext') }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="actionurl" class="block text-sm font-medium leading-5 text-gray-700">Action URL</label>
                                    <input id="actionurl" name="actionurl" type="url" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('actionurl') }}" required>
                                </div>
                                <div class="mb-4">
                                    <label for="endtext" class="block text-sm font-medium leading-5 text-gray-700">End Text</label>
                                    <input id="endtext" name="endtext" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('endtext') }}" required>
                                </div>
                                <x-button type="submit" class="hover:bg-red-600 bg-red-500">
                                    Send Email
                                </x-button>
                            </form>
                        </x-slot>
                    </x-modal>
                    </form>

                </thead>

                <tbody class="bg-white">
                    @foreach ($subscribers as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                            <div class="text-sm leading-5 text-gray-600">{{ $item->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <x-modal>
                                <x-slot name="trigger">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="mb-5">
                                        <h3 class="text-lg text-gray-600">Update <span class="font-bold text-gray-800">{{
                                                $item->email
                                                }}</span></h3>
                                    </div>
                                    <form action="{{route('subscribe.update', $item->id)}}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <label for="email" class="md:w-1/2 flex flex-col w-full mb-3">
                                            Subscriber Email
                                            <input type="email" value="{{old('email') ?? $item->email}}" id="email" name="email" class="form-input text-gray-800 rounded">
                                        </label>
                                        <x-button type="submit" class="hover:bg-blue-600 bg-blue-500">
                                            Update
                                        </x-button>
                                    </form>
                                </x-slot>
                            </x-modal>
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <x-modal>
                                <x-slot name="trigger">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="p-2 mb-5">
                                        <h3 class="text-lg text-gray-600">Are you sure delete <span class="font-bold text-gray-800">{{ $item->email }}</span></h3>
                                    </div>
                                    <form action="{{route('subscribe.delete', $item->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <x-button type="submit" class="hover:bg-red-600 bg-red-500">
                                            Delete
                                        </x-button>
                                    </form>
                                </x-slot>
                            </x-modal>
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                            <x-modal>
                                <x-slot name="trigger">
                                    <button class="w-6 h-6 text-green-500 hover:text-red-700">
                                        Send Email
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="p-2 mb-5">
                                        <h3 class="text-lg text-gray-600">Send an email to <span class="font-bold text-gray-800">{{ $item->email }}</span>:</h3>
                                    </div>
                                    <form action="{{ route('subscribe.sendemail', $item->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-4">
                                            <label for="greeting" class="block text-sm font-medium leading-5 text-gray-700">Greeting</label>
                                            <input id="greeting" name="greeting" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('greeting') }}" required>
                                        </div>
                                        <!-- <div class="mb-4">
                                            <label for="body" class="text-xl text-gray-600">Body</label></br>
                                            <textarea id="body" name="body" class="border-2 border-gray-500" required>{{ old('body') }}</textarea>
                                        </div> -->
                                        <div class="mb-8">
                                            <label for="content" class="text-xl text-gray-600">Content <span class="text-red-500">*</span></label></br>
                                            <textarea name="content" class="border-2 border-gray-500" require>{{ old('body') }}

                                            </textarea>
                                        </div>
                                        <div class="mb-4">
                                            <label for="actiontext" class="block text-sm font-medium leading-5 text-gray-700">Action Text</label>
                                            <input id="actiontext" name="actiontext" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('actiontext') }}" required>
                                        </div>

                                        <div class="mb-4">
                                            <label for="actionurl" class="block text-sm font-medium leading-5 text-gray-700">Action URL</label>
                                            <input id="actionurl" name="actionurl" type="url" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('actionurl') }}" required>
                                        </div>
                                        <div class="mb-4">
                                            <label for="endtext" class="block text-sm font-medium leading-5 text-gray-700">End Text</label>
                                            <input id="endtext" name="endtext" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('endtext') }}" required>
                                        </div>
                                        <x-button type="submit" class="hover:bg-red-600 bg-red-500">
                                            Send Email
                                        </x-button>
                                    </form>
                                </x-slot>
                            </x-modal>
                        </td>



                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <section class="py-4">
            {{$subscribers->onEachSide(1)->links()}}
        </section>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('content');
</script>
