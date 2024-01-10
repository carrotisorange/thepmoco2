<x-table-component>
    <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>UNIT</x-th>
            <x-th>TENANT</x-th>
            <x-th>Status</x-th>
            <x-th>PERIOD COVERED</x-th>
            <x-th>RENT/MO</x-th>
            <x-th>Contract</x-th>
            <x-th></x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($contracts as $index => $contract)
        <div wire:key="contract-field-{{ $contract->uuid }}">
            <tr>
                <div style="width: 10px">
                    <x-td>{{ $index+1 }} </x-td>
                </div>
                <x-td>
                    <x-link-component link="/property/{{ Session::get('property_uuid') }}/unit/{{ $contract->unit->uuid }}">
                       {{ $contract->unit->unit }}
                    </x-link-component>
                </x-td>
                <x-td>
                        @if(auth()->user()->role_id == '8')
                        {{ $contract->tenant->tenant }}
                        @else
                        <x-link-component link="/property/{{ Session::get('property_uuid') }}/tenant/{{ $contract->tenant->uuid }}">
                          {{ $contract->tenant->tenant }}
                        </x-link-component>
                        @endif
                </x-td>
                <x-td>
                    {{ $contract->status }}
                    @if($contract->status == 'active')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i>
                    </span>
                    @else
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-clock"></i>
                    </span>
                    @endif
                    @if($contract->end <= Carbon\Carbon::now()->addMonth() && $contract->status == 'active')
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i>
                        </span>
                        @endif
                </x-td>
                <x-td>
                    {{Carbon\Carbon::parse($contract->start)->format('M d, Y')}} -
                    {{Carbon\Carbon::parse($contract->end)->format('M
                    d, Y')}}</x-td>


                <x-td>{{number_format($contract->rent, 2)}}</x-td>
                <x-td>
                   @if($contract->contract == null)
                        Not available
                   @else
                   <x-button onclick="window.location.href='{{ asset('/storage/'.$contract->contract) }}'">
                        View
                    </x-button>

                   @endif
                </x-td>
                <x-td>
                    @cannot('tenant')
                    <x-button id="dropdownDefaultButton({{ $contract->uuid }})" data-dropdown-placement="right"
                        data-dropdown-toggle="dropdown({{ $contract->uuid }})">Action
                    &nbsp; <i class="fa-solid fa-caret-down"></i>
                    </x-button>

                    <div id="dropdown({{ $contract->uuid }})"
                        class="z-99 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownDefaultButton">
                            <li>
                                <a href="/property/{{ $contract->property_uuid }}/unit/{{ $contract->unit_uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    View</a>

                            </li>
                            @if($contract->status != 'inactive' && $contract->status != 'forcedmoveout')
                            <li>

                                <a href="#/" data-modal-target="edit-contract-modal-{{$contract->uuid}}"
                                    data-modal-toggle="edit-contract-modal-{{$contract->uuid}}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                    Edit</a>
                            </li>
                            @endif
                            <li>
                                @if($contract->status != 'pendingmovein')
                                <a href="/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/renew"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Renew</a>
                                @endif
                            </li>
                            <li>
                                @if($contract->status != 'pendingmovein')
                                <a href="/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/transfer"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transfer</a>
                                @endif
                            <li>
                                @if($contract->status == 'active' || $contract->status == 'pendingmovein')
                                <a href="/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/moveout/step-1"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Moveout</a>
                                @elseif($contract->status == 'reserved')
                                <a href="/property/{{ $contract->property_uuid }}/unit/{{ $contract->unit_uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/movein/{{ Str::random(8) }}/create"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Movein</a>
                                @elseif($contract->status == 'pendingmoveout')
                                <a href="/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/moveout/step-2"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Moveout</a>
                                @elseif($contract->status == 'cleared')
                                <a href="/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/moveout/step-3"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Moveout</a>
                                @endif
                            </li>

                        </ul>
                    </div>
                    @endcannot
                </x-td>

            </tr>
        </div>
        @livewire('edit-contract-component',['property' => App\Models\Property::find(Session::get('property_uuid')),
        'contract' => $contract], key($contract->uuid))
        @endforeach
    </x-table-body-component>
</x-table-component>
