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
        @foreach ($guardians as $guardian)
        <tr>
            <x-td> {{ $guardian->guardian }} </x-td>
            <x-td> {{ $guardian->relationship->relationship }}</x-td>
            <x-td> {{ $guardian->mobile_number }} </x-td>
            <x-td> {{ $guardian->email }} </x-td>
        </tr>
        @endforeach
    </tbody>
</table>