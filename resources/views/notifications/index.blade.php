<x-new-layout>
    @section('title','Notifications | '. Session::get('property_name'))

    <div>
        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700">Notifications</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    {{-- <button
                        onclick="window.location.href='/property/{{ Session::get('property') }}/concern/create'"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">New
                        Concern</button>
                    --}}
                </div>
            </div>


            </div>

            {{-- asdad --}}
            {{-- <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="mt-3">
                        {{ $notifications->links() }}
                    </div>
                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        <table class="min-w-full table-fixed">

                            @forelse($notifications as $item)
                            <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                                <!-- Selected: "bg-gray-50" -->
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">

                                        <div class="font-sm text-gray-900">
                                            @if($item->status === 'approved')
                                            <span
                                                class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800"><i
                                                    class="fa-solid fa-circle-check"></i></span>{{ $item->user->name
                                            }} {{ $item->details }}
                                            @else
                                            <span
                                                class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800"><i
                                                    class="fa-solid fa-clock"></i></span>{{ $item->user->name
                                            }} {{ $item->details }}
                                            @endif

                                        </div>

                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <div class="text-gray-900"></div>

                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <span
                                            class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800"></span>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"></td>
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
                    
                </div>
            </div> --}}
        </div>
    </div>

</x-new-layout>