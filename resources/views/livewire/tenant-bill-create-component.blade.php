<div>
    <div class="my-5 px-4 sm:px-6 lg:px-8">
        <div class="sm:grid grid-cols-1 lg:grid-cols-4 sm:items-center">
            <nav class="mt-5 border-b flex col-start-1" aria-label="Breadcrumb">
                <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6">

                    <li class="flex">
                        <div class="flex items-center">
                            <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44"
                                preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                            </svg>
                            <button
                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant->uuid }}'"
                                class="ml-4 text-lg font-medium text-gray-500 hover:text-gray-700 ">
                                {{ $tenant->tenant }} </button>
                        </div>
                    </li>

                </ol>
            </nav>
            <div class="col-span-3 flex sm:justify-center lg:justify-end items-end">
                <div class="sm:my-10 md:my-5 lg:my-0">

                    @if($total_unpaid_bills->count())
                    <x-button data-modal-toggle="export-tenant-bill">Export
                        Bill ({{
                        App\Models\Tenant::find($tenant->uuid)->bills()->where('status', '!=','paid')->count()
                        }})</a></x-button>

                    <x-button data-modal-toggle="send-tenant-bill">Send
                        Bill ({{ App\Models\Tenant::find($tenant->uuid)->bills()->where('status',
                        '!=', 'paid')->count() }})</a></x-button>
                    @endif

                    <x-button data-modal-toggle="create-bill-modal">
                        Create Bill</a></x-button>

                    <x-button data-modal-toggle="create-particular-modal">
                        Create Particular</a></x-button>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-3">
            @if($bills)
            <x-label for="status">Filter status</x-label>
            <x-form-select wire:model.lazy="status" autocomplete="status">
                <option value="all" {{ $status=='' ? 'selected' : 'selected' }}> all </option>
                <option value="paid" {{ $status=='paid' ? 'selected' : 'selected' }}> paid </option>
                <option value="partially_paid" {{ $status=='partially_paid' ? 'selected' : 'selected' }}> partially paid </option>
                <option value="unpaid" {{ $status=='unpaid' ? 'selected' : 'selected' }}> unpaid </option>
            </x-form-select>
            @endif
        </div>

        <div class="sm:col-span-3">
            @if($bills)
            <x-label for="particular">Filter particulars</x-label>
            <x-form-select wire:model.lazy="particular" autocomplete="particular">

                <option value="">Filter bill particulars</option>
                @foreach ($particulars as $item)
                <option value="{{ $item->particular_id }}">{{ $item->particular }}</option>
                @endforeach
            </x-form-select>
            @endif
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-3">
            @if($selectedBills)
            <div class="mt-5">
                <span>You've selected <b>{{ count($selectedBills) }}</b> {{ Str::plural('bill',
                    count($selectedBills))}}
                    amounting to <b>{{ number_format($total, 2) }}</b></span>
            </div>
            @else
            <div class="mt-1">
                <b>Please check the bill you want to pay</b>
            </div>
            @endif
        </div>

        <div class="sm:col-span-3 text-right">
            @if($selectedBills)
            <x-button wire:click="payBills">
                Pay Bills
            </x-button>
            @endif
        </div>
    </div>

    <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200">
            <div class="flex flex-col">
                <div class="-my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                           <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <tbody>
                                <x-td>Total</x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td>{{ number_format(App\Models\Bill::postedTenantBill($tenant->uuid), 2)}}/{{ number_format(App\Models\Collection::paidByTenant($tenant->uuid), 2) }}/{{ number_format(App\Models\Bill::postedTenantBill($tenant->uuid)-App\Models\Collection::paidByTenant($tenant->uuid), 2) }}</x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                            </tbody>
                            <thead class="bg-gray-50">
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th></x-th>
                                    <x-th>BILL #</x-th>
                                    <x-th>DATE POSTED</x-th>
                                    <x-th>BILL TO</x-th>
                                    <x-th>UNIT</x-th>
                                    <x-th>PERIOD COVERED</x-th>
                                    <x-th>PARTICULAR</x-th>
                                    <x-th>AMOUNT DUE/AMOUNT PAID/BALANCE</x-th>
                                    <x-th></x-th>
                                    <x-th></x-th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($bills as $index => $bill)
                                <tr>
                                    <x-td>{{ $index+1 }}</x-td>
                                    <x-th>
                                        @if(!App\Models\Collection::paidByBill($bill->id))
                                        <x-input name="selectedBills" type="checkbox" wire:model="selectedBills" value="{{ $bill->id }}" />
                                        @endif
                                    </x-th>
                                    <x-td>{{ $bill->bill_no}}</x-td>
                                    <x-td>{{ Carbon\Carbon::parse($bill->created_at)->format('M d, Y') }} </x-td>
                                    <x-td>
                                        @if($bill->tenant_uuid)
                                        <x-link-component link="/property/{{ $bill->property_uuid }}/tenant/{{ $bill->tenant_uuid }}">
                                            {{ Str::limit($bill->tenant->tenant,20) }} (T)
                                        </x-link-component>
                                        @elseif($bill->owner_uuid)
                                        <x-link-component link="/property/{{ $bill->property_uuid }}/owner/{{ $bill->owner_uuid }}">
                                            {{ Str::limit($bill->owner->owner,20) }} (O)
                                        </x-link-component>
                                        @elseif($bill->guest_uuid)
                                        <x-link-component link="/property/{{ $bill->property_uuid }}/guest/{{ $bill->guest_uuid }}">
                                            {{ Str::limit($bill->guest->guest,20) }} (G)
                                        </x-link-component>
                                        @else
                                        NA
                                        @endif
                                    </x-td>
                                    <x-td>
                                        <x-link-component link="/property/{{ $bill->property_uuid }}/unit/{{ $bill->unit_uuid }}">
                                            {{ Str::limit($bill->unit->unit,20) }}
                                        </x-link-component>
                                    </x-td>
                                    <x-td>
                                        {{ Carbon\Carbon::parse($bill->start)->format('M d, Y').'-'.Carbon\Carbon::parse($bill->end)->format('M d, Y') }}
                                    </x-td>
                                    <x-td>
                                        {{ Str::limit($bill->particular->particular,15) }} </a>
                                    </x-td>
                                    <x-td>
                                        <div class="flex">
                                        {{ number_format($bill->bill, 2) }}/{{ number_format(App\Models\Collection::paidByBill($bill->id), 2) }}/{{ number_format(($bill->bill-App\Models\Collection::paidByBill($bill->id)), 2) }}
                                        @if(App\Models\Collection::paidByBill($bill->id))

                                        <x-status-component title="paid" class="bg-green-100 text-green-800">
                                            <i class="fa-solid fa-circle-check"></i>
                                        </x-status-component>
                                        @else
                                        <x-status-component title="unpaid" class="bg-red-100 text-red-800">
                                          <i class="fa-solid fa-circle-xmark"></i>
                                        </x-status-component>
                                        @endif
                                        @if($bill->description === 'movein charges' && $bill->status==='unpaid')
                                        <x-status-component title="urgent" class="bg-orange-100 text-orange-800">
                                           <i class="fa-solid fa-bolt"></i>
                                        </x-status-component>
                                        @endif
                                        </div>
                                    </x-td>
                                    <x-td>
                                        <x-button data-modal-toggle="edit-bill-modal-{{$bill->id}}">
                                            Edit
                                        </x-button>
                                    </x-td>
                                    <x-td>
                                        <x-button class="bg-red-500" data-modal-toggle="delete-bill-modal-{{$bill->id}}">
                                            Delete
                                        </x-button>
                                    </x-td>
                                </tr>
                                @livewire('edit-bill-component', ['bill_details' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id))
                                @livewire('delete-bill-component', ['bill' => $bill], key(Carbon\Carbon::now()->timestamp.''.$bill->id))
                                @endforeach
                            </tbody>

                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.create-bill-modal')
    @include('modals.export-tenant-bill')
    @include('modals.send-tenant-bill')
    @include('modals.instructions.create-particular-modal')
    @include('modals.create-particular')
</div>
