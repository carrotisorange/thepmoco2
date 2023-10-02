<div>
    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-500">Guest / {{ $bill->guest->guest }} / Bill # {{ $bill->bill_no }}
            </h1>
        </div>
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <button onclick="window.location.href='/property/{{ $bill->property_uuid }}/guest/{{ $bill->guest_uuid }}/'"
                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"
                type="button">Back
            </button>

        </div>
    </div>
    <div class="mx-10">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="mt-5 sm:flex-auto">
                    <h1 class="text-base font-semibold leading-6 text-gray-900">Bill Details</h1>

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
                                        BIll
                                        No
                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $bill->bill_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Particular

                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <select wire:model="particular_id"
                                            class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-10 w-1/2 sm:text-sm border border-gray-700  rounded-md">
                                            @foreach ($particulars as $particular)
                                            <option value="{{ $particular->particular_id }}" {{ $particular->
                                                particular_id == $particular_id ? 'selected' : 'selected' }}>
                                                {{ $particular->particular }}
                                            </option>
                                            @endforeach

                                        </select> @error('particular_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Start

                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <input type="date" wire:model="start" name="start"
                                            class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-10 w-1/2 sm:text-sm border border-gray-700  rounded-md">
                                        @error('start')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        End

                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <input type="date" wire:model="end" name="end"
                                            class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-10 w-1/2 sm:text-sm border border-gray-700  rounded-md">
                                        @error('end')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">
                                        Amount

                                    </th>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <input type="nummber" step="0.001" wire:model="bill_amount" name="bill_amount"
                                            class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-10 w-1/2 sm:text-sm border border-gray-700  rounded-md">
                                        @error('bill_amount')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>


                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-start-6 flex items-center justify-end">
                

                <button type="button" wire:click="updateBill"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                    Update
                </button>
            </div>
        </div>