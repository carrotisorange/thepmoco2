<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            <x-th>NAME</x-th>
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
        </tr>
    </thead>
    @foreach ($guardians as $index => $guardian)
    <tbody class="bg-white divide-y divide-gray-200">
        <!-- Selected: "bg-gray-50" -->
        <tr>
            <x-th>
                {{ $index+1 }}
            </x-th>
            <x-td>
                {{ $guardian->guardian }}
            </x-td>
            <x-td>
                {{ $guardian->relationship->relationship }}
            </x-td>
            <x-td>
                {{ $guardian->mobile_number }}
            </x-td>
            <x-td>
                {{ $guardian->email }}
            </x-td>
            <x-td>
                <button type="button" wire:click="delete_guardian({{ $guardian->id }})" wire:loading.remove
                    class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    <i class="fa-solid fa-trash"></i>&nbsp; Delete
                </button>
                <button type="button" wire:loading disabled wire:target="delete_guardian({{ $guardian->id }})"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Loading...
                </button>
            </x-td>
            {{--
            <x-td>
                <a class="text-blue-500 text-decoration-line: underline" href="#/"
                    data-modal-toggle="edit-guardian-modal">
                    Edit
                </a>
                <button type="button" class="text-blue-500 text-decoration-line: underline"
                    wire:click="update_guardian({{ $guardian->id }})">Edit</button>
            </x-td>
            --}}
        </tr>

    </tbody>

    @endforeach

</table>