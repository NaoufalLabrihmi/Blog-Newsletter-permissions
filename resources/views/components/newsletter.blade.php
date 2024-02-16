<div>
    <div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
    </div>
    <div>
        <h3 class="text-base font-semibold">Subscribe to the newsletter</h3>
    </div>
    <form action="{{route('subscriber')}}" method="POST" class="md:flex-row flex flex-col">
        @csrf
        <div class="w-90 relative inline-flex">
            <input type="text" aria-label="newsletter" placeholder="Enter your email" id="email" name="email"
                class="focus:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-black w-full px-4 rounded-md">
            <div class="flex w-full ml-3 rounded-md shadow-sm">
                <x-button_public type="submit">
                    Sign Up
                </x-button_public>
            </div>
        </div>
    </form>
</div>