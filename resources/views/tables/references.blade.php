<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
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
                <button data-modal-target="edit-reference-modal-{{$reference->id}}"
                    data-modal-toggle="edit-reference-modal-{{$reference->id}}"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    Edit
                </button>
            </x-td>
            
        </tr>
        @livewire('edit-reference-component', ['reference_details' => $reference], key($reference->id))
        @endforeach
    </tbody>
</table>