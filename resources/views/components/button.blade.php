<button {{ $attributes->merge(['type' => 'submit', 'class' => '"ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white
bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500']) }}>
    {{ $slot }}
</button>
