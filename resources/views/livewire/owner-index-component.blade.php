@section('title', '| Owners')
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        <div class="flex">
            <div class="h-3">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    <nav class="rounded-md">
                        <ol class="list-reset flex">
                            <li><a href="/property/{{ Session::get('property') }}"
                                    class="text-indigo-600 hover:text-indigo-700">{{
                                    Session::get('property_name') }}</a>
                            </li>
                            <li><span class="text-gray-500 mx-2">/</span></li>
                            <li class="text-gray-500">
                                {{ Str::plural('Owner', $owners->count())}}
                            </li>
                        </ol>
                    </nav>
                </h2>
            </div>
            <h5 class="flex-1 text-right">
            </h5>
        </div>
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            <x-search placeholder="Search for owners"></x-search>
        </div>
        <div class="mt-5">
            {{ $owners->links() }}
        </div>
        <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-gray-200">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            @if (!$owners->count())
                            <span class="text-center text-red">No owners found!</span>
                            @else
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <?php $ctr =1; ?>
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <x-th>#</x-th>
                                            <x-th>Name</x-th>
                                            <x-th>Gender</x-th>
                                            <x-th>Occupation</x-th>
                                            <x-th>Contact</x-th>
                                            <x-th>Address</x-th>
                                            <x-th></x-th>
                                    </thead>
                                    @foreach ($owners as $owner)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <x-td>{{ $ctr++ }}</x-td>
                                            <x-td>
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <a href="owner/{{ $owner->uuid }}"><img
                                                                class="h-10 w-10 rounded-full"
                                                                src="/storage/{{ $owner->photo_id }}" alt=""></a>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900"><b>{{
                                                                $owner->owner }}</b>
                                                        </div>
                                                        <div class="text-sm text-gray-500">{{ $owner->type }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-td>
                                            <x-td>{{ $owner->gender }}</x-td>
                                            <x-td>{{ $owner->occupation?$owner->occupation:'NA' }}</x-td>
                                            <x-td>
                                                <div class="text-sm text-gray-900">{{ $owner->email }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{ $owner->mobile_number }}
                                                </div>
                                            </x-td>
                                            <x-td>
                                                <div class="text-sm text-gray-900">{{ $owner->province->province.',
                                                    '.$owner->city->city.', '.$owner->barangay }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{
                                                    $owner->country->country }}
                                                </div>
                                            </x-td>
                                            <x-td>
                                                <button id="dropdownDividerButton"
                                                    data-dropdown-toggle="dropdownDivider.{{ $owner->uuid }}"
                                                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                                                    type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                                                    <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg></button>

                                                <div id="dropdownDivider.{{ $owner->uuid }}"
                                                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                    <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                                        <li>
                                                            <a href="/owner/{{ $owner->uuid }}/edit"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-edit"></i>&nbspShow Owner</a>
                                                        </li>
                                                        <li>
                                                            <a href="/owner/{{ $owner->uuid }}/deed_of_sales"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-home"></i>&nbspShow Units</a>
                                                        </li>
                                                        <li>
                                                            <a href="/owner/{{ $owner->uuid }}/enrollees"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-house-user"></i>&nbspShow
                                                                Leasing</a>
                                                        </li>
                                                        <li>
                                                            <a href="/owner/{{ $owner->uuid }}/bills"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-file-invoice-dollar"></i>&nbspShow
                                                                Bills</a>
                                                        </li>
                                                        <li>
                                                            <a href="/owner/{{ $owner->uuid }}/collections"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-coins"></i>&nbspShow
                                                                Collections</a>
                                                        </li>

                                                    </ul>
                                                    <div class="py-1">
                                                        <li>
                                                            <a href="/owner/{{ $owner->uuid }}/delete"
                                                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                                                    class="fa-solid fa-trash-alt"></i>&nbspRemove
                                                            </a>
                                                        </li>
                                                    </div>
                                                </div>
                                            </x-td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>