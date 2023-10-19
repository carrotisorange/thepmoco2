<div>

    <div class="max-full mx-auto sm:px-6">
        <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <a href="/property/{{ Session::get('property_uuid') }}/collection/{{ 'approved' }}/{{
                    Session::get('property_uuid') }}"><img class="h-5 w-auto"
                                src="{{ asset('/brands/back-button.png') }}"></a>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-semibold text-gray-700 mt-5">Verify Payments / {{ $paymentRequest->batch_no
                        }}</h1>
                    {{-- <h1 class="text-3xl font-bold text-gray-700 ">Batch #: </h1> --}}

                </div>
            </div>

            <div class="shadow sm:rounded-md sm:overflow-hidden">

                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-6 gap-6">

                        <div class="col-span-3 sm:col-span-2">
                            <label for="created_at" class="block text-sm font-medium text-gray-700">Date:</label>
                            {{ Carbon\Carbon::parse($paymentRequest->created_at)->format('M d, Y') }}
                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="tenant_uuid" class="block text-sm font-medium text-gray-700">
                                Tenant</label>
                            {{ $paymentRequest->tenant->tenant }}
                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">
                                Status
                            </label>
                            {{ $paymentRequest->status }}
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Amount</label>
                            {{ $paymentRequest->amount }}
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Mode of
                                Payment:</label>

                            {{ $paymentRequest->mode_of_payment}}
                        </div>

                        <div class="col-span-2 sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Bank name</label>
                            {{ $paymentRequest->bank_name }}
                        </div>

                        <div class="col-span-2 sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Date Deposited</label>
                            {{ Carbon\Carbon::parse($paymentRequest->date_deposited)->format('M d, Y')}}
                        </div>


                        <div class="col-span-2 sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Cheque/Reference
                                Number</label>
                            {{ $paymentRequest->check_reference_no }}
                        </div>


                        <div class="sm:col-span-3">
                            <label for="concern" class="block text-sm font-medium text-gray-700">Proof of
                                payment</label>
                            <div class="mt-1">
                                @if(!$paymentRequest->proof_of_payment == null)

                                <a href="{{ asset('/storage/'.$paymentRequest->proof_of_payment) }}" target="_blank"
                                    class="text-indigo-600 hover:text-indigo-900">View
                                    Attachment</a>


                                {{-- <a
                                    href="/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/payments_request/{{ $paymentRequest->id }}/download"
                                    class="text-indigo-600 hover:text-indigo-900">View Attachment</a> --}}
                                @endif
                            </div>

                        </div>



                        <div class="sm:col-span-3">
                            <fieldset>
                                <div>
                                    <label for="bill_nos" class="block text-sm font-medium text-gray-700">
                                        Bills Nos to be paid
                                    </label>
                                    {{ $paymentRequest->bill_nos }}
                                </div>


                        </div>

                        <div class="sm:col-span-6">

                            <div>
                                <label for="reason_for_rejection" class="block text-sm font-medium text-gray-700">
                                    Remarks
                                </label>
                                <div class="mt-1">
                                    <input id="reason_for_rejection" wire:model="reason_for_rejection" rows="10"
                                        class="h-8 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md" />
                                    {{-- {{ $paymentRequest->reason_for_rejection }} --}}

                                </div>
                            </div>

                            @error('reason_for_rejection')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror


                        </div>
                    </div>

                    <div class="px-4 py-3 text-right sm:px-6">
                        <x-button class="bg-red-500" wire:click="declinePayments">Reject</x-button>
                        <x-button wire:click="payBills">Pay Bills</x-button>
                    </div>
                </div>

            </div>
        </div>
    </div>