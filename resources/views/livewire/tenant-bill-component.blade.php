<div>
    Reference # : <b> {{ $tenant->bill_reference_no }}</b>, Deposits: <b> {{
        number_format(App\Models\Tenant::find($tenant->uuid)->collections()->where('is_deposit',
        '1')->sum('collection'), 2) }}</b>

    <div class="mt-5">
        @if($bills)
        <x-form-select class="w-24" wire:model="status">
            <option value="" {{ $status=="" ? 'selected' : 'Select one' }}>show all bills</option>
            @foreach ($statuses as $item)
            <option value="{{ $item->status }}" {{ $status==$item->status ? 'selected' : 'selected' }}> show {{
                $item->status }} bills
            </option>
            @endforeach


        </x-form-select>
        @endif
    </div>

    <div class="mt-5">
        <div class="flex flex-row">
            <div class="basis-3/4">


                @can('treasury')
                @if($total_unpaid_bills->sum('bill') && $selectedBills)
                {{-- <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/bill'">POa
                </x-button> --}}
                {{-- <x-button
                    wire:click="$emit('openModal', 'collection-modal-component', {{ json_encode(['tenant' => $tenant->uuid, 'selectedBills' => $selectedBills, 'total' => $total]) }})">
                    Create a payment
                </x-button> --}}

                <x-button wire:click="payBills">Pay Bills</x-button>
                <div class="mt-5">
                    <span>You've selected {{ count($selectedBills) }} {{ Str::plural('bill', count($selectedBills))}}
                        amounting to {{ number_format($total) }}</span>...
                </div>

                @endif
                @endcan

            </div>
            <div class="basis-1/4 ml-12 text-right">
                @can('accountowner')
                @if($selectedBills)
                <x-button
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    title="remove selected bills" onclick="confirmMessage()" wire:click="removeBills()">
                    Remove
                    bills ({{ count($selectedBills) }})
                </x-button>
                @endif
                @endcan
            </div>
        </div>
    </div>
    {{ $bills->links() }}
    <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                           @include('tenants.tables.bills')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.notifications')
</div>