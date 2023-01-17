@if($wallets->count())
<table class="min-w-full table-fixed">
    <thead class="">
        <tr>
            <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">
            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900"> #
            </th>
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                DESCRIPTION</th>
            {{-- <x-th>UNIT</x-th> --}}
            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                AMOUNT</th>
            {{-- <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
            </th> --}}

        </tr>
    </thead>
    @foreach ($wallets as $index => $item)
    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->
                {{--
                <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-purple-600 focus:ring-purple-500 sm:left-6">
                --}}
            </td>
            <!-- Selected: "text-purple-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                {{ $index+1}}
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ $item->description }}
            </td>

            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

            </td> --}}

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ number_format($item->amount, 2) }}
            </td>

            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline" href="#/"
                    wire:click='remove({{ $item->id }})'>
                    Remove
                </a>
            </td>
            --}}
        </tr>

    </tbody>
    @endforeach

    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                <!-- Selected row marker, only show when row is selected. -->
                {{--
                <input type="checkbox"
                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-purple-600 focus:ring-purple-500 sm:left-6">
                --}}
            </td>
            <!-- Selected: "text-purple-600", Not Selected: "text-gray-900" -->
            <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
               Total
            </td>

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                
            </td>

            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

            </td> --}}

            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                {{ number_format($wallets->sum('amount'), 2) }}
            </td>

            {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline" href="#/"
                    wire:click='remove({{ $item->id }})'>
                    Remove
                </a>
            </td>
            --}}
        </tr>
    </tbody>
</table>

@else
<div class=" mt-10 text-center mb-10">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No funds</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <button type="button"
            onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/wallet/{{ Str::random(8) }}/create'"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            <!-- Heroicon name: mini/plus -->
            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                aria-hidden="true">
                <path
                    d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
            </svg>
            Add funds
        </button>
    </div>
</div>
@endif