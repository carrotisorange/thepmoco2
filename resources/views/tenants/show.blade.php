<x-app-layout>
    @section('title', '| '.$tenant->tenant.' | Teant',)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name')}}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session('property') }}/tenants"
                                        class="text-blue-600 hover:text-blue-700">Tenants</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/tenant/{{ $tenant_details->uuid }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        $tenant_details->tenant }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">

                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        @livewire('tenant-edit-component', ['tenant_details' => $tenant_details])
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>