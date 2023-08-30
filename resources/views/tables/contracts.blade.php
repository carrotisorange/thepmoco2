<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="bg-gray-50">
        <tr>
            <x-th>#</x-th>
            {{-- <x-th>ID</x-th> --}}
            <x-th>UNIT</x-th>
            <x-th>TENANT</x-th>
            <x-th>PERIOD COVERED</x-th>
            <x-th>RENT/MO</x-th>
            <x-th>STATUS</x-th>
            {{-- <x-th>INTERACTION</x-th> --}}
            {{-- <x-th>CONTRACT</x-th> --}}
            <x-th></x-th>
        </tr>
    </thead>
    <tbody class=" bg-white divide-y divide-gray-200">
        @foreach ($contracts as $index => $contract)
        <div wire:key="contract-field-{{ $contract->uuid }}" wire:ignore>
            <tr>
                <div style="width: 10px">
                    <x-td>{{ $index+1 }} </x-td>
                </div>


                {{-- <x-td>{{ Str::limit($contract->uuid, 10) }}</x-td> --}}
                <x-td>
                    <a class="text-blue-500 text-decoration-line: underline"
                        href="/property/{{ Session::get('property_uuid') }}/unit/{{ $contract->unit->uuid }}">
                        {{ $contract->unit->unit }}
                    </a>
                </x-td>
                <x-td>
                    <div class="text-sm text-gray-900">
                        @if(auth()->user()->role_id == '8')
                        {{ $contract->tenant->tenant }}
                        @else
                        <a class="text-blue-500 text-decoration-line: underline"
                            href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $contract->tenant->uuid }}">
                            {{ $contract->tenant->tenant }}
                        </a>
                        @endif
                    </div>
                </x-td>


                <x-td>
                    {{Carbon\Carbon::parse($contract->start)->format('M d, Y')}} -
                    {{Carbon\Carbon::parse($contract->end)->format('M
                    d, Y')}}</x-td>


                <x-td>{{number_format($contract->rent, 2)}}</x-td>
                <x-td>
                    @if($contract->status === 'active')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{ $contract->status }}
                    </span>
                    @else

                    <span class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-clock"></i> {{
                        $contract->status }}
                    </span>
                    @endif
                    @if($contract->end <= Carbon\Carbon::now()->addMonth() && $contract->status
                        == 'active')
                        <span
                            class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                                                                        bg-orange-100 text-orange-800">
                            <i class="fa-solid fa-clock"></i> expiring
                        </span>
                        @endif
                </x-td>
                {{-- <x-td>
                    @if($contract->interaction_id)
                    {{ $contract->interaction->interaction }}
                    @endif
                </x-td> --}}
                {{-- <x-td>
                    @if(!$contract->contract == null)
                    <a href="/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->contract }}/contract"
                        target="_blank"
                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Contract</a>
                    @else
                    No contract was uploaded.
                    @endif
                </x-td> --}}
                <x-td>
                    <button id="dropdownDefaultButton({{ $contract->uuid }})" data-dropdown-placement="right"
                        data-dropdown-toggle="dropdown({{ $contract->uuid }})"
                        class=" text-white bg-purple-500 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800"
                        type="button">Action <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

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
                            {{-- <li>
                                <a href="/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/delete"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                            </li> --}}
                        </ul>
                    </div>
                </x-td>

            </tr>
        </div>
        @livewire('edit-contract-component',['property' => App\Models\Property::find(Session::get('property_uuid')),
        'contract' => $contract], key($contract->uuid))
        @endforeach

    </tbody>
</table>