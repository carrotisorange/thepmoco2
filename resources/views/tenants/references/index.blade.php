<div class="mb-3 mt-5">
    <span class="text-center text-red">{{ Str::plural('Reference',
        $references->count())}}
        ({{ $references->count() }})</span>
</div>
<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Name</x-th>
                <x-th>Relationship</x-th>
                <x-th>Contact</x-th>
               
                <x-th></x-th>
            </tr>
        </thead>
        @forelse ($references as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>{{ $item->reference }}</x-td>
                <x-td>{{ $item->relationship->relationship }}</x-td>
                <x-td>
                    <div class="text-sm text-gray-900">{{ $item->email }}
                    </div>
                    <div class="text-sm text-gray-500">{{
                        $item->mobile_number }}
                    </div>
                </x-td>
                <x-td>
                    <x-button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->id }}"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </x-button>

                    <div id="dropdownDivider.{{ $item->id }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                            {{-- <li>
                                <a href="/reference/{{ $item->id }}/edit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-edit"></i>&nbspEdit</a>
                            </li> --}}
                        </ul>
                        <div class="py-1">
                            <li>
                                <a href="/reference/{{ $item->id }}/delete"
                                    class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-trash-alt"></i>&nbspRemove
                                </a>
                            </li>
                        </div>
                    </div>
                </x-td>
                @empty
                <x-td>No data found!</x-td>
                @endforelse
            </tr>
        </tbody>
    </table>
</div>