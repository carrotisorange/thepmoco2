<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
<thead class="">
        <tr>
            <x-th>#</x-th>
            <x-th>NAME</x-th>
            <x-th> RELATIONSHIP</x-th>
            <x-th> MOBILE  </x-th>
            <x-th>  EMAIL </x-th>
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
    @foreach ($guardians as $index => $guardian)
        <tr>
            <x-th> {{ $index+1 }}  </x-th>
            <x-td>   {{ $guardian->guardian }} </x-td>
            <x-td>  {{ $guardian->relationship->relationship }}   </x-td>
            <x-td> {{ $guardian->mobile_number }}  </x-td>
            <x-td> {{ $guardian->email }} </x-td>
            <x-td>
                <x-button data-modal-toggle="edit-guardian-modal-{{$guardian->id}}">
                    Edit
                </x-button>
            </x-td>
        </tr>
       @livewire('edit-guardian-component', ['guardian_details' => $guardian], key($guardian->id))
    @endforeach
    </tbody>
</table>
