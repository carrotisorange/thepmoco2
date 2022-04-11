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
        <div class="rounded">
            <x-input wire:model="search" type="text" class=" py-2 w-full" placeholder="Enter tenant..." />
        </div>

        <div class="mt-5">
            {{ $tenants->links() }}
        </div>
        <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-gray-200">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            @if (!$tenants->count())
                            <span class="text-center text-red">No tenants found!</span>
                            @else
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <?php $ctr =1; ?>
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                #</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tenant</th>
                                            {{-- <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Duration</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Unit</th> --}}
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Contact</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Added on</th>
                                            {{-- <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Rent/mo</th> --}}
                                            {{-- <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Status</th> --}}

                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach ($tenants as $tenant)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                {{ $ctr++ }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
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
                                            </td>
                                            {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{
                                                    Carbon\Carbon::parse($contract->start)->format('M d, Y').' -
                                                    '.Carbon\Carbon::parse($contract->end)->format('M d, Y') }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{
                                                    Carbon\Carbon::parse($contract->end)->diffForHumans($contract->start)
                                                    }}
                                                </div>
                                            </td> --}}

                                            {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $contract->unit }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{
                                                    $contract->building }}
                                                </div>
                                            </td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $tenant->email }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{
                                                    $tenant->mobile_number }}
                                                </div>
                                            </td>
                                            {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                {{number_format($contract->contract_rent, 2)}}
                                            </td> --}}
                                            {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                @if($contract->contract_status === "active")
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ $contract->contract_status }} </span>
                                                @else
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    {{ $contract->contract_status }} </span>
                                                @endif
                                            </td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                $tenant->created_at->diffForHumans() }}</td>

                                           <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                              <a title="show" href="/tenant/{{ $tenant->uuid }}" class="text-indigo-600 hover:text-indigo-900"><i
                                                        class="fa-solid fa-2x fa-eye"></i></a>
                                              
                                            
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>

                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>