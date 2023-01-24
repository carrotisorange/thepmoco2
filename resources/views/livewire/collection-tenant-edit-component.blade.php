<div>
    <div class="md:grid md:grid-cols-1 px-10 md:gap-6">
        <nav class="mt-5 border-b flex col-start-1" aria-label="Breadcrumb">
            <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6">

                <li class="flex">
                    <div class="flex items-center">
                        <button onclick="window.location.href='#'"
                            class="text-lg font-medium text-gray-500 hover:text-gray-700" aria-current="page">
                            Tenants</button>
                    </div>
                </li>

                <li class="flex">
                    <div class="flex items-center">
                        <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44"
                            preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <button onclick="window.location.href='#'"
                            class="ml-4 text-lg font-medium text-gray-500 hover:text-gray-700 ">
                            {{ $tenant->tenant }} </button>
                    </div>
                </li>

                <li class="flex">
                    <div class="flex items-center">
                        <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44"
                            preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                        </svg>
                        <button type="submit" class="ml-4 text-lg font-bold text-gray-700 hover:text-gray-700"
                            aria-current="page">
                            Confirm Payments</button>
                    </div>

                </li>
            </ol>
        </nav>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label for="created_at" class="block text-sm font-medium text-gray-700">Payment Date</label>
                    <input type="date" form="edit-form" name="created_at" wire:model.lazy="created_at"
                        autocomplete="created_at"
                        class="mt-1  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    @error('created_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1">
                    <label for="form" class="block text-sm font-medium text-gray-700">Mode of Payment</label>
                    <select wire:model.lazy="form" form="edit-form" name="form" autocomplete="form"
                        class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <option value="bank" {{ old('form')=='bank' ? 'selected' : 'Select one' }}>bank</option>
                        <option value="cash" {{ old('form')=='cash' ? 'selected' : 'Select one' }} selected>cash
                        </option>
                        <option value="cheque" {{ old('form')=='cheque' ? 'selected' : 'Select one' }}>cheque
                        </option>
                        <option value="e-wallet" {{ old('form')=='e-wallet' ? 'selected' : 'Select one' }} selected>
                            e-wallet
                        </option>


                    </select>
                    @error('form')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                @if($form === 'bank')
                <div class="col-span-1">
                    <label for="bank" class="block text-sm font-medium text-gray-700">Name of the bank</label>
                    <input type="text" form="edit-form" name="bank" wire:model.lazy="bank" autocomplete="bank"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    @error('bank')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="col-span-1">
                    <label for="date_deposited" class="block text-sm font-medium text-gray-700">Date Deposited
                    </label>
                    <input type="date" form="edit-form" name="date_deposited" wire:model.lazy="date_deposited"
                        autocomplete="date_deposited"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    @error('date_deposited')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endif

                @if($form === 'cheque')
                <div class="col-span-2">
                    <label for="check_no" class="block text-sm font-medium text-gray-700">Check No
                    </label>
                    <input type="text" form="edit-form" name="check_no" wire:model.lazy="check_no"
                        autocomplete="check_no"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    @error('check_no')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                @endif

                <div class="col-span-2">

                    <label class="block text-sm font-medium text-gray-700"> You may upload the deposit slip here
                        here.
                    </label>
                    <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                        <div class="space-y-1 text-center">

                            <div class="flex text-sm text-gray-600">
                                <label for="attachment"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span wire:loading.remove>Attach a deposit slip</span>
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

                    <label class="block text-sm font-medium text-gray-700"> You may upload the proof of payment
                        here.
                    </label>
                    <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                        <div class="space-y-1 text-center">

                            <div class="flex text-sm text-gray-600">
                                <label for="proof_of_payment"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span wire:loading.remove>Attach a proof of payment</span>
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
                @include('forms.collections.collection-tenant-create')
            </div>
        </div>
    </div>

    <div class="flex justify-end p-10 mt-5">
        <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
            href="/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/collection/{{ $batch_no }}">
            Cancel
        </a>
        <x-button form="edit-form"
            onclick="this.form.submit(); this.disabled = true; this.value = 'Submitting the form';">
            Confirm Payment
        </x-button>
    </div>


</div>