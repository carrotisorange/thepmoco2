<div>
    <div class="mt-5 px-4 sm:px-6 lg:px-8">
        <form class="space-y-6" wire:submit.prevent="approveRequest">
            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="sm:col-span-2">
                    <x-label > Quotation 1</x-label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="selected_quotation"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span>
                                        @if($accountpayable->quotation1)
                                        <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank" class="text-blue-500 text-decoration-line: underline">View Quotation/Bill</a>
                                        @else
                                        <a href="#" class="text-red-500 text-decoration-line: underline">No quotation/bill was uploaded</a>
                                        @endif
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-2">
                    <x-label > Quotation 2</x-label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="selected_quotation"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span>
                                        @if($accountpayable->quotation2)
                                        <a href="{{ asset('/storage/'.$accountpayable->quotation2) }}" target="_blank" class="text-blue-500 text-decoration-line: underline">View Quotation/Bill</a>
                                        @else
                                        <a href="#" class="text-red-500 text-decoration-line: underline">No Quotation/Bill was uploaded</a>
                                        @endif
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <x-label > Quotation 3</x-label>
                    <div  class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="selected_quotation" class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span>
                                        @if($accountpayable->quotation3)
                                        <a href="{{ asset('/storage/'.$accountpayable->quotation3) }}" target="_blank" class="text-blue-500 text-decoration-line: underline">View Quotation/Bill</a>
                                        @else
                                        <a href="#" class="text-red-500 text-decoration-line: underline">No Quotation/Bill was uploaded</a>
                                        @endif
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <x-label > Selected quotation</x-label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <div class="flex text-sm text-gray-600">
                                <label for="selected_quotation"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                    <span>
                                        @if($accountpayable->selected_quotation == 'quotation1')
                                        <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank" class="text-blue-500 text-decoration-line: underline">View Selected Quotation</a>
                                        @elseif($accountpayable->selected_quotation == 'quotation2')
                                        <a href="{{ asset('/storage/'.$accountpayable->quotation1) }}" target="_blank" class="text-blue-500 text-decoration-line: underline">View Selected Quotation</a>
                                        @elseif($accountpayable->selected_quotation == 'quotation3')
                                        <a href="{{ asset('/storage/'.$accountpayable->quotation3) }}" target="_blank" class="text-blue-500 text-decoration-line: underline">View Selected Quotation</a>
                                        @else
                                        <a href="#" class="text-red-500 text-decoration-line: underline">No Selected Quotation was uploaded</a>
                                        @endif
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-6">
                    <x-label for="vendor-details" >Particulars</x-label>
                </div>
                <div class="sm:col-span-6">
                    <x-table-component">
                        <x-table-head-component>
                            <tr>
                                <x-th>#</x-th>
                                <x-th>UNIT</x-th>
                                <x-th>VENDOR</x-th>
                                <x-th>ITEM </x-th>
                                <x-th>QUANTITY</x-th>
                                <x-th>Price</x-th>
                                <x-th>Total</x-th>
                            </tr>
                        </x-table-head-component>
                        <x-table-body-component>
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
                                    <x-td>
                                        {{ $particular->price }}
                                    </x-td>
                                    <x-td>
                                        {{ number_format($particular->price * $particular->quantity, 2) }}
                                    </x-td>
                                </tr>
                            </div>
                            @endforeach
                            </x-table-body-component>
                            <x-table-body-component>
                            <tr>
                                <x-td>Total</x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td></x-td>
                                <x-td>{{ number_format($particulars->sum('total'),2) }}</x-td>
                            </tr>
                        </x-table-body-component>
                    </table>
                </div>

                <div class="sm:col-span-6">
                    <x-label for="vendor-details" >Vendor Details</x-label>
                </div>
                <div class="sm:col-span-3">
                    <x-label for="vendor-details" >Vendor Name:</x-label>
                    <x-form-input type="text" wire:model="vendor" readonly/>
                    <x-validation-error-component name='selected_vendor' />
                </div>
                <div class="sm:col-span-3">
                    <x-label for="delivery-date" >Delivery Date:</x-label>
                    <x-form-input type="date" wire:model="delivery_at" readonly/>
                    <x-validation-error-component name='delivery_at' />
                </div>
                <div class="sm:col-span-6">
                    <x-label for="vendor-details" >Comment</x-label>
                </div>
                <div class="sm:col-span-6">
                    <x-form-textarea placeholder="Add your comment..." wire:model="comment"/>
                </div>

                <div class="col-start-6 flex items-center justify-end">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"  href="#/" wire:click="rejectRequest"> Reject </a>
                   <x-button type="submit">
                        Approve
                    </x-button>
                </div>
            </div>
        </form>
    </div>
</div>
