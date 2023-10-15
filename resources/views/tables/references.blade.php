<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th> NAME</x-th>
            <x-th> RELATIONSHIP</x-th>
            <x-th> MOBILE</x-th>
            <x-th>EMAIL </x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($references as $index => $reference)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td> {{ $reference->reference }} </x-td>
            <x-td> {{ $reference->relationship->relationship }}</x-td>
            <x-td> {{ $reference->mobile_number }} </x-td>
            <x-td> {{ $reference->email }} </x-td>
            <x-td>
                <x-button data-modal-target="edit-reference-modal-{{$reference->id}}"
                    data-modal-toggle="edit-reference-modal-{{$reference->id}}"
                    type="button">
                    Edit
                </x-button>
            </x-td>

        </tr>
        @livewire('edit-reference-component', ['reference_details' => $reference], key($reference->id))
        @endforeach
    </tbody>
</table>
