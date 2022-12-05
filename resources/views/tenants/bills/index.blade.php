<x-new-layout>
    @section('title', $tenant->tenant.' | '.Session::get('property_name'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="my-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:grid grid-cols-1 lg:grid-cols-4 sm:items-center">

                <nav class="mt-5 border-b flex col-start-1" aria-label="Breadcrumb">
                     <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6">
                        
                        <li class="flex">
                            <div class="flex items-center"> 
                                <button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant'" class="text-lg font-medium text-gray-500 hover:text-gray-700" aria-current="page">
                                Tenants</button>
                            </div>
                        </li>

                        <li class="flex">
                            <div class="flex items-center">
                                <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                </svg>
                                    <button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}'" class="ml-4 text-lg font-medium text-gray-500 hover:text-gray-700 ">
                                    {{ $tenant->tenant }} </a>
                            </div>
                        </li>

                        <li class="flex">
                            <div class="flex items-center">
                                <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                                </svg>
                                    <button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/bills'" class="ml-4 text-lg font-bold text-gray-700 hover:text-gray-700" aria-current="page">
                                    Bills</button>
                            </div>
                     
                       </li>
                    </ol>
                </nav>

                <div class="col-span-3 flex sm:justify-center lg:justify-end items-end">
                    <div class="sm:my-10 md:my-5 lg:my-0">

                        @if($total_unpaid_bills->count())
                        <button type="button" data-modal-toggle="export-tenant-bill"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Export
                            Bills ({{
                            App\Models\Tenant::find($tenant->uuid)->bills()->where('status', '!=','paid')->count()
                            }})</a></button>

                        <button type="button" data-modal-toggle="send-tenant-bill"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Send
                            Bills ({{ App\Models\Tenant::find($tenant->uuid)->bills()->where('status',
                            '!=', 'paid')->count() }})</a></button>
                            @endif
                        
               
                        <button type="button" data-modal-toggle="create-tenant-bill"
                            class="inline-flex items-end justify-end rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            Create Bill</a></button>

                        <button type="button" data-modal-toggle="create-particular"
                            class="inline-flex items-end justify-end rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            Create Particular</a></button>
                    </div>
                </div>
        </div>
            @livewire('tenant-bill-component', ['tenant'=> $tenant])

</x-new-layout>
@include('modals.create-tenant-bill')
@include('modals.export-tenant-bill')
@include('modals.send-tenant-bill')
@include('modals.create-particular')