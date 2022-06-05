<x-app-layout>
    @section('title', '| Units')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">
                                    Units
                                </li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button
                        onclick="window.location.href='/property/{{ Session::get('property') }}/units/'"><i class="fa-solid fa-table-cells-large"></i>&nbsp Units   
                    </x-button>
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="">
                <x-search placeholder="search for name, mobile, or email"></x-search>
            </div> --}}
            <div class="mt-5">
                {{ $units->links() }}
            </div>
            <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <x-th>#</x-th>
                                                <x-th>Unit</x-th>
                                                <x-th>Status</x-th>
                                                <x-th>Tenant</x-th>
                                                {{-- <x-th>Owner</x-th> --}}
                                                <x-th>Rent/mo</x-th>
                                                
                                            </tr>
                                        </thead>
                                        @foreach ($units as $index => $unit)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <x-td>{{ $index  }}</x-td>
                                                <x-td><a class="text-blue-600" href="/unit/{{ $unit->unit->uuid }}/contracts">{{ $unit->unit->building->building.' '.$unit->unit->unit }}</a></x-td>
                                                <x-td>{{ $unit->unit->status->status }}</x-td>
                                                <x-td><a class="text-blue-600" href="/tenant/{{ $unit->tenant->uuid }}/contracts">{{ $unit->tenant->tenant }}</a></x-td>
                                                <?php
                                                   $owner = App\Models\Enrollee::where('unit_uuid', $unit->unit->uuid)->pluck('owner_uuid')->first();              
                                             
                                                ?>
                                                {{-- <x-td>{{ App\Models\Owner::find($owner) }}</x-td> --}}
                                                <x-td>{{ number_format($unit->rent, 2) }}</x-td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>