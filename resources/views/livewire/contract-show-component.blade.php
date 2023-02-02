<div>
    <div class="mt-5 mb-5">
        <p class="text-right">
            <button
                onclick="window.location.href='/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}'"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                type="button">Back to tenant page
            </button>
        </p>
    </div>
    <div class="overflow-hidden bg-white shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Contract Information</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $contract->uuid }}</p>
        </div>
        <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Tenant</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $contract->tenant->tenant }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Contract</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{Carbon\Carbon::parse($contract->start)->format('M d, Y')}}
                        - {{Carbon\Carbon::parse($contract->end)->format('M d, Y')}}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ $contract->tenant->email }}</dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500">Rent/month</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{ number_format($contract->rent, 2) }}</dd>
                </div>
                {{-- <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">About</dt>
                    <dd class="mt-1 text-sm text-gray-900">Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim
                        incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit
                        nulla
                        mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing
                        reprehenderit
                        deserunt qui eu.</dd>
                </div> --}}
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Uploaded IDs</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">ID # 1</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    @if($contract->tenant->photo_id)
                                    <a href="{{ asset('/storage/'.$contract->tenant->photo_id) }}" target="_blank"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    @else
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No ID
                                        was uploaded</a>
                                    @endif
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">ID # 2</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    @if($contract->tenant->photo_id_2)
                                    <a href="{{ asset('/storage/'.$contract->tenant->photo_id_2) }}" target="_blank"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    @else
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No ID
                                        was uploaded</a>
                                    @endif
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">ID # 3</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    @if($contract->tenant->photo_id_3)
                                    <a href="{{ asset('/storage/'.$contract->tenant->photo_id_3) }}" target="_blank"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    @else
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No ID
                                        was uploaded</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </dd>
                </div>

                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Attachments</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                        <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200">
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">Contract</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    @if($contract->contract)
                                    <a href="{{ asset('/storage/'.$contract->contract) }}" target="_blank"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                    @else
                                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">No contract
                                        was uploaded</a>
                                    @endif
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">Unit Inventory</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="/property/{{ $contract->property_uuid }}/unit/{{ $contract->unit_uuid }}/inventory/export"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                </div>
                            </li>
                            <li class="flex items-center justify-between py-3 pl-3 pr-4 text-sm">
                                <div class="flex w-0 flex-1 items-center">
                                    <!-- Heroicon name: mini/paper-clip -->
                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="ml-2 w-0 flex-1 truncate">Statements of Account</span>
                                </div>
                                <div class="ml-4 flex-shrink-0">
                                    <a href="/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}/bill/export"
                                        class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                                </div>
                            </li>
                        </ul>
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>