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
            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
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
                    class="text-indigo-600 hover:text-indigo-900">View
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