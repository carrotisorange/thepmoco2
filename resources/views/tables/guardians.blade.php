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
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($guardians as $index => $guardian)

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
                <button data-modal-target="edit-guardian-modal-{{$guardian->id}}" data-modal-toggle="edit-guardian-modal-{{$guardian->id}}"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto"
                    type="button">
                    Edit
                </button>
            </x-td>
        </tr>
       @livewire('edit-guardian-component', ['guardian_details' => $guardian], key($guardian->id))
    @endforeach
    </tbody>

</table>