<x-tenant-portal-layout>
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
        <h2 class="p-10 text-center text-3xl font-bold tracking-tight text-gray-900 font-pop">You've
            successfully reported a concern!</h2>
        <div class=" flex items-center justify-center">
            <img class="h-48 w-auto" src="{{ asset('/brands/dashboard_tenant.png') }}">
        </div>

        <div class=" mt-10 flex items-center justify-center">
            <button type="button" onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concern/'"
                class="w-64 items-center px-4 py-2 border border-transparent text-sm font-medium rounded-full shadow-sm text-white text-center bg-gray-900 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Return to concerns page</button>
        </div>
    </div>
</x-tenant-portal-layout>
