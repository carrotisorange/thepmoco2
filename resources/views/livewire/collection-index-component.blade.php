<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-700">Collections</h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

            <button type="button"
                onclick="window.location.href='/property/{{ Session::get('property') }}/payment/requests'"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                View Pending Collections
            </button>

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
                        placeholder="Search reference #" required>

                </div>
        </div>

        </form>
        <div class="sm:col-span-2">
            <select id="small" wire:model="mode_of_payment"
                class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <option value="">Filter mode of payment </option>
                @foreach ($mode_of_payments as $item)
                <option value="{{ $item->mode_of_payment }}">{{ $item->mode_of_payment }}</option>
                @endforeach
            </select>

        </div>

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
                                AR #</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                TENANT</th>

                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                DATE APPLIED</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                DATE DEPOSITED</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                MDDE OF PAYMENT</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                CHEQUE NO</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                BANK</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                AMOUNT PAID</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                <span class="sr-only">View</span>
                                <span class="sr-only">Download</span>
                                <span class="sr-only">Attachment</span>
                            </th>


                        </tr>
                    </thead>
                    @forelse($ars as $item)
                    <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                        <!-- Selected: "bg-gray-50" -->
                        <tr>
                            <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                <!-- Selected row marker, only show when row is selected. -->

                                {{-- <input type="checkbox"
                                    class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                --}}
                            </td>
                            <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{ $item->ar_no }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-purple-700">
                                <a class="text-blue-500 text-decoration-line: underline"
                                    href="/property/{{ Session::get('property') }}/tenant/{{ $item->tenant->uuid }}/collections">
                                    {{ $item->tenant->tenant}}
                                </a>
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                @if($item->date_deposited)
                                {{ Carbon\Carbon::parse($item->date_deposited)->format('M d, Y') }}
                                @else
                                NA
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{ $item->mode_of_payment }}
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                @if($item->cheque_no)
                                {{ $item->cheque_no }}
                                @else
                                NA
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                @if($item->bank)
                                {{ $item->bank }}
                                @else
                                NA
                                @endif
                            </td>
                            <?php
                                                                $collections_count = App\Models\Collection::where('batch_no', $item->collection_batch_no)->count();
                                                            ?>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                {{ number_format($item->amount,2) }} ({{ $collections_count }})
                            </td>
                            <td
                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/view"
                                    class="text-indigo-600 hover:text-indigo-900">View</a>
                            </td>

                            <td
                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/export"
                                    class="text-indigo-600 hover:text-indigo-900">Export</a>
                            </td>

                            <td
                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">

                                @if(!$item->attachment == null)
                                <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/ar/{{ $item->id }}/attachment"
                                    class="text-indigo-600 hover:text-indigo-900">Attachment</a>
                                @endif
                            </td>


                        </tr>
                        @empty
                        <tr>
                            <td class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">No
                                data
                                found.</td>
                        </tr>

                    </tbody>
                    @endforelse
                    <tr>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
                        <?php
                           $property_collections_count = App\Models\Collection::where('property_uuid', Session::get('property'))->count();
                        ?>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ number_format($ars->sum('amount'), 2) }} ({{ $property_collections_count }})
                        </td>
                    </tr>
                </table>
            </div>
            {{-- <button type="button"
                class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                All</button> --}}
        </div>
    </div>
</div>

{{-- <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    {{ $users->links() }}
</div> --}}