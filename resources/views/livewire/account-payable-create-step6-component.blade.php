<div>
    @include('layouts.notifications')
    <div class="mt-5 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-end">
            {{-- <button type="button"
                class="mb-4 bg-white py-2 px-4 underline rounded-md text-sm font-medium text-gray-700 hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Export</button>
            --}}
        </div>
        {{-- start-step-1-form --}}
        <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">

            <div class="md:grid md:grid-cols-6 md:gap-6">

                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Particulars</label>

                </div>

                <div class="sm:col-span-6">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50">
                            <tr>
                                <x-th>#</x-th>
                                <x-th>UNIT</x-th>
                                <x-th>VENDOR</x-th>
                                <x-th>ITEM </x-th>
                                <x-th>QUANTITY</x-th>
                                {{-- @if($accountpayable->request_for === 'payment') --}}
                                <x-th>Price</x-th>
                                <x-th>Total</x-th>
                                {{-- @endif --}}

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($particulars as $index => $particular)
                            <div wire:key="particular-field-{{ $particular->id }}">
                                <tr>
                                    <x-td>{{ $index+1 }}</x-td>
                                    <x-td>
                                        @if($particular->unit_uuid)
                                        {{ App\Models\Unit::find($particular->unit_uuid)->unit }}
                                        @else
                                        NA
                                        @endif
                                    </x-td>
                                    <x-td>
                                        @if($particular->vendor_id)
                                        {{ App\Models\PropertyBiller::find($particular->vendor_id)->biller }}
                                        @else
                                        NA
                                        @endif
                                    </x-td>
                                    <x-td>
                                        {{ $particular->item }}
                                    </x-td>
                                    <x-td>
                                        {{ $particular->quantity }}
                                    </x-td>
                                    {{-- @if($accountpayable->request_for === 'payment') --}}
                                    <x-td>
                                        {{ $particular->price }}
                                    </x-td>
                                    <x-td>
                                        {{ number_format($particular->price * $particular->quantity, 2) }}
                                    </x-td>
                                    {{-- @endif --}}

                                </tr>
                            </div>
                            @endforeach
                            <tr>
                                <x-td>Total</x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td>{{ number_format($particulars->sum('total'),2) }}</x-td>
                            </tr>
                        </tbody>
                    </table>
                </div>


                <div class="sm:col-span-6">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Vendor Details</label>

                </div>


                {{-- price --}}
                {{-- <div class="sm:col-span-3">
                    <label for="amount" class="block text-sm font-medium text-gray-700">Amount:</label>
                    <input type="number" step="0.01" value="{{ $accountpayable->amount }}" name="amount" readonly
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('amount')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div> --}}


                {{-- vendor details --}}
                {{-- <div class="sm:col-span-3">
                    <label for="vendor-details" class="block text-sm font-medium text-gray-700">Vendor:</label>
                    <input type="text" value="{{ $accountpayable->vendor }}" name="vendor" readonly
                        class="mt-1 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                    @error('selected_vendor')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div> --}}


                <div class="sm:col-span-6">
                    <label class="block text-sm font-medium text-gray-700"> Selected quotation</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="selected_quotation"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span>

                                        @if($accountpayable->selected_quotation == 'quotation1')

                                        <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Selected Quotation</a>

                                        @elseif($accountpayable->selected_quotation == 'quotation2')

                                        <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Selected Quotation</a>

                                        @elseif($accountpayable->selected_quotation == 'quotation3')

                                        <a href="{{ asset('/storage/'.$accountpayable->quotation3) }}" target="_blank"
                                            class="text-blue-500 text-decoration-line: underline">View
                                            Selected Quotation</a>

                                        @else
                                        <a href="#" class="text-red-500 text-decoration-line: underline">No Selected
                                            Quotation
                                            was uploaded</a>
                                        @endif

                                    </span>


                                </label>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="sm:col-span-7">
                    <label class="block text-sm font-medium text-gray-700">Upload the proof of payment</label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="attachment"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span>Upload a file</span>
                                    <span wire:loading>Loading...</span>
                                    <input id="attachment" wire:model="attachment" type="file" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($attachment)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeAttachment('attachment')">Remove the
                                            attachment
                                            .</a></span>
                                    @endif

                                </label>

                            </div>

                            @error('attachment')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            @if ($attachment)
                            <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                    class="fa-solid fa-circle-check"></i></p>
                            @endif
                        </div>
                    </div>
                </div>




                {{-- reject, approve button --}}
                <div class="col-start-6 flex items-center justify-end">

                    <!-- <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                        href="#/" wire:click="markAsReleased">
                        Skip
                    </a>
                    <button
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">


                        Finish
                    </button> -->

                    <button
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">


                        Next
                    </button> 

                </div>

            </div>
        </form>
        {{-- end-step-1-form --}}
    </div>
</div>