<x-new-layout>
    @section('title','Notifications | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div>
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-bold text-gray-700">Notifications</h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                        {{-- <button type="button"
                            onclick="window.location.href='/property/{{ Session::get('property') }}/payment/requests'"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-gray-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                            View Pending Collections
                        </button> --}}

                    </div>
                </div>


                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                            </div>
                            <table class="min-w-full table-fixed">

                                @forelse($notifications->get() as $item)
                                <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                                    <!-- Selected: "bg-gray-50" -->
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                            <div class="flex items-center">
                                             
                                                <div class="ml-4">
                                                    <div class="font-medium text-gray-900">{{ $item->user->name }}</div>
                                                    {{-- <div class="text-gray-500">lindsay.walton@example.com</div> --}}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <div class="text-gray-900">{{ $item->details }}</div>
                                        
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            <span
                                                class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">{{ $item->status }}</span>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $item->role->role }}</td>
                                        <td
                                            class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">{{
                                            Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">
                                            No notifications found.
                                        </td>
                                    </tr>

                                </tbody>
                                @endforelse

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
        </div>
    </div>
</x-new-layout>