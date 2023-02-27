<x-new-layout>
    @section('title','Account Payables | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="mt-5 mb-5">
                <p class="text-right">
                    <button onclick="window.location.href='{{ url()->previous() }}'"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                        type="button">Back
                    </button>
                </p>
            </div>
            <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Account Payable</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $accountpayable->batch_no }}</p>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-4">
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Requested On</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{
                                Carbon\Carbon::parse($accountpayable->created_at)->format('M d, Y') }}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Requested By</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $accountpayable->requester->name }}</dd>
                        </div>
                        <br>
                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Request For</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $accountpayable->request_for }}</dd>
                        </div>

                        <div class="sm:col-span-1">
                            <dt class="text-sm font-medium text-gray-500">Status</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $accountpayable->status }}</dd>
                        </div>


                        <div class="sm:col-span-6">
                            <dt class="text-sm font-medium text-gray-500">Particulars</dt>
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>ITEM </x-th>
                                        <x-th>QUANTITY</x-th>
                                        @if($accountpayable->request_for === 'payment')
                                        <x-th>Price</x-th>
                                        <x-th>Total</x-th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($particulars as $index => $particular)
                                    <div wire:key="particular-field-{{ $particular->id }}">
                                        <tr>
                                            <x-td>{{ $index+1 }}</x-td>
                                            <x-td>
                                                {{ $particular->item }}
                                            </x-td>
                                            <x-td>
                                                {{ $particular->quantity }}
                                            </x-td>
                                            @if($accountpayable->request_for === 'payment')
                                            <x-td>
                                                {{ $particular->price }}
                                            </x-td>
                                            <x-td>
                                                {{ number_format($particular->price * $particular->quantity, 2) }}
                                            </x-td>
                                            @endif

                                        </tr>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <div class="sm:col-span-6">
                            <dt class="text-sm font-medium text-gray-500">Uploaded Quotations</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <!-- Heroicon name: mini/paper-clip -->
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-2 w-0 flex-1 truncate">Selected Quotation</span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            @if($accountpayable->selected_quotation)
                                            <a href="{{ asset('/storage/'.$accountpayable->selected_quotation) }}"
                                                target="_blank"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                            @else
                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No
                                                quotation
                                                was uploaded</a>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <!-- Heroicon name: mini/paper-clip -->
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-2 w-0 flex-1 truncate">Quotation 1</span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            @if($accountpayable->quotation1)
                                            <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}"
                                                target="_blank"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                            @else
                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No
                                                quotation
                                                was uploaded</a>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <!-- Heroicon name: mini/paper-clip -->
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-2 w-0 flex-1 truncate">Quotation 2</span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            @if($accountpayable->quotation2)
                                            <a href="{{ asset('/storage/'.$accountpayable->quotation2) }}"
                                                target="_blank"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                            @else
                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No
                                                quotation
                                                was uploaded</a>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                        <div class="flex w-0 flex-1 items-center">
                                            <!-- Heroicon name: mini/paper-clip -->
                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd"
                                                    d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="ml-2 w-0 flex-1 truncate">Quotation 3</span>
                                        </div>
                                        <div class="ml-4 flex-shrink-0">
                                            @if($accountpayable->quotation3)
                                            <a href="{{ asset('/storage/'.$accountpayable->quotation3) }}"
                                                target="_blank"
                                                class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                            @else
                                            <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No
                                                quotation
                                                was uploaded</a>
                                            @endif
                                        </div>
                                    </li>

                                </ul>
                            </dd>
                        </div>


                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-new-layout>