<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Owners</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                {{-- <button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ Str::random(8) }}/edit'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                    Units</button> --}}

            </div>
        </div>

        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                    <div class="relative w-full mb-5">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="search" id="default-search" wire:model="search"
                            class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search..." required>

                    </div>
            </div>

            </form>

            <div class="sm:col-span-2">
                <form>
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Filters</label>
                    <div class="relative w-full mb-5">
                        <div class="flex absolute justify-end inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <svg class="hidden flex-shrink-0 ml-1 h-5 w-5 text-gray-400 lg:block"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <button type="button"
                            class="text-center bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white ">Filter
                            by Default</button>
                    </div>
            </div>
            </form>
        </div>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>
                    <table class="min-w-full table-fixed">
                        <thead class="">
                            <tr>
                                <th scope="col" class="relative w-12 px-6 sm:w-16 sm:px-8">

                                </th>
                                <th scope="col"
                                    class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                    #</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    NAME</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    UNIT</th>
                                {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    RENT</th> --}}
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    EMAIL</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    CONTACT #</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    ADDRESS</th>


                            </tr>
                        </thead>


                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <!-- Selected: "bg-gray-50" -->
                            @foreach($owners as $index => $owner )
                            <tr>
                                <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                    <!-- Selected row marker, only show when row is selected. -->

                                    <input type="checkbox"
                                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                </td>
                                <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">{{ $index+1 }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <a class="text-blue-500 text-decoration-line: underline"
                                        href="/property/{{ $owner->property_uuid }}/owner/{{ $owner->uuid }}">{{
                                        $owner->owner }}</a>

                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{-- @if($owner->deed_of_sales->count())
                                    @foreach ($owner->deed_of_sales->where('status','!=','inactive')->take(1) as $owner)
                                    <a class="text-blue-500 text-decoration-line: underline"
                                        href="/property/{{ $owner->property_uuid }}/owner/{{ $owner->owner->uuid }}">{{
                                        $owner->owner->owner }}</a>...({{ $owner->deed_of_sales->count()-1 }})
                                    @endforeach
                                    @else
                                    NA
                                    @endif --}}
                                </td>
                                {{-- <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">16,000.00
                                </td> --}}
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $owner->email }} </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $owner->mobile_number
                                    }} </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{
                                    $owner->country->country.', '.$owner->province->province.', '.$owner->city->city.',
                                    '.$owner->barangay }}
                                </td>


                            </tr>
                            @endforeach
                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
                {{-- <button type="button"
                    class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                    All</button> --}}
            </div>
        </div>
    </div>

    {{-- <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
        {{ $owners->links() }}
    </div> --}}
</div>