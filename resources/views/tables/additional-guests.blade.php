<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            {{-- <x-th>Birthdate</x-th>
            <x-th>Has Disability?</x-th>
            <x-th>Disability</x-th> --}}
        </tr>
    </thead>

    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($additional_guests as $index => $additional_guest)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $additional_guest->additional_guest }}</x-td>
            {{-- <x-td>{{ Carbon\Carbon::parse($additional_guest->birthdate)->format('M d, Y') }}</x-td>
            <x-td>{{ $additional_guest->has_disability }}</x-td>
            <x-td>{{ $additional_guest->disability }}</x-td> --}}
        </tr>
        @endforeach
    </tbody>
</table>