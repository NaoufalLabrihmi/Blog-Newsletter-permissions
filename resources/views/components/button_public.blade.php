<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2
    bg-gray-800 dark:bg-gray-100 border border-transparent rounded-md font-semibold text-xs dark:text-black text-white
    uppercase
    tracking-widest
    hover:bg-gray-700 dark:hover:bg-gray-200 dark:active:bg-gray-300 active:bg-gray-900 focus:outline-none
    focus:border-gray-900 dark:focus:border-gray-300 focus:ring ring-gray-300 dark:ring-gray-900 disabled:opacity-25
    transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>