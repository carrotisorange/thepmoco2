<x-new-layout>
    @section('title','Payment Requests | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div>
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-bold text-gray-700">Payment Requests</h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                        {{-- <button type="button"
                            onclick="window.location.href='/property/{{ Session::get('property') }}/user/{{ Str::random(8) }}/create'"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Add
                            Employee</button> --}}

                    </div>
                </div>

                <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    {{-- <div class="sm:col-span-4">

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
                            <input type="search" id="default-search" wire:model="search" disabled
                                class="bg-white block p-4 pl-10 w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search..." required>

                        </div>
                        <div>
                            <p class="text-sm text-center text-gray-500">
                                Showing
                                <span class="font-medium">{{ $users->count() }}</span>

                                {{Str::plural('results', $users->count())}}
                            </p>
                        </div>
                    </div> --}}

                    {{-- <div class="sm:col-span-2">
                        <select id="small" wire:model="status" disabled
                            class="text-center bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="">Filter user status</option>
                            @foreach ($statuses as $item)
                            <option value="{{ $item->id }}">{{ $item->status }}</option>
                            @endforeach
                        </select>

                    </div> --}}

                </div>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
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
                                            <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                                    TENANT</th>
                                        <th scope="col"
                                            class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            BILL #</th>
                                    
                                        <th scope="col"
                                            class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            DATE UPLOADED</th>
                                        <th scope="col"
                                            class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            DATE APPROVED</th>
                                        <th scope="col"
                                            class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            AMOUNT</th>
                                        <th scope="col"
                                            class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            BATCH #</th>
                                        <th scope="col"
                                            class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            STATUS</th>
                                        <th scope="col"
                                            class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                            REMARKS</th>


                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">

                                            <span class="sr-only">Attachment</span>
                                        </th>


                                    </tr>
                                </thead>


                                <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                                    <!-- Selected: "bg-gray-50" -->
                                    @forelse($requests as $index => $item )
                                    <tr>
                                        <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                            <!-- Selected row marker, only show when row is selected. -->

                                            {{-- <input type="checkbox"
                                                class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                            --}}
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $index+1 }}
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $item->tenant }}
                                        </td>

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $item->bill_nos }}
                                        </td>
                                        <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->

                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if($item->updated_at)
                                            {{ Carbon\Carbon::parse($item->updated_at)->format('M d, Y') }}
                                            @else
                                            NA
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ number_format($item->amount, 2) }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $item->batch_no }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $item->status }}
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            @if($item->reason_for_rejection)
                                            {{ $item->reason_for_rejection }}
                                            @else
                                            NONE
                                            @endif

                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{-- @if(!$item->proof_of_payment == null)
                                            <a href="/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/payments_request/{{ $item->id }}/download"
                                                class="text-indigo-600 hover:text-indigo-900">View Attachment</a>
                                            @endif --}}
                                        </td>

                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">
                                            No
                                            data
                                            found.</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
</x-new-layout>