<x-new-layout>
    @section('title','Verify Payments | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ url()->previous() }}"><img class="h-5 w-auto"
                                    src="{{ asset('/brands/back-button.png') }}"></a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="mt-5 px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-700 mt-5">Verify Payments</h1>
                        <h1 class="text-3xl font-bold text-gray-700 ">Batch #: {{ $paymentRequest->batch_no }}</h1>
                    </div>
                </div>
                <form action="#" method="POST">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="created_at" class="block text-sm font-medium text-gray-700">Date:</label>
                                    <input type="text" name="created_at" id="created_at" autocomplete="created_at" value={{ Carbon\Carbon::parse($paymentRequest->created_at) }}
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                </div>
                
                                <div class="col-span-3 sm:col-span-2">
                                    <label for="tenant_uuid" class="block text-sm font-medium text-gray-700">Name of
                                        Tenant</label>
                                    <input type="text" name="tenant_uuid" id="tenant_uuid" autocomplete="tenant_uuid" value="{{ $paymentRequest->tenant->tenant }}"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                </div>
                
                                {{-- <div class="col-span-3 sm:col-span-2">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Unit
                                        No.</label>
                                    <input type="text" name="email-address" id="email-address" autocomplete="email"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                </div> --}}
                
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="email-address" class="block text-sm font-medium text-gray-700">Amount</label>
                                    <input type="text" name="email-address" id="email-address" autocomplete="email"
                                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                </div>
                
                                <div class="col-span-3 sm:col-span-3">
                                    <label for="concern" class="block text-sm font-medium text-gray-700">Mode of
                                        Payment:</label>
                
                                    <select id="concern" name="concern"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                        <option>Cash</option>
                                        <option>E-wallet</option>
                                        <option>Bank</option>
                                        <option>Cheque</option>
                
                
                                    </select>
                
                                </div>
                
                
                                <div class="sm:col-span-6">
                                    <label for="concern" class="block text-sm font-medium text-gray-700">Proof of
                                        payment</label>
                                    <div class="mt-1">
                                            
                                    </div>
                
                                </div>
                
                
                
                                <div class="sm:col-span-3">
                                    <fieldset>
                                        <div>
                                            <label for="about" class="block text-sm font-medium text-gray-700">Approved
                                                by:
                                            </label>
                                            <div class="mt-1">
                                                <textarea id="about" name="about" rows="3"
                                                    class="h-5 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                                    placeholder=""></textarea>
                                            </div>
                                        </div>
                
                
                                </div>
                            </div>
                            <div class="px-4 py-3 text-right sm:px-6">
                                <button type="submit"
                                    class="inline-flex justify-end py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Deny</button>
                                <button type="submit"
                                    class="inline-flex justify-end py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Accept</button>
                            </div>
                        </div>
                </form>
            </div>

          
        </div>
    </div>
</x-new-layout>