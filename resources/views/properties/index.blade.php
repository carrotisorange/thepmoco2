<x-main-layout>
    @section('title', 'Portfolio | The Property Manager')
    <div class="mx-auto md:w-full px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-10">
        @if(!$properties->count())
        <h2 class="text-2xl font-bold tracking-tight text-gray-900 font-pop">Welcome, {{
            auth()->user()->name }}!</h2>
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                aria-hidden="true">
                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">No properties</h3>
            <p class="mt-1 text-sm text-gray-500">Get started by creating a new property.</p>
            <div class="mt-6">
                <button type="button" onclick="window.location.href='/property/{{ Str::random(8) }}/create'"
                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                    <!-- Heroicon name: solid/plus -->
                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    New Property
                </button>
            </div>
        </div>
        @else
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 font-pop">Welcome back, {{
                auth()->user()->name }}!</h2>
            <p class="mt-2 text-sm text-gray-700">Select a property.</p>

            <div class="mt-1 mb-5 grid grid-cols-5 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($properties as $property)
                <div class="group relative">
                    <div
                        class="w-full h-32 bg-white rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <a href="/property/{{ $property->property->uuid }}">
                            <img src="{{ asset('/brands/property_page.png') }}" alt="building"
                                class="w-40 object-center object-cover lg:w-full lg:h-full">
                        </a>
                    </div>
                    <h3 class="text-medium text-gray-700 font-semibold text-center">{{
                        $property->property->property }}</h3>
                </div>
                @endforeach
            </div>

            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-xl font-semibold text-gray-900">Portfolio</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <button type="button" onclick="window.location.href='/property/{{ Str::random(8) }}/create'"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">New
                        property</button>
                    {{-- <button type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">New
                        property</button>
                    <button type="button"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Edit</button>
                    --}}

                </div>
            </div>
            <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Property</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ $property->property->property }}
                                        </th>
                                        @endforeach

                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Type</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ $property->property->type->type }}
                                        </th>
                                        @endforeach

                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            No. of Units</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ $property->property->units->count() }}
                                        </th>
                                        @endforeach

                                    </tr>

                                    <!-- More properties... -->
                                </tbody>

                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Occupied</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ $property->property->units->where('status_id', 2)->count() }}
                                        </th>
                                        @endforeach

                                    </tr>

                                    <!-- More properties... -->
                                </tbody>

                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Vacant</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ $property->property->units->where('status_id', 1)->count() }}
                                        </th>
                                        @endforeach

                                    </tr>

                                    <!-- More properties... -->
                                </tbody>

                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Pending
                                        </td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ $property->property->units->where('status_id', 6)->count() }}
                                        </th>
                                        @endforeach

                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Occupancy Rate</td>
                                        @foreach ($properties as $property)
                                        @if($property->property->units->count())
                                        <?php $occupancy_rate = $property->property->units->where('status_id', 2)->count()/$property->property->units->count() * 100; ?>
                                        @else
                                        <?php $occupancy_rate = 0;?>
                                        @endif

                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ number_format($occupancy_rate, 2) }} %
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Total bills for Collection</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ number_format($property->property->bills->sum('bill'), 2) }}
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Collected Amount</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{
                                            number_format($property->property->collections->sum('collection'),
                                            2) }}
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Collection Efficiency</td>
                                        @foreach ($properties as $property)

                                        @if($property->property->bills->count())
                                        <?php $collection_efficiency = ($property->property->bills->whereIn('status',
                                                                                ['unpaid', 'partially_paid'])->sum('bill') -
                                                                                $property->property->bills->whereIn('status', ['unpaid',
                                                                                'partially_paid'])->sum('initial_payment')) / $property->property->bills->sum('bill'); ?>
                                        @else
                                        <?php $collection_efficiency = 0;?>
                                        @endif
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ number_format($collection_efficiency, 2) }} %
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            Total Unpaid Collection</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ number_format($property->property->bills->whereIn('status',
                                            ['unpaid', 'partially_paid'])->sum('bill') -
                                            $property->property->bills->whereIn('status', ['unpaid',
                                            'partially_paid'])->sum('initial_payment'), 2) }}
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            No. of past due Accounts</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ $property->property->bills->whereIn('status', ['unpaid',
                                            'partially_paid'])->count() }}
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            No. of Expiring Contracts</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ $property->property->contracts->where('end','
                                            <=',Carbon\Carbon::now()->addMonth())->count() }}
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            No. of Expired Contracts</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{
                                            $property->property->contracts->where('status','inactive')->count()
                                            }}
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            No. of Concerns Received</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{
                                            $property->property->concerns->where('status','received')->count()
                                            }}
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                                <tbody class="divide-y divide-gray-200 bg-white">
                                    <tr>
                                        <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-6">
                                            No. of Concerns Closed</td>
                                        @foreach ($properties as $property)
                                        <th scope="col"
                                            class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-light text-gray-900 sm:pl-6">
                                            {{ $property->property->concerns->where('status','closed')->count()
                                            }}
                                        </th>
                                        @endforeach
                                    </tr>

                                    <!-- More properties... -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</x-main-layout>