<x-new-layout>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
           <div>
            <div class="mt-10 px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-bold text-gray-700" wire:ignore>
                            {{ucfirst(Route::current()->getName())}}/{{ $tenant->tenant }}/AR # {{ $collection->ar_no }}
                        </h1>
                    </div>
                    <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                        <div class="group inline-block">
                            {{-- <x-button>Remittance &nbsp; <i class="fa-solid fa-caret-down"></i></x-button>
                            <ul
                                class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute  transition duration-150 ease-in-out origin-top min-w-32">
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                    <a href="#/" data-modal-toggle="instructions-create-remittance-modal"> Create</a>
                                </li>
                                <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                                    <a href="#/" data-modal-toggle="export-remittance-modal"> Export</a>
                                </li>

                            </ul> --}}
                        </div>
                    </div>
                </div>
                <div class="mt-5">

                </div>
                <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                           <x-table-component>
                            <x-table-body-component>
                                <tr>
                                    <x-td><b>Total</b></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td></x-td>
                                    <x-td>
                                        <b>{{ number_format($collections->sum('collection'), 2) }} ({{ $collections->count() }})</b>
                                    </x-td>
                                    <x-td></x-td>
                                </tr>
                            </x-table-body-component>
                            <x-table-head-component>
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>AR #</x-th>
                                    <x-th>OR #</x-th>
                                    <x-th>BILL #</x-th>
                                    <x-th> BILL TO</x-th>
                                    <x-th> DATE APPLIED</x-th>
                                    <x-th> MODE OF PAYMENT</x-th>
                                    <x-th> CHEQUE NO </x-th>
                                    <x-th> BANK</x-th>
                                    <x-th> AMOUNT PAID</x-th>
                                    <x-th></x-th>
                                </tr>
                            </x-table-head-component>
                            <x-table-body-component>
                                @foreach($collections as $index => $item)
                                <tr>
                                    <x-td><b>{{ $index+1 }}</b></x-td>
                                    <x-td>{{ $item->ar_no }}</x-td>
                                    <x-td>{{ $item->or_no }}</x-td>
                                    <x-td>
                                        <?php $bill_nos = App\Models\Collection::where('property_uuid', $item->property_uuid)->posted()->where('ar_no', $item->ar_no)->get();?>
                                        @foreach ($bill_nos as $bill_no)
                                        {{ $bill_no->bill->bill_no }},
                                        @endforeach
                                    </x-td>
                                    <x-td>
                                        <x-link-component link="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}">
                                            {{ $item->tenant->tenant }}
                                        </x-link-component>

                                        <x-link-component link="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}">
                                            {{ $item->owner->owner }}
                                        </x-link-component>

                                        <x-link-component link="/property/{{ $item->property_uuid }}/guest/{{ $item->guest_uuid }}">
                                            {{ $item->guest->guest }}
                                        </x-link-component>
                                    </x-td>
                                    <x-td> {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }} </x-td>
                                    <x-td> {{ $item->form }} </x-td>
                                    <x-td>
                                        @if($item->cheque_no)
                                        {{ Str::limit($item->cheque_no,15) }}
                                        @else
                                        NA
                                        @endif
                                    </x-td>
                                    <x-td>
                                        @if($item->bank)
                                        {{ Str::limit($item->bank,15) }}
                                        @else
                                        NA
                                        @endif
                                    </x-td>
                                    <?php
                                        $items_count = App\Models\Collection::where('tenant_uuid', $item->tenant_uuid)->where('ar_no', $item->ar_no)->posted()->count();
                                    ?>
                                    <x-td>
                                        {{-- <x-link-component link="/property/{{ $item->property_uuid }}/collection/{{ $item->ar_no }}/edit"> --}}
                                            {{ number_format(App\Models\Collection::where('property_uuid',
                                            $item->property_uuid)->posted()->where('ar_no', $item->ar_no)->sum('collection'),2) }} ({{
                                            $items_count }})
                                        {{-- </x-link-component> --}}
                                    </x-td>
                                    <x-td>
                                        <x-button id="dropdownDefaultButton({{ $item->id }})" data-dropdown-placement="left-end"
                                            data-dropdown-toggle="dropdown({{ $item->id }})">View
                                            &nbsp; <i class="fa-solid fa-caret-down"></i>
                                        </x-button>

                                        <div id="dropdown({{ $item->id }})"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    @if($item->tenant_uuid)
                                                    <a href="/property/{{ $item->property_uuid }}/tenant/{{ $item->tenant_uuid }}/collection/{{ $item->id }}/view"
                                                        target="_blank"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Acknowledgment
                                                        Receipt</a>

                                                    @elseif($item->owner_uuid)
                                                    <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner_uuid }}/collection/{{ $item->id }}/view"
                                                        target="_blank"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Acknowledgment
                                                        Receipt</a>
                                                    @elseif($item->guest_uuid)
                                                    <a href="/property/{{ $item->property_uuid }}/guest/{{ $item->guest_uuid }}/collection/{{ $item->id }}/view"
                                                        target="_blank"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Acknowledgment
                                                        Receipt</a>
                                                    @endif

                                                </li>
                                                <?php $proof_of_payment = App\Models\AcknowledgementReceipt::where('property_uuid', $item->property_uuid)
                                                ->where('tenant_uuid', $item->tenant_uuid)
                                                ->where('ar_no', $item->ar_no); ?>
                                                <li>
                                                    @if($proof_of_payment->pluck('attachment')->first())
                                                    <a href="{{ asset('/storage/'.$proof_of_payment->pluck('attachment')->first()) }}"
                                                        target="_blank"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Proof
                                                        of payment</a>
                                                    @else

                                                    @endif
                                                </li>
                                                @if($proof_of_payment->pluck('proof_of_payment')->first())
                                                <a href="{{ asset('/storage/'.$proof_of_payment->pluck('proof_of_payment')->first()) }}"
                                                    target="_blank"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Proof
                                                    of deposit</a>
                                                @else
                                                @endif
                                            </ul>
                                        </div>
                                        @cannot('tenant')
                                        <x-button data-modal-target="collection-edit-component-{{$item->id}}"
                                            data-modal-toggle="collection-edit-component-{{$item->id}}" type="button">
                                            Edit
                                        </x-button>
                                        <x-button class="bg-red-500" data-modal-target="delete-collection-modal-{{$item->id}}"
                                            data-modal-toggle="delete-collection-component-{{$item->id}}" type="button">
                                            Delete
                                        </x-button>
                                        @endcannot
                                    </x-td>
                                </tr>
                                @livewire('collection-edit-component', ['collection' => $item],
                                key(Carbon\Carbon::now()->timestamp.''.$item->id))

                                @livewire('delete-collection-component', ['collection' => $item],
                                key(Carbon\Carbon::now()->timestamp.''.$item->id))
                                @endforeach
                            </x-table-body-component>
                        </x-table-component>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </div>
</x-new-layout>
