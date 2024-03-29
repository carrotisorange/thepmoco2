<form action="" enctype="multipart/form-data" wire:submit.prevent="submitForm()" method="POST">
    <div class="shadow sm:rounded-md sm:overflow-hidden">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-2 gap-6">
                <div class="col-span-1">
                    <label for="start" class="block text-sm font-medium text-gray-700">Contracts starts on</label>
                    <input type="date" wire:model="start" autocomplete="start"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                   <x-validation-error-component name='start' />
                </div>
                <div class="col-span-1">
                    <label for="end" class="block text-sm font-medium text-gray-700">Contract ends on</label>
                    <input type="date" wire:model="end" autocomplete="end"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                  <x-validation-error-component name='end' />
                </div>

                <div class="col-span-1">
                    <label for="start" class="block text-sm font-medium text-gray-700">Status</label>
                    <select wire:model="status"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md"
                        required>
                        <option value="active" {{ old('status', $contract_info->
                            status) == 'active' ? 'selected' : 'selected' }}>
                            active
                        </option>
                        <option value="inactive" {{ old('status', $contract_info->
                            status) == 'inactive' ? 'selected' : 'selected' }}>
                            inactive
                        </option>
                        <option value="pendingmovein" {{ old('status', $contract_info->
                            status) == 'pendingmovein' ? 'selected' : 'selected' }}>
                            pendingmovein
                        </option>
                        </option>
                        <option value="pendingmoveout" {{ old('status', $contract_info->
                            status) == 'pendingmoveout' ? 'selected' : 'selected' }}>
                            pendingmoveout
                        </option>
                        <option value="reserved" {{ old('status', $contract_info->
                            status) == 'reserved' ? 'selected' : 'selected' }}>
                            reserved
                        </option>

                    </select>
                  <x-validation-error-component name='status' />
                </div>

                <div class="col-span-1">
                    <label for="start" class="block text-sm font-medium text-gray-700">Rent/Month/Tenant</label>
                    <input type="number" wire:model="rent" autocomplete="rent"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                    <x-validation-error-component name='rent' />
                </div>

                <div class="col-span-1">
                    <label for="start" class="block text-sm font-medium text-gray-700">Tenant moves out on </label>
                    @if($contract_info->moveout_at)
                    {{ Carbon\Carbon::parse($contract_info->moveout_at)->format('M d, Y') }}
                    @else
                    NA
                    @endif
                </div>

                <div class="col-span-1">
                    <label for="start" class="block text-sm font-medium text-gray-700">Tenant's reason for moving out
                    </label>
                    @if($contract_info->moveout_reason)
                    {{ $contract_info->moveout_reason }}
                    @else
                    NA
                    @endif
                </div>

                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700"> Upload a contract
                    </label>
                    <div
                        class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload"
                                    class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    @if($contract_info->contract)
                                    <span>Upload a new contract</span>
                                    @else
                                    <span>Upload a contract</span>
                                    @endif

                                    <input id="file-upload" type="file" wire:model="contract" class="sr-only">
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                    @if($contract)
                                    <span class="text-red-500 text-xs mt-2">
                                        <a href="#/" wire:click="removeContract()">Remove the uploaded
                                            contract.</a></span>
                                    @else
                                    {{-- <span class="text-red-600">No contract found.</span> --}}
                                    @endif

                                    @if($contract_info->contract)
                                    <br>
                                    <span class="text-blue-500 text-xs mt-2">
                                        <a href="{{ asset('/storage/'.$contract_info->contract) }}" target="_blank">View
                                            the uploaded contract.</a></span>


                                    @endif
                                </label>

                            </div>

                        </div>

                    </div>

                 <x-validation-error-component name='contract' />
                    @if($contract)
                    <p class="text-green-500 text-xs mt-2">File has been attached. <i
                            class="fa-solid fa-circle-check"></i></p>
                    @endif
                </div>
            </div>
            <div class="px-4 py-3 text-right sm:px-6">
                <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant }}'">
                        Cancel
                </x-button>

                <x-button type="submit">
                    Update
                </x-button>
            </div>
        </div>
    </div>
</form>
