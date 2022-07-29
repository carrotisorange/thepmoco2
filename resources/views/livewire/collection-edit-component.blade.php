<div>
    <div class="p-3">
        <div class="p-8 bg-white border-b border-gray-200">
            <div class="mt-2 flex flex-wrap mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <x-label for="created_at">
                        Date
                    </x-label>
                    <x-form-input form="edit-form" name="created_at" wire:model="created_at" type="date" required />

                    @error('created_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label for="particular_id">
                        Mode of payment
                    </x-label>
                    <x-form-select form="edit-form" name="form" wire:model="form" required>
                        <option value="bank" {{ old('form')=='bank' ? 'selected' : 'Select one' }}>bank</option>
                        <option value="cash" {{ old('form')=='cash' ? 'selected' : 'Select one' }} selected>cash
                        </option>
                        <option value="cheque" {{ old('form')=='cheque' ? 'selected' : 'Select one' }}>cheque
                        </option>
                    </x-form-select>

                    @error('form')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @if($form === 'bank')
            <div class="mt-2 flex flex-wrap mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <x-label for="bank">
                        Bank
                    </x-label>
                    <x-form-input form="edit-form" name="bank" wire:model="bank" type="text" />

                    @error('bank')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label for="date_deposited">
                        Date Deposited
                    </x-label>
                    <x-form-input form="edit-form" name="date_deposited" wire:model="date_deposited" type="date" />

                    @error('date_deposited')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


            </div>
            <div class="w-full  px-3">
                <x-label for="attachment">
                    Proof of payment (Deposit Slip)
                </x-label>
                <x-form-input form="edit-form" name="attachment" wire:model="attachment" type="file" />

                @error('attachment')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-2 flex flex-wrap mb-6">

            </div>
            @endif

            @if($form === 'cheque')
            <div class="mt-2 flex flex-wrap mb-6">
                <div class="w-full px-3">
                    <x-label for="check_no">
                        Cheque No
                    </x-label>
                    <x-form-input form="edit-form" name="check_no" wire:model="check_no" type="text" />

                    @error('check_no')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>
            </div>
            @endif
        </div>


        <div class="mt-5 p-2 bg-white border-b border-gray-200">

            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                        <x-table-input form="edit-form" name="bill_id_{{ $index }}" type="hidden"
                                            value="{{ $bill->id }}" />
                                        <x-table-input form="edit-form" name="collection_amount_{{ $index }}"
                                            type="number" required value="{{ $bill->bill-$bill->initial_payment }}" />
                                    </x-td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

{{-- 
        @if($tenant->email)
        <div class="mt-5 p-2 bg-white border-b border-gray-200">
            <div class="flex flex-wrap mb-6">
                <div class="mt-2 w-full md:w-full  mb-6 md:mb-0">
                    <div>
                        <div class="form-check">
                            <input wire:model="sendPayment" form="edit-form"
                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                type="checkbox" value="{{ old('sendPayment'), $sendPayment }}"
                                name="sendPayment">
                            <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                                Send payment details to {{ $tenant->email }}
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif --}}

        <div class="mt-5 p-2">
            <p class="text-right">
                <x-button form="edit-form">
                    Confirm Payment
                </x-button>
            </p>
        </div>
    </div>
</div>