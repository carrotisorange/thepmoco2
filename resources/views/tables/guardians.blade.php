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
                {{-- <a class="text-blue-500 text-decoration-line: underline" href="#/" data-modal-toggle="edit-guardian-modal">
                    Edit
                </a> --}}
                {{-- <button type="button" class="text-blue-500 text-decoration-line: underline" wire:click="update_guardian({{ $guardian->id }})">Edit</button> --}}
            </x-td>
        </tr>

    </tbody>

    @endforeach

</table>