<div>

    <div class="mx-10">
        <form wire:submit.prevent="approveLiquidation">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <x-th >
                                            Batch No
                                        </x-th>
                                        <x-td >
                                            {{ $accountpayableliquidation->batch_no }}
                                        </x-td>
                                    </tr>
                                    <tr>
                                        <x-th >
                                            Date
                                            Liquidated
                                        </x-th>
                                        <x-td >{{
                                            Carbon\Carbon::parse($accountpayableliquidation->created_at)->format('M d,
                                            Y')
                                            }}</x-td>
                                    </tr>
                                    <tr>
                                        <x-th >
                                            Prepared
                                            by
                                        </x-th>
                                        <x-td >{{
                                            App\Models\User::find($accountpayableliquidation->prepared_by)->name }}</x-td>
                                    </tr>
                                    <tr>
                                        <x-th >
                                            Name
                                        </x-th>
                                        <td >{{
                                            $accountpayableliquidation->name }}</td>
                                    </tr>
                                    <tr>
                                        <x-th >
                                            Department/Section
                                        </x-th>
                                        <x-td >{{
                                            $accountpayableliquidation->department }}</x-td>
                                    </tr>

                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="mt-5 sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Particulars</h1>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead>
                                    <tr>
                                        <x-th >
                                            #
                                        </x-th>
                                        <x-th >
                                            Unit</x-th>
                                        <x-th >
                                            Vendor
                                        </x-th>
                                        <x-th >OR
                                            Number
                                        </x-th>
                                        <x-th >
                                            Item</x-th>
                                        <x-th >
                                            Quantity
                                        </x-th>
                                        <x-th >
                                            Amount
                                        </x-th>
                                        <x-th >
                                            Total</x-th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($particulars as $index => $particular)
                                    <tr>
                                        <x-td
                                            >
                                            {{ $index+1 }}</x-td>
                                        <x-td >
                                            @if($particular->vendor_id)
                                            {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }}
                                            @else
                                            NA
                                            @endif
                                        </x-td>
                                        <x-td >
                                            @if($particular->unit_uuid)
                                            {{ App\Models\Unit::find($particular->unit_uuid)->unit }}
                                            @else
                                            NA
                                            @endif
                                        </x-td>
                                        <x-td >
                                            {{ $particular->or_number }}
                                        </x-td>
                                        <x-td >
                                            {{ $particular->item }}
                                        </x-td>
                                        <x-td >
                                            {{ $particular->quantity }}
                                        </x-td>
                                        <x-td >
                                            {{ number_format($particular->price, 2) }}
                                        </x-td>
                                        <x-td >
                                            {{ number_format($particular->total, 2) }}
                                        </x-td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <x-th >
                                            Total
                                        </x-th>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-td ></x-td>
                                        <x-th >
                                            {{
                                            number_format($particulars->sum('total'),2) }}
                                        </x-th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-2 flex justify-end">
                    <div>
                        <p class="mt-5 px-6 text-right">

                            <x-button class="bg-red-500" wire:click="rejectLiquidation">
                                Reject
                            </x-button>

                            <x-button type="submit">
                                Approve
                            </x-button>

                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
