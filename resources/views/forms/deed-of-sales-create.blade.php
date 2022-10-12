<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class="bg-gray-100 mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the title
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="title"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Attach a file</span>
                                        <input id="title" type="file" class="sr-only" wire:model="title">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                            </div>
                            @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror


                        </div>
                        @if ($title)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the tax declaration
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="tax_declaration"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Attach a file</span>
                                        <input id="tax_declaration" type="file" class="sr-only"
                                            wire:model="tax_declaration">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                            </div>
                            @error('tax_declaration')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror


                        </div>
                        @if ($tax_declaration)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif

                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the deed of sales
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="file-deed_of_sales"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Attach a file</span>
                                        <input id="file-deed_of_sales" type="file" class="sr-only"
                                            wire:model="deed_of_sales">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                            </div>
                            @error('deed_of_sales')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        @if ($deed_of_sales)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the contract to sell
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="contract_to_sell"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Attach a file</span>
                                        <input id="contract_to_sell" type="file" class="sr-only"
                                            wire:model="contract_to_sell">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                            </div>
                            @error('contract_to_sell')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        @if ($contract_to_sell)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif
                    </div>

                    <div class="col-span-6">
                        <label class="block text-sm font-medium text-gray-700"> Please attach the certificate of
                            membership
                        </label>
                        <div class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                            <div class="space-y-1 text-center">

                                <div class="flex text-sm text-gray-600">
                                    <label for="certificate_of_membership"
                                        class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Attach a file</span>
                                        <input id="certificate_of_membership" type="file" class="sr-only"
                                            wire:model="certificate_of_membership">
                                    </label>

                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                            </div>
                            @error('certificate_of_membership')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>
                        @if ($certificate_of_membership)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                class="fa-solid fa-circle-check"></i></p>
                        @endif  
                    </div>
                    {{-- <div class="col-span-2">
                        <label for="turnover_at" class="block text-sm font-medium text-gray-700">Date Of
                            Turnover</label>
                        <input type="text" wire:model.lazy="turnover_at" placeholder="BDO"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('turnover_at')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="col-span-2  ">
                        <label for="classification"
                            class="block text-sm font-medium text-gray-700">Classification</label>
                        <select wire:model.lazy="relationship_id" autocomplete="relationship_id"
                            class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">Select one</option>
                            <option value="regular" {{ old('classification')=='regular' ? 'selected' : 'Select one' }}>
                                {{
                                'regular' }}</option>
                            <option value="vip" {{ old('classification')=='vip' ? 'selected' : 'Select one' }}>
                                {{
                                'vip' }}</option>
                            <option value="vvip" {{ old('classification')=='vvip' ? 'selected' : 'Select one' }}>
                                {{
                                'vvip' }}</option>
                        </select>
                        @error('classification')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-2">
                        <label for="account_number" class="block text-sm font-medium text-gray-700">Account
                            Number</label>
                        <input type="text" wire:model.lazy=""
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('account_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div> --}}


                </div>
            </div>
        </div>
        <div class="flex justify-end mt-10">
            <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                href="/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/bank/create">
                Skip
            </a>
            <button type="submit"
                class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                    </circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Next
            </button>
        </div>
    </div>




</form>

{{-- <form method="POST" wire:submit.prevent="submitForm()" enctype="multipart/form-data"
    action="/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/sale/{{ Str::random(8) }}/store" class="w-full"
    id="create-form">
    @csrf
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3">
            <x-label for="turnover_at">
                Date of turnover
            </x-label>
            <x-form-input wire:model="turnover_at" id="turnover_at" type="date" value="{{ old('start')}}"
                name="turnover_at" />
            @error('turnover_at')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
            <x-label for="classification">
                Classification
                </x-lab>
                <x-form-select wire:model="classification" id="classification" name="classification">
                    <option value="">Select one</option>
                    <option value="regular" {{ old('classification')=='regular' ? 'selected' : 'Select one' }}>
                        {{
                        'regular' }}</option>
                    <option value="vip" {{ old('classification')=='vip' ? 'selected' : 'Select one' }}>
                        {{
                        'vip' }}</option>
                    <option value="vvip" {{ old('classification')=='vvip' ? 'selected' : 'Select one' }}>
                        {{
                        'vvip' }}</option>
                </x-form-select>
                @error('classification')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
        </div>
    </div>
    <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="price">
                Price
            </x-label>
            <x-form-input wire:model="price" id="price" value="{{ old('price') }}" type="number" step="0.001"
                name="price" />
            @error('price')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <x-label for="status">
                Status
            </x-label>
            <x-form-select wire:model="status" id="status" name="status">
                <option value="">Select one</option>
                <option value="active" {{ old('status')=='active' ? 'selected' : 'Select one' }}>
                    {{
                    'active' }}</option>
                <option value="inactive" {{ old('status')=='inactive' ? 'selected' : 'Select one' }}>
                    {{
                    'inactive' }}</option>
            </x-form-select>
            @error('status')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="flex flex-wrap mx-3 mb-6">
        <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
            <x-label for="contract" :value="__('Contract (Please attached the signed contract here.)')" />

            <x-form-input wire:model="contract" id="grid-last-name" type="file" name="contract"
                value="{{ old('contract') }}" />

            @error('contract')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="pt-5">
        <div class="flex justify-end">
            <button type="button"
                onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/enrollee/{{ Str::random(8) }}/create'"
                class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                Skip
            </button>
            <x-form-button type="submit" wire:loading.remove wire:click="submitForm()">
                Submit
            </x-form-button>

        </div>
    </div>
</form> --}}