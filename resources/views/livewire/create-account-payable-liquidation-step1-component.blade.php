<div>

    @section('styles')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
    @endsection
    <div class="mx-10">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Liquidation Details</h1>

                </div>
            </div>
            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Batch No
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $batch_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Date
                                        Requested
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <input id="created_at" name="created_at" type="date" wire:model="created_at"
                                            autocomplete="date-liquidation"
                                            class="ml-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                                        @error('created_at')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Name
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <input id="name" name="name" type="name" autocomplete="name" wire:model="name"
                                            class="ml-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                                        @error('name')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Department/Section
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <select wire:model="department"
                                            class="ml-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6">
                                            <option value="" selected>Select a unit</option>
                                            @foreach ($departments as $department)
                                            <option value="{{ $department->role }}" {{ $department===$department->role?
                                                'selected' : '' }}>
                                                {{ $department->role }}
                                            </option>
                                            @endforeach
                                        </select>
                                        {{-- <input id="department" name="department" type="department"
                                            autocomplete="department" wire:model="department"
                                            class="ml-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                                        --}}
                                        @error('department')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Unit
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <select wire:model="unit_uuid"
                                            class="ml-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6">
                                            <option value="" selected>Select a unit</option>
                                            @foreach ($units as $unit)
                                            <option value="{{ $unit->uuid }}" {{ 'particulars' .$unit_uuid===$unit->
                                                uuid? 'selected' : '' }}>
                                                {{ $unit->building->building .'-'.$unit->unit }}
                                            </option>
                                            @endforeach
                                        </select>

                                        @error('unit_uuid')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>

                            </thead>

                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="px-6 pt-5 flex justify-end items-center">
            <button type="button" wire:click="updateParticular"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                Save Item
            </button>
            <button type="button" wire:click="storeNewItem"
                class="ml-3 inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                New Item
            </button>
        </div>

        <!-- table -->
        <div class="sm:col-span-6">
            <div class="mb-5 mt-2 relative overflow-x-auto ring-opacity-5 md:rounded-lg">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-th>#</x-th>

                            <x-th>UNIT</x-th>
                            <x-th>VENDOR</x-th>
                            <x-th>OR NUMBER </x-th>
                            <x-th>ITEM</x-th>
                            <x-th>QUANTITY</x-th>
                            <x-th>AMOUNT</x-th>
                            <x-th>TOTAL</x-th>
                            {{-- <x-th></x-th> --}}
                            <x-th></x-th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($particulars as $index => $particular)
                        <div wire:key="particular-field-{{ $particular->id }}">
                            <tr>
                                <x-td>{{ $index+1 }}</x-td>

                                <x-td>
                                    <select wire:model="particulars.{{ $index }}.unit_uuid"
                                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-36 sm:text-sm border border-gray-700  rounded-md">
                                        <option value="" selected>Select a unit</option>
                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->uuid }}" {{ 'particulars' .$index.'unit_uuid'===$unit->
                                            uuid? 'selected' : '' }}>
                                            {{ $unit->building->building .'-'.$unit->unit }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('particulars.{{ $index }}.unit_uuid')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror

                                </x-td>
                                <x-td>
                                    <select wire:model="particulars.{{ $index }}.vendor_id"
                                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-36 sm:text-sm border border-gray-700  rounded-md">
                                        <option value="" selected>Select a unit</option>
                                        @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}" {{ 'particulars'
                                            .$index.'vendor_id'===$vendor->id? 'selected' : '' }}>{{
                                            $vendor->biller }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('particulars.{{ $index }}.vendor_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <input type="text" wire:model="particulars.{{ $index }}.or_number"
                                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-36 sm:text-sm border border-gray-700  rounded-md">

                                    @error('particulars.{{ $index }}.or_number')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <input type="text" wire:model="particulars.{{ $index }}.item"
                                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-96 sm:text-sm border border-gray-700  rounded-md">
                                    @error('particulars.{{ $index }}.item')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    <input type="number" wire:model="particulars.{{ $index }}.quantity"
                                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-36 sm:text-sm border border-gray-700  rounded-md">
                                    @error('particulars.{{ $index }}.quantity')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>

                                <x-td>
                                    <input type="number" step="0.001" wire:model="particulars.{{ $index }}.price"
                                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-36 sm:text-sm border border-gray-700  rounded-md">
                                    @error('particulars.{{ $index }}.price')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </x-td>
                                <x-td>
                                    {{ number_format((double)$particular->quantity * (double)$particular->price, 2) }}
                                </x-td>


                                <x-td>
                                    <button type="button" wire:click="removeParticular({{ $particular->id }})"
                                        wire:target="removeParticular"
                                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                        Remove
                                    </button>
                                </x-td>

                            </tr>
                        </div>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <!-- /table -->

        <div>
            <div class="cols-start-3 mt-10 space-y-3 0 pb-3 sm:space-y-0 sm:divide-y sm:pb-0">
                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-3">
                    <label for="total" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Liquidation
                        Total</label>
                    <div class="mt-2 sm:col-start-3 sm:mt-0">
                        {{ number_format(App\Models\AccountPayableLiquidationParticular::where('batch_no',
                        $accountpayable->batch_no)->sum('total'),2) }}
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="cash_advance" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Cash
                        Advance</label>
                    CV Number: {{ $accountpayableliquidation }}
                    {{-- <input id="cash_advance" name="cash_advance" step="0.001" type="number" placeholder="CV NUMBER"
                        autocomplete="cv_number" wire:model="cv_number"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                    @error('cv_number')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror --}}
                    <div class="mt-2 sm:col-start-3 sm:mt-0">

                        <input id="cash_advance" name="cash_advance" type="number" step="0.001"
                            autocomplete="cash_advance" wire:model="cash_advance"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                        @error('cash_advance')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>



                <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                    <label for="total_amount" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Total
                        Return</label>


                    <div class="mt-2 sm:col-start-3 sm:mt-0">
                        <div class="mt-2 sm:col-start-3 sm:mt-0">
                            {{ number_format(App\Models\AccountPayableLiquidationParticular::where('batch_no',
                            $accountpayable->batch_no)->sum('total')-$cash_advance,2) }}
                        </div>
                    </div>
                </div>
            </div>



            <!-- approval section -->
            {{-- <div class="mt-5 p-5 border flex justify-between text-sm">
                <div>
                    Prepared by:
                    <input id="prepared_by" name="prepared_by" type="text" value="{{ auth()->user()->name }}" readonly
                        autocomplete="prepared_by"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                    @error('prepared_by')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    Noted by:
                    <input id="noted_by" name="noted_by" type="text" autocomplete="noted_by"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                    @error('noted_by')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    Approved by:
                    <input id="approved_by" name="approved_by" type="text" autocomplete="approved_by"
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6" />
                    @error('approved_by')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


            </div> --}}

            <div>
                <p class="mt-5 px-6 text-right">
                    <x-button onclick="window.location.href='/property/{{ $property->uuid }}/accountpayable'">
                        Cancel
                    </x-button>
                    <x-button wire:click="storeAccountPayableLiquidation">
                        Next
                    </x-button>


                </p>
            </div>

            <!-- /approval section -->

        </div>
    </div>
</div>