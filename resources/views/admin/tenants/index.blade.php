<x-app-layout>
    @section('title', '| Tenants')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">
                                    {{ Str::plural('Tenant', $tenants->count())}} ({{ $tenants->count() }})
                                </li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <div class="rounded">
                        <x-input type="text" class=" py-2 w-80" placeholder="Search..." />
                        <x-button class="px-4 text-white bg-gray-600 border-l ">
                            Search
                        </x-button>
                    </div>
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                @if (!$tenants->count())
                                <span class="text-center text-red">No tenants found!</span>
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
                                                    Tenant</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Contact</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Address</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Birthdate</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Added on</th>
                                                <th scope="col" class="relative px-6 py-3">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        @foreach ($tenants as $tenant)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="flex-shrink-0 h-10 w-10">

                                                            <img class="h-10 w-10 rounded-full"
                                                                src="/storage/{{ $tenant->photo_id }}" alt="">
                                                        </div>
                                                        <div class="ml-4">
                                                            <div class="text-sm font-medium text-gray-900">{{
                                                                $tenant->tenant }}
                                                            </div>
                                                            <div class="text-sm text-gray-500">{{ $tenant->type }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm text-gray-900">{{ $tenant->email }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">{{ $tenant->mobile_number }}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    $tenant->city->city.', '.$tenant->province->province }}</td>

                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{Carbon\Carbon::parse($tenant->birthdate)->format('M d, Y') }}</td>


                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                    $tenant->created_at->diffForHumans() }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <button id="dropdownDividerButton"
                                                        data-dropdown-toggle="dropdownDivider"
                                                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-small rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
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
                                                                <a href="/tenant/{{ $tenant->uuid }}/"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Show</a>
                                                            </li>
                                                            <li>
                                                                <a href="contract/{{ $tenant->uuid }}/extend"
                                                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Extend</a>
                                                            </li>

                                                        </ul>
                                                        <div class="py-1">
                                                            <a href="contract/{{ $tenant->uuid }}/moveout"
                                                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                                                Moveout</a>
                                                        </div>
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
</x-app-layout>