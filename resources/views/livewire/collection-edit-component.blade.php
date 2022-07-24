<div>
    <div class="p-8 bg-white border-b border-gray-200">

        <div class="mt-2 flex flex-wrap mb-6">
            <div class="w-full md:w-1/2 ">
                <x-label for="guardian">
                    Mode of payment <span class="text-red-600">*</span>
                </x-label>
                <x-form-input form="edit-form" type="text" name="form"
                    value="{{ old('guardian') }}" />

                @error('guardian')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-2 w-full md:w-1/2 ">
                <x-label for="email">
                    Email
                </x-label>
                <x-form-input wire:model="email" id="grid-last-name" type="email" name="email"
                    value="{{ old('email') }}" />

                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2 w-full md:w-1/2 ">
                <x-label for="mobile_number">
                    Mobile <span class="text-red-600">*</span>
                </x-label>
                <x-form-input wire:model="mobile_number" id="grid-last-name" type="text" name="mobile_number"
                    value="{{ old('mobile_number') }}" />

                @error('mobile_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>



    </div>

    <div class="mt-5 p-2 bg-white border-b border-gray-200">

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <x-th>#</x-th>
                                <x-th>Date posted</x-th>
                                <x-th>Particular</x-th>
                                <x-th>Unit</x-th>
                                <x-th>Period</x-th>
                                <x-th>Amount Due</x-th>
                                <x-th>Payment</x-th>
                            </tr>
                        </thead>

                        <form method="POST" id="edit-form"
                            action="/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/bills/{{ $batch_no }}/pay/update">
                            @method('patch')
                            @csrf
                        </form>
                        <tbody>
                            @foreach ($collections as $index => $bill)
                            <tr>
                                <x-td>{{ $bill->bill_no }}</x-td>
                                <x-td>{{Carbon\Carbon::parse($bill->created_at)->format('M d,Y')}}
                                </x-td>
                                <x-td>{{$bill->particular->particular }}</x-td>
                                <x-td>{{$bill->unit->unit }}</x-td>
                                <x-td>{{Carbon\Carbon::parse($bill->start)->format('M d,
                                    Y').'-'.Carbon\Carbon::parse($bill->end)->format('M d, Y') }}
                                </x-td>
                                <x-td>{{ number_format(($bill->bill-$bill->initial_payment), 2) }}
                                </x-td>
                                <x-td>

                                    <x-table-input form="edit-form" name="collection_amount_{{ $index }}" type="number"
                                        value="{{ $bill->bill-$bill->initial_payment }}" />
                                </x-td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="mt-5">
    <p class="text-right">


        <x-button form="edit-form">Confirm Payments
        </x-button>

    </p>

</div>
</div>