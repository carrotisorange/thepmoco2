<x-portal-layout>
    @section('title', 'Contracts')

    @section('header', 'Contracts')

    <div class="flex flex-col p-10">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="mb-5">
                    {{ $contracts->links() }}
                </div>
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">

                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Unit
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Duration
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Rent/Mo
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>

                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($contracts as $index => $item)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    {{$index + 1}}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $item->unit->unit }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $item->unit->building->building }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ Carbon\Carbon::parse($item->start)->format('M
                                        d, Y').' - '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                                    </div>
                                    <div class="text-sm text-gray-500">{{
                                        Carbon\Carbon::parse($item->end)->diffInMonths($item->start) }} months</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    {{number_format($item->rent, 2)}}

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($item->status === 'active')
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $item->status }}
                                    </span>
                                    @else
                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        {{ $item->status }}
                                    </span>
                                    @endif

                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900"></a>
                                </td>

                            </tr>

                            @endforeach

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-portal-layout>