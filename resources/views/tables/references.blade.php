<x-table-component>
<x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th> NAME</x-th>
            <x-th> RELATIONSHIP</x-th>
            <x-th> MOBILE</x-th>
            <x-th>EMAIL </x-th>
            <x-th></x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($references as $index => $reference)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td> {{ $reference->reference }} </x-td>
            <x-td> {{ $reference->relationship->relationship }}</x-td>
            <x-td> {{ $reference->mobile_number }} </x-td>
            <x-td> {{ $reference->email }} </x-td>
            <x-td>
                <x-button data-modal-toggle="edit-reference-modal-{{$reference->id}}">
                    Edit
                </x-button>
            </x-td>
        </tr>
        @livewire('edit-reference-component', ['reference_details' => $reference], key($reference->id))
        @endforeach
    </x-table-body-component>
</x-table-component>
