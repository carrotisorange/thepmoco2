@if($representatives->count())

<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th></x-th>
            <x-th>
                NAME
            </x-th>
            <x-th>
                RELATIONSHIP
            </x-th>
            <x-th>
                MOBILE
            </x-th>
            <x-th>
                EMAIL
            </x-th>
            <x-th>

            </x-th>
            <x-th>

            </x-th>
        </tr>
    </thead>

    @foreach ($representatives as $index => $representative)
    <tbody class="bg-white divide-y divide-gray-200">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <x-td>
                {{$index+1}}
            </x-td>
            <!-- Selected: "text-purple-600", Not Selected: "text-gray-900" -->
            <x-td>
                {{ $representative->representative }}
            </x-td>
            <x-td>
                {{ $representative->relationship->relationship }}
            </x-td>
            <x-td>
                {{ $representative->mobile_number }}
            </x-td>
            <x-td>
                {{ $representative->email }}
            </x-td>
            <x-td>
                @if($representative->valid_id)
                <a href="{{ asset('/storage/'.$representative->valid_id) }}" target="_blank"
                    class="text-purple-600 hover:text-purple-900">View
                    Valid ID</a>
                @else
                Valid ID is not available
                @endif
            </x-td>
            <x-td>

                <a href="#/" wire:click="removeRepresentative({{ $representative->id }})"
                    class="text-red-600 hover:text-red-900">
                    Remove</a>

            </x-td>
        </tr>

    </tbody>

    @endforeach

</table>


@else
<div class=" mt-10 text-center mb-10 ">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
        aria-hidden="true">
        <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
    </svg>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No representatives</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <button type="button"
            onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/representative/create'"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

            New representative
        </button>
    </div>
</div>
@endif