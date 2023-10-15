<div>
    {{-- @include('layouts.notifications') --}}
    <div class="md:grid md:grid-cols-1 px-10 md:gap-6">
        <nav class="mt-5 border-b flex col-start-1" aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6">

                <li class="flex">
                    <div class="flex items-center">
                        <button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/guest'"
                            class="text-lg font-medium text-gray-500 hover:text-gray-700" aria-current="page">
                            Guests</button>
                    </div>
                </li>

                <li class="flex">
                    <div class="flex items-center">
                        <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44"
                            preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <button
                            onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/guest/{{ $guest->uuid }}'"
                            class="ml-4 text-lg font-medium text-gray-500 hover:text-gray-700 ">
                            {{ $guest->guest }} </button>
                    </div>
                </li>

                <li class="flex">
                    <div class="flex items-center">
                        <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44"
                            preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <button type="button" disabled class="ml-4 text-lg font-bold text-gray-700 hover:text-gray-700"
                            aria-current="page">
                            Confirm Payments</button>
                    </div>

                </li>
            </ol>
        </nav>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label for="created_at" class="">Payment Date</label>
                    <x-form-input type="date" form="edit-form" name="created_at" wire:model="created_at"/>
                    @error('created_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1">
                    <label for="form" class="">Mode of Payment</label>
                    <x-form-select wire:model="form" form="edit-form" name="form" autocomplete="form">
                        <option value="bank" {{ old('form')=='bank' ? 'selected' : 'Select one' }}>bank</option>
                        <option value="cash" {{ old('form')=='cash' ? 'selected' : 'Select one' }} selected>cash
                        </option>
                        <option value="cheque" {{ old('form')=='cheque' ? 'selected' : 'Select one' }}>cheque
                        </option>
                        <option value="e-wallet" {{ old('form')=='e-wallet' ? 'selected' : 'Select one' }} selected>
                            e-wallet
                        </option>


                    </x-form-select>
                    @error('form')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                @if($form === 'bank')
                <div class="col-span-1">
                    <label for="bank" class="">Name of the bank</label>
                    <x-form-input type="text" form="edit-form" name="bank" wire:model="bank" autocomplete="bank"/>
                    @error('bank')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1">
                    <label for="date_deposited" class="">Date Deposited
                    </label>
                    <x-form-input type="date" form="edit-form" name="date_deposited" wire:model="date_deposited"/>
                    @error('date_deposited')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endif

                @if($form === 'cheque')
                <div class="col-span-2">
                    <label for="check_no" class="">Check No
                    </label>
                    <x-form-input type="text" form="edit-form" name="check_no" wire:model="check_no"/>
                    @error('check_no')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endif

                <div class="col-span-2">

                    <label class=""> You may upload the deposit slip here.
                    </label>
                    <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                        <div class="space-y-1 text-center">

                            <div class="flex text-sm text-gray-600">
                                <label for="attachment"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Attach a deposit slip</span>
                                    <span wire:loading>Loading...</span>
                                    <input form="edit-form" name="attachment" id="attachment" type="file"
                                        class="sr-only" wire:model="attachment">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                            @if($attachment)
                            <span class="text-red-500 text-xs mt-2">
                                <a href="#/" wire:click="removeAttachment('attachment')">Remove the
                                    attachment.</a></span>
                            @endif
                        </div>


                    </div>
                    @error('attachment')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @else
                    @if ($attachment)
                    <p class="text-green-500 text-xs mt-2">File has been attached. <i
                            class="fa-solid fa-circle-check"></i></p>

                    @endif
                    @enderror



                </div>
                <div class="col-span-2">

                    <label class=""> You may upload the proof of payment
                        here.
                    </label>
                    <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                        <div class="space-y-1 text-center">

                            <div class="flex text-sm text-gray-600">
                                <label for="proof_of_payment"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Attach a proof of payment</span>
                                    <span wire:loading>Loading...</span>
                                    <input form="edit-form" name="proof_of_payment" id="proof_of_payment" type="file"
                                        class="sr-only" wire:model="proof_of_payment">
                                </label>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                            @if($proof_of_payment)
                            <span class="text-red-500 text-xs mt-2">
                                <a href="#/" wire:click="removeAttachment('proof_of_payment')">Remove the
                                    attachment.</a></span>
                            @endif
                        </div>


                    </div>
                    @error('proof_of_payment')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @else
                    @if ($proof_of_payment)
                    <p class="text-green-500 text-xs mt-2">File has been attached. <i
                            class="fa-solid fa-circle-check"></i></p>
                    @endif
                    @enderror
                </div>
            </div>
        </div>



        <div class="mt-5 bg-white-500">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <form method="POST" id="edit-form" enctype="multipart/form-data"
                    action="/property/{{ Session::get('property_uuid') }}/guest/{{ $guest->uuid }}/bills/{{ $batch_no }}/pay/update">
                    @method('patch')
                    @csrf
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <x-th>#</x-th>
                                <x-th>AR #</x-th>
                                <x-th>Date posted</x-th>
                                <x-th>Particular</x-th>
                                <x-th>Unit</x-th>
                                <x-th>Period</x-th>
                                <x-th>Amount Due</x-th>
                                <x-th>Payment</x-th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collections as $index => $bill)
                            <tr>
                                <x-td>{{ $index+1 }}</x-td>
                                <x-td>{{ $bill->bill_no }}</x-td>
                                <x-td>{{Carbon\Carbon::parse($bill->created_at)->format('M d,Y')}}
                                </x-td>
                                <x-td>{{$bill->particular->particular }}</x-td>
                                <x-td>{{ App\Models\Unit::find($bill->unit_uuid)->unit }}</x-td>
                                <x-td>{{Carbon\Carbon::parse($bill->start)->format('M d,
                                    Y').'-'.Carbon\Carbon::parse($bill->end)->format('M d, Y') }}
                                </x-td>
                                <x-td>{{
                                    number_format(($bill->bill-App\Models\Collection::where('bill_id',$bill->id)->posted()->sum('collection')),
                                    2) }}
                                </x-td>
                                <x-td>
                                    <x-table-input form="edit-form" name="bill_id_{{ $index }}" type="hidden"
                                        value="{{ $bill->id }}" />
                                    <x-table-input form="edit-form" name="collection_amount_{{ $index }}" step="0.001"
                                        type="number"
                                        value="{{ $bill->bill-App\Models\Collection::where('bill_id', $bill->id)->posted()->sum('collection') }}"
                                        required readonly />
                                </x-td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tbody>

                            <tr>
                                <x-td><b>Total</b></x-td>
                                <x-td></x-td>
                                <x-td>
                                </x-td>
                                <x-td></x-td>
                                {{-- <x-td>{{$bill->unit->unit }}</x-td> --}}
                                <x-td>
                                </x-td>
                                <x-td></x-td>
                                <x-td>
                                    <b>{{ number_format($collections->sum('bill'), 2) }}</b>
                                </x-td>

                                <x-td>
                                    <b>{{ number_format($collections->sum('bill'), 2) }}</b>
                                </x-td>
                            </tr>

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="flex justify-end p-10 mt-5">
        <x-button
            onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/guest/{{ $guest->uuid }}/bills'">
            Cancel
        </x-button>

        @if($collections->sum('bill') == 0)

        @else
        <x-button form="edit-form"
            onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';">
            Confirm Payment
        </x-button>
        @endif


    </div>


</div>
