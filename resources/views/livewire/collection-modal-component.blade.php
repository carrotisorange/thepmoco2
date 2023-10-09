<div>
    @include('layouts.notifications')
    <form class="p-10" wire:submit.prevent="payBill()">
        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Payment Information</h3>
     
        <div>
            <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-full px-3">
                    <x-label for="created_at">
                        Date
                    </x-label>
                    <x-form-input wire:model="created_at" type="date" />

                    @error('created_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="overflow-auto mt-5 flex flex-wrap -mx-3 mb-6">
                <table class=" w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="bg-gray-50">
                        <tr>
                            <x-th>#</x-th>
                            <x-th>Particular</x-th>
                            <x-th>Period</x-th>
                            <x-th>Amount</x-th>
                            <x-th>Payment</x-th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($collections as $index => $item)
                        <tr>
                            <x-td>{{ $item->bill_no }}</x-td>
                            <x-td>{{$item->particular->particular }}</x-td>
                            <x-td>{{Carbon\Carbon::parse($item->start)->format('M d,
                                Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}</x-td>
                            <x-td>
                                <x-table-input form="create-form" wire:model.lazy="amount.{{ $index }}" type="number"
                                    step="0.001" required readonly/>
                            </x-td>
                            <x-td>
                                <x-table-input form="create-form" wire:model.lazy="bill.{{ $index }}" type="number"
                                    step="0.001" required />
                            </x-td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-full px-3">
                    <x-label for="particular_id">
                        Mode of payment
                    </x-label>
                    <x-form-select wire:model="form" required>
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

                {{-- <div class="w-full md:w-1/2 px-3">
                    <x-label for="bill">
                        Amount
                    </x-label>
                    <x-form-input wire:model="collection" type="number" min="1" step="0.001" />

                    @error('collection')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div> --}}
            </div>

            @if($form === 'bank')
            <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <x-label for="bank">
                        Bank
                    </x-label>
                    <x-form-input wire:model="bank" type="text" />

                    @error('bank')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="w-full md:w-1/2 px-3">
                    <x-label for="date_deposited">
                        Date Deposited
                    </x-label>
                    <x-form-input wire:model="date_deposited" type="date" />

                    @error('date_deposited')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3">
                    <x-label for="attachment">
                        Attachment <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-input wire:model="attachment" type="file" />

                    @error('attachment')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @endif

            @if($form === 'cheque')
            <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3">
                    <x-label for="check_no">
                        Cheque #
                    </x-label>
                    <x-form-input wire:model="check_no" type="text" />

                    @error('check_no')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3">
                    <x-label for="attachment">
                        Attachment
                    </x-label>
                    <x-form-input wire:model="attachment" type="file" />

                    @error('attachment')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            @endif
            <div class="mt-5 flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-full px-3">
                    <div class="form-check">
                        <input wire:model="exportCollection"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            type="checkbox" value="{{ old('exportCollection'), $exportCollection }}"
                            id="flexCheckChecked">
                        <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                            Export payment details
                        </label>
                    </div>
                </div>
            </div>
            @if($collection)
            <div class="mt-5">

                <p class="text-right">
                    <span class="text-left">
                      <a class="text-red-600" href="{{ url()->previous() }}">Close</a>
                    </span>&nbsp&nbsp
                    <x-button form="create-form" wire:click="payBill()">Pay</x-button>
                </p>
            </div>
            @endif
    </form>
</div>