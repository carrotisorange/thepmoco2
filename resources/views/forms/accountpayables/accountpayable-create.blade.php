<form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
    <div class=" px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-6 md:gap-6">
            <div class="sm:col-span-3">
                <label for="request_for" class="block text-sm font-medium text-gray-700">Request for:
                </label>

                <select wire:model="request_for"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    <option value="">Select one</option>
                    <option>Payment</option>
                    <option>Purchase</option>
                    <option>Fund Transfer</option>
                    <option>Refund</option>
                </select>
                @error('request_for')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>

            <div class="sm:col-span-3">
                <label for="particular_id" class="block text-sm font-medium text-gray-700">Particular:</label>

                <select wire:model="particular_id"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    <option value="">Select one</option>
                    @foreach ($particulars as $particular)
                    <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->
                        particular_id?'selected': 'Select one'}}>
                        {{ $particular->particular }}
                    </option>
                    @endforeach
                </select>
                @error('particular_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>



            <div class="sm:col-span-3">
                <label for="requester_id" class="block text-sm font-medium text-gray-700">Requester's
                    Name:</label>
                <div class="mt-1">
                    <select wire:model="requester_id" disabled
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                        <option value="">Select one</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->user->id }}" {{ old('requester_id')==$user->
                            user->id?'selected': 'Select one'}}>
                            {{ $user->user->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('requester_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                {{-- <a href="newunits_detail" class="text-sm text-purple-700">Add Requester</a> --}}
            </div>


            <div class="sm:col-span-3">
                <label for="biller_id" class="block text-sm font-medium text-gray-700">Pay to: (Biller's
                    Name)</label>
                <div class="mt-1">
                    <select wire:model="biller_id"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                        <option value="">Select one</option>
                        @foreach ($billers as $biller)
                        <option value="{{ $biller->id }}" {{ old('biller_id')==$biller->id?'selected': 'Select one'}}>
                            {{ $biller->biller }}
                        </option>
                        @endforeach
                    </select>
                    @error('biller_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="sm:col-span-3">
                <label for="amount" class="block text-sm font-medium text-gray-700">Amount
                    Requested:</label>
                <div class="mt-1">
                    <textarea wire:model="amount" rows="3"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                        {{old('amount') }}
                    </textarea>
                    @error('amount')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="sm:col-span-3">
                <label for="source" class="block text-sm font-medium text-gray-700">Source of
                    Fund:</label>
                <div class="mt-1">
                    <textarea wire:model="source" rows="3"
                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                        {{ old('source') }}
                    </textarea>
                    @error('source')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            </div>



            <div class="sm:col-span-6">

                <label class="block text-sm font-medium text-gray-700"> Upload Bills/Quotation </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">

                        <div class="flex text-sm text-gray-600">
                            <label for="attachment"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input id="attachment" wire:model="attachment" type="file" class="sr-only">
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($attachment)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment()">Remove the attachment .</a></span>
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



            <div class="mt-3 sm:col-span-6">
                {{-- <div class="form-check">
                    <input wire:model="sendEmailToManager"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="checkbox" value="{{ old('sendEmailToManager'), $sendEmailToManager }}"
                        id="flexCheckChecked">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckChecked">
                        Send request details to the manager.
                    </label>
                </div> --}}
            </div>


        </div>
        <div class="flex justify-end">
            <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/rfp'">
                    Cancel
                </x-button>

            <x-button type="submit">
                Create
            </x-button>
        </div>
</form>
