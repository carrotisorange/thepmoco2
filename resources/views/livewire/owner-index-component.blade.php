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
        <div class="rounded">
            <x-input wire:model="search" type="text" class=" py-2 w-full" placeholder="Enter owner..." />
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
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                #</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Name</th>
                                            {{-- <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Unit</th> --}}
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Contact</th>
                                            {{-- <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Address</th> --}}
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Added on</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Edit</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach ($owners as $owner)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                $ctr++ }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
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
                                            </td>
                                           {{-- <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $owner->unit->unit }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{ $owner->unit->building->building }}
                                                </div>
                                            </td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $owner->email }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{ $owner->mobile_number }}
                                                </div>
                                            </td>

                                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                $owner->city->city.', '.$owner->province->province }}</td> --}}

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                $owner->created_at->diffForHumans() }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button id="dropdownDividerButton"
                                                    data-dropdown-toggle="dropdownDivider"
                                                    class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                                                    type="button">Select your action <svg class="ml-2 w-4 h-4"
                                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg></button>

                                                <div id="dropdownDivider"
                                                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                    <ul class="py-1" aria-labelledby="dropdownDividerButton">
                                                        <li>
                                                            <a href="/contract/{{ $owner->uuid }}/edit"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Show</a>
                                                        </li>

                                                        <li>
                                                            <a href="/contract/{{ $owner->uuid }}/transfer"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Transfer</a>
                                                        </li>
                                                        <li>
                                                            <a href="/contract/{{ $owner->uuid }}/renew"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Renew</a>
                                                        </li>

                                                    </ul>
                                                    @if($owner->status === "active")
                                                    <div class="py-1">
                                                        <a href="/contract/{{ $owner->uuid }}/moveout/bills"
                                                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                            Moveout</a>
                                                    </div>
                                                    @else
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- More people... -->
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