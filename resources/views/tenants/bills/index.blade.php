<x-new-layout>
    @section('title', $tenant->tenant.' | '.Session::get('property_name'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $tenant->tenant }} /
                        Bills</h1>
                </div>
                @if($total_unpaid_bills->count())
                <button type="button" data-modal-toggle="export-tenant-bill"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Export
                    Bills ({{
                    App\Models\Tenant::find($tenant->uuid)->bills()->where('status', '!=','paid')->count()
                    }})</a></button>

                <button type="button" data-modal-toggle="send-tenant-bill"
                    class="ml-2 inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Send
                    Bills ({{ App\Models\Tenant::find($tenant->uuid)->bills()->where('status',
                    '!=', 'paid')->count() }})</a></button>
                @endif

                <button type="button" data-modal-toggle="create-tenant-bill"
                    class="ml-2 inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Create Bill</a></button>

                <button type="button" data-modal-toggle="create-particular"
                    class="ml-2 inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Create Particular</a></button>

            </div>
            @livewire('tenant-bill-component', ['tenant'=> $tenant])

</x-new-layout>
@include('modals.create-tenant-bill')
@include('modals.export-tenant-bill')
@include('modals.send-tenant-bill')
@include('modals.create-particular')