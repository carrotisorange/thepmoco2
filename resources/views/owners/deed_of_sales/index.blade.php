<div class="mb-3">
    <span class="text-center text-red">{{ Str::plural('Units',
        $units->count())}}
        ({{ $units->count() }})</span>
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
                    Date of turnover</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Price</th>


                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Classification</th>

                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                </th>

            </tr>
        </thead>
        @forelse ($units as $unit)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $ctr++ }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{
                        $unit->unit->unit}}
                    </div>
                    <div class="text-sm text-gray-500">{{
                        $unit->unit->building->building}}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ Carbon\Carbon::parse($unit->turnover_at)->format('M d,
                    Y') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ number_format($unit->price, 2) }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    {{ $unit->classification }}
                </td>

                <td class="px-6 py-4 whitespace-nowrap">
                    @if($unit->status === 'active')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{
                        $unit->status }}
                        @else
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i> {{
                            $unit->status }}
                        </span>
                        @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider.{{ $unit->uuid }}"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="dropdownDivider.{{ $unit->uuid }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                            <li>
                                <a href="/unit/{{ $unit->unit->uuid }}/"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-house"></i>&nbspShow
                                    Unit</a>
                            </li>

                        </ul>

                    </div>
                </td>

            </tr>


            @empty
            <tr>
                <span>No units found!</span>
            </tr>

            @endforelse
        </tbody>
    </table>
</div>