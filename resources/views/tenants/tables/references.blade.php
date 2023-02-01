<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th> NAME</x-th>
            <x-th> RELATIONSHIP</x-th>
            <x-th> MOBILE</x-th>
            <x-th>EMAIL </x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($references as $reference)
        <tr>
            <x-td> {{ $reference->reference }} </x-td>
            <x-td> {{ $reference->relationship->relationship }}</x-td>
            <x-td> {{ $reference->mobile_number }} </x-td>
            <x-td> {{ $reference->email }} </x-td>
        </tr>
        @endforeach
    </tbody>
</table>