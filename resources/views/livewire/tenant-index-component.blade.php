@section('title', '| Tenants')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <div class="flex">
            <div class="h-3">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <nav class="rounded-md">
                        <ol class="list-reset flex">
                            <li><a href="/property/{{ Session::get('property') }}"
                                    class="text-indigo-600 hover:text-indigo-700">{{
                                    Session::get('property_name') }}</a>
                            </li>
                            <li><span class="text-gray-500 mx-2">/</span></li>
                            <li class="text-gray-500">
                                {{ Str::plural('Tenant', $tenants->count())}}
                            </li>
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
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            <x-search placeholder="search for tenants"></x-search>
        </div>
        <div class="mt-5">
            {{ $tenants->links() }}
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
                                            <x-th>Name</x-th>
                                            <x-th>Contact</x-th>
                                            <x-th>Address</x-th>
                                            <x-th>Created</x-th>
                                            <x-th></x-th>
                                        </tr>
                                    </thead>
                                    @forelse ($tenants as $tenant)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <x-td>{{ $ctr++ }}</x-td>
                                            <x-td>
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">

                                                        <img class="h-10 w-10 rounded-full"
                                                            src="/storage/{{ $tenant->photo_id }}" alt="">
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900"><b>{{
                                                                $tenant->tenant }}</b>
                                                        </div>
                                                        <div class="text-sm text-gray-500">{{
                                                            $tenant->type }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-td>
                                            <x-td>
                                                <div class="text-sm text-gray-900">{{ $tenant->email }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{
                                                    $tenant->mobile_number }}
                                                </div>
                                            </x-td>
                                            <x-td>
                                                <div class="text-sm text-gray-900">{{ $tenant->province->province.',
                                                    '.$tenant->city->city.', '.$tenant->barangay }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{
                                                    $tenant->country->country }}
                                                </div>
                                            </x-td>
                                            <x-td>{{$tenant->created_at->diffForHumans() }}</x-td>
                                            <x-td>
                                                <button id="dropdownDividerButton"
                                                    data-dropdown-toggle="dropdownDivider.{{ $tenant->uuid }}"
                                                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                                                    type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg></button>
                                                <div id="dropdownDivider.{{ $tenant->uuid }}"
                                                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                    <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                                        @can('managerandadmin')
                                                        <li>
                                                            <a href="/tenant/{{ $tenant->uuid }}/edit"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-edit"></i>&nbspShow Tenant</a>
                                                        </li>
                                                        <li>
                                                            <a href="/tenant/{{ $tenant->uuid }}/contracts"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fas fa-file-signature"></i>&nbspShow
                                                                Contracts</a>
                                                        </li>
                                                        <li>
                                                            <a href="/tenant/{{ $tenant->uuid }}/concerns"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-screwdriver-wrench"></i>&nbspShow
                                                                Concerns</a>
                                                        </li>
                                                        @endcan
                                                        @can('billing')
                                                        <li>
                                                            <a href="/tenant/{{ $tenant->uuid }}/bills"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-file-invoice-dollar"></i>&nbspShow
                                                                Bills</a>
                                                        </li>
                                                        @endcan
                                                        @can('treasury')
                                                        <li>
                                                            <a href="/tenant/{{ $tenant->uuid }}/collections"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                                <i class="fa-solid fa-coins"></i>&nbspShow
                                                                Collections</a>
                                                        </li>
                                                        @endcan
                                                    </ul>
                                                    <div class="py-1">
                                                        <li>
                                                            <a href="/tenant/{{ $tenant->uuid }}/delete"
                                                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-trash-alt"></i>&nbspRemove
                                                            </a>
                                                        </li>
                                                    </div>
                                                </div>
                                            </x-td>
                                            @empty
                                            <x-td>No data found!</x-td>
                                        </tr>
                                    </tbody>
                                    @endforelse
                                </table>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>