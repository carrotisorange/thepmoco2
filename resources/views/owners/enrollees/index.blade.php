<div class="mb-3 mt-5">
    <span class="text-center text-red">{{ Str::plural('Leasing Contract',
        $leasings->count())}}
        ({{ $leasings->count() }})</span>
</div>
<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

    <table class="min-w-full divide-y divide-gray-200">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    #</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Unit</th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Contract Period</th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Agreed Rent/mo</th>


                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status</th>




                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                </th>

            </tr>
        </thead>
        @forelse ($leasings as $leasing)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $ctr++ }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{
                        $leasing->unit->unit}}
                    </div>
                    <div class="text-sm text-gray-500">{{
                        $leasing->unit->building->building}}
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">
                        {{
                        Carbon\Carbon::parse($leasing->start)->format('M d, Y').' -
                        '.Carbon\Carbon::parse($leasing->end)->format('M d, Y')
                        }}
                        @if($leasing->end <= Carbon\Carbon::now()->addMonth())
                            <span
                                class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-red-700 dark:text-red-300">
                                <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                expiring
                            </span>
                            @endif

                    </div>
                    <div class="text-sm text-gray-500">{{
                        Carbon\Carbon::parse($leasing->end)->diffForHumans($leasing->start)
                        }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ number_format($leasing->rent, 2) }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($leasing->status === 'active')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{
                        $leasing->status }}
                        @else
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-clock"></i> {{
                            $leasing->status }}
                        </span>
                        @endif
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $leasing->uuid }}"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="dropdownDivider.{{ $leasing->uuid }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">

                            <li>
                                <a href="/leasing/{{ $leasing->uuid }}/edit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-file-contract"></i>&nbspShow
                                    Contract</a>
                            </li>

                            <li>
                                <a href="/leasing/{{ $leasing->uuid }}/transfer"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-right-arrow-left"></i>&nbspTransfer
                                    Contract</a>
                            </li>
                            <li>
                                <a href="/leasing/{{ $leasing->uuid }}/renew"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-arrow-rotate-right"></i>&nbspRenew
                                    Contract</a>
                            </li>

                        </ul>
                        @if($leasing->status == 'active')
                        <div class="py-1">
                            <a href="/leasing/{{ $leasing->uuid }}/moveout/bills"
                                class="block py-2 px-4 text-sm text-red-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbspUnenroll</a>
                        </div>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <span>No enrollment histories found!</span>
            </tr>

            @endforelse
        </tbody>
    </table>
</div>