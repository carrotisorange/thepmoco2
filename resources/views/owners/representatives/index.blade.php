<div class="mb-3 mt-5">
    <span class="text-center text-red">{{ Str::plural('Representative',
        $representatives->count())}}
        ({{ $representatives->count() }})</span>
</div>
<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-200">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Name</x-th>
                <x-th>Relationship</x-th>
                <x-th>Email</x-th>
                <x-th>Mobile</x-th>
                <x-th></x-th>
            </tr>
        </thead>
        @forelse ($representatives as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>{{ $item->representative }}</x-td>
                <x-td>{{ $item->relationship->relationship }}</x-td>
                <x-td>{{ $item->email }}</x-td>
                <x-td>{{ $item->mobile_number }}</x-td>
                <x-td><button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $item->id }}"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions<svg class="ml-2 w-4 h-4"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>
                    <div id="dropdownDivider.{{ $item->id }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                            <li>
                                <a href="/representative/{{ $item->id }}/edit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-edit"></i>&nbspEdit</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <li>
                                <a href="/representative/{{ $item->id }}/delete"
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