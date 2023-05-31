<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Owner</x-th>
            <x-th>Unit</x-th>
            <x-th>Purchasing Price</x-th>
            <x-th></x-th>
            {{-- <x-th></x-th> --}}
            <x-th></x-th>
        </tr>
    </thead>
    @foreach ($deed_of_sales as $index => $deedofsale)
    <tbody class="bg-white divide-y divide-gray-200">
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property') }}/owner/{{ $deedofsale->owner->uuid }}">
                    {{ $deedofsale->owner->owner }}
                </a>
            </x-td>
            <x-td>
                <a class="text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property') }}/unit/{{ $deedofsale->unit->uuid }}">
                    {{ $deedofsale->unit->unit }}
            </x-td>
            <x-td>{{ number_format($deedofsale->price, 2) }}</x-td>
        
            <x-td>
                <button data-modal-target="edit-deedofsale-modal-{{$deedofsale->uuid}}"
                    data-modal-toggle="edit-deedofsale-modal-{{$deedofsale->uuid}}"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    Edit
                </button>
            </x-td>
            {{-- <x-td>
                @if($deedofsale->status == 'active')
                <a href="/property/{{ Session::get('property') }}/unit/{{ $deedofsale->unit_uuid }}/owner/{{ $deedofsale->owner_uuid }}/deed_of_sale/{{ $deedofsale->uuid }}/backout"
                    class="text-blue-500 text-decoration-line: underline">
                    Back out</a>
                @endif


            </x-td> --}}
            <x-td>

                <a href="/property/{{ Session::get('property') }}/unit/{{ $deedofsale->unit_uuid }}/owner/{{ $deedofsale->owner_uuid }}/deed_of_sale/{{ $deedofsale->uuid }}/delete"
                    class="text-red-500 text-decoration-line: underline">
                    Remove</a>

            </x-td>

        </tr>
         @livewire('edit-deedofsale-component',['property' => $deedofsale->property, 'deedofsale'
        => $deedofsale], key(Carbon\Carbon::now()->timestamp.''.$deedofsale->uuid))

        @endforeach
    </tbody>
</table>