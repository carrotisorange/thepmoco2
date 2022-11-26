<x-new-layout>
    @section('title', $tenant_details->tenant.' | '.Session::get('property_name'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $tenant_details->tenant }} /
                        Contracts</h1>
                </div>

                <button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Go back to tenant
                    </a></button>

                <button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/concern/create'"
                    class="ml-2 inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    New concern
                    </a></button>
            </div>
            <table class="min-w-full table-fixed">
                <thead class="">
                    <tr>
                        <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-sm font-semibold text-gray-900">
                            REFERENCE #
                        </th>
                        <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                            REPORTED ON
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            SUBJECT
                        </th>

                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            UNIT
                        </th>

                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            CATEGORY
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            CONCERN
                        </th>
                        <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                            STATUS
                        </th>
                        <th></th>
                    </tr>
                </thead>
                @forelse ($concerns as $index => $item)
                <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                    <!-- Selected: "bg-gray-50" -->
                    <tr>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $item->reference_no }}
                        </td>
                        {{-- <td class="relative w-12 px-6 sm:w-16 sm:px-8"> --}}
                            <!-- Selected row marker, only show when row is selected. -->

                            {{-- <input type="checkbox"
                                class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                            --}}
                            {{--
                        </td> --}}
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $item->subject }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $item->unit->unit }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $item->category->category }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $item->concern }}
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                            {{ $item->status }}
                        </td>

                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

                            <a class="font-medium text-blue-500 text-decoration-line: underline"
                                href="/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns/{{ $item->id }}"
                                class="text-indigo-600 hover:text-indigo-900">Review</a>

                        </td>
                    </tr>
                </tbody>
                @empty
                <tr>
                    <td class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">
                        No concerns
                        found.</td>
                </tr>
                @endforelse

            </table>
</x-new-layout>