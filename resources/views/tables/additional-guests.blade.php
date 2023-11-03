<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($additional_guests as $index => $additional_guest)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $additional_guest->additional_guest }}</x-td>
        </tr>
        @endforeach
    </tbody>
</table>
