<x-modal-component>

    <x-slot name="id">
        edit-deedofsale-modal-{{$deedofsale->uuid}}
    </x-slot>
    <h1 class="text-center font-medium">Edit Deed of Sales</h1>
    <div class="p-5">
        <form wire:submmit.prevent="updateDeedofsale" class="-mt-5">

            <div class="mt-2 sm:mt-2">
                <x-label for="turnover_at">Turnover Date</x-label>
                <x-form-input type="date" wire:model="turnover_at"/>
              <x-validation-error-component name='turnover_at' />
            </div>

            <div class="mt-2 sm:mt-2">
                <x-label class="text-sm" for="price">Purchasing Price</x-label>
                <x-form-input type="number" step="0.001" wire:model="price"/>
                <x-validation-error-component name='price' />
            </div>

           <div class="mt-2 sm:col-span-3">
                <x-label>Contract</x-label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div class="flex text-sm text-gray-600">
                            <label for="contract"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                @if(!$contract)
                                <span wire:loading.remove>Upload a file</span>
                                @else
                                <span wire:loading.remove><a target="_blank" href="{{ asset('/storage/'.$deedofsale->contract) }}">View Contract</a></span>
                                @endif
                                <span wire:loading>Loading...</span>
                                <input id="contract" wire:model="contract" type="file" class="sr-only">
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($contract)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('contract')">Remove the attachment
                                        </a></span>
                                @endif
                            </label>
                        </div>
                        @error('contract')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        @if ($contract)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                        </p>
                        @endif
                    </div>
                </div>
            </div>

           <div class="mt-2 sm:col-span-3">
                <x-label>Title</x-label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div class="flex text-sm text-gray-600">
                            <label for="title"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                               @if(!$title)
                                <span wire:loading.remove>Upload a file</span>
                                @else
                                <span wire:loading.remove><a target="_blank"
                                        href="{{ asset('/storage/'.$deedofsale->title) }}">View Title</a></span>
                                @endif
                                <span wire:loading>Loading...</span>
                                <input id="title" wire:model="title" type="file" class="sr-only">
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($title)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('title')">Remove the attachment
                                        .</a></span>
                                @endif
                            </label>
                        </div>
                        @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        @if ($title)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                        </p>
                        @endif
                    </div>
                </div>
            </div>


           <div class="mt-2 sm:col-span-3">
                <x-label>Tax Declaration</x-label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div class="flex text-sm text-gray-600">
                            <label for="tax_declaration"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                               @if(!$tax_declaration)
                                <span wire:loading.remove>Upload a file</span>
                                @else
                                <span wire:loading.remove><a target="_blank" href="{{ asset('/storage/'.$deedofsale->tax_declaration) }}">View
                                        Tax Declaration</a></span>
                                @endif
                                <span wire:loading>Loading...</span>
                                <input id="tax_declaration" wire:model="tax_declaration" type="file" class="sr-only">
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($tax_declaration)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('tax_declaration')">Remove the attachment
                                        .</a></span>
                                @endif
                            </label>
                        </div>
                        @error('tax_declaration')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        @if ($tax_declaration)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                        </p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="mt-2 sm:col-span-3">
                <x-label>Deed of Sales</x-label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div class="flex text-sm text-gray-600">
                            <label for="deed_of_sales"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                @if(!$deed_of_sales)
                                <span wire:loading.remove>Upload a file</span>
                                @else
                                <span wire:loading.remove><a target="_blank" href="{{ asset('/storage/'.$deedofsale->deed_of_sales) }}">View
                                        Deed of sales</a></span>
                                @endif
                                <span wire:loading>Loading...</span>
                                <input id="deed_of_sales" wire:model="deed_of_sales" type="file" class="sr-only">
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($deed_of_sales)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('deed_of_sales')">Remove the attachment
                                        .</a></span>
                                @endif
                            </label>
                        </div>
                        @error('deed_of_sales')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        @if ($deed_of_sales)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                        </p>
                        @endif
                    </div>
                </div>
            </div>


          <div class="mt-2 sm:col-span-3">
            <x-label>Contract to Sell</x-label>
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                <div class="space-y-1 text-center">
                    <div class="flex text-sm text-gray-600">
                        <label for="contract_to_sell"
                            class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                           @if(!$contract_to_sell)
                            <span wire:loading.remove>Upload a file</span>
                            @else
                            <span wire:loading.remove><a target="_blank"
                                    href="{{ asset('/storage/'.$deedofsale->contract_to_sell) }}">View
                                    Contract to Sell</a></span>
                            @endif
                            <span wire:loading>Loading...</span>
                            <input id="contract_to_sell" wire:model="contract_to_sell" type="file" class="sr-only">
                            <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                            @if($contract_to_sell)
                            <span class="text-red-500 text-xs mt-2">
                                <a href="#/" wire:click="removeAttachment('contract_to_sell')">Remove the attachment
                                    .</a></span>
                            @endif
                        </label>
                    </div>
                    @error('contract_to_sell')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    @if ($contract_to_sell)
                    <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                    </p>
                    @endif
                </div>
            </div>
        </div>

           <div class="mt-2 sm:col-span-3">
                <x-label>Certificate of Membership</x-label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div class="flex text-sm text-gray-600">
                            <label for="certificate_of_membership"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                @if(!$certificate_of_membership)
                                <span wire:loading.remove>Upload a file</span>
                                @else
                                <span wire:loading.remove><a target="_blank"
                                        href="{{ asset('/storage/'.$deedofsale->certificate_of_membership) }}">View
                                        Certificate of Membership</a></span>
                                @endif
                                <span wire:loading>Loading...</span>
                                <input id="certificate_of_membership" wire:model="certificate_of_membership" type="file" class="sr-only">
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($certificate_of_membership)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('certificate_of_membership')">Remove the attachment
                                        .</a></span>
                                @endif
                            </label>
                        </div>
                        @error('certificate_of_membership')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        @if ($certificate_of_membership)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                        </p>
                        @endif
                    </div>
                </div>
            </div>

           <div class="mt-2 sm:col-span-3">
                <x-label>Business Permit</x-label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                    <div class="space-y-1 text-center">
                        <div class="flex text-sm text-gray-600">
                            <label for="business_permit"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                               @if(!$business_permit)
                                <span wire:loading.remove>Upload a file</span>
                                @else
                                <span wire:loading.remove><a target="_blank"
                                        href="{{ asset('/storage/'.$deedofsale->business_permit) }}">View
                                        Business Permit</a></span>
                                @endif
                                <span wire:loading>Loading...</span>
                                <input id="business_permit" wire:model="business_permit" type="file"
                                    class="sr-only">
                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                @if($business_permit)
                                <span class="text-red-500 text-xs mt-2">
                                    <a href="#/" wire:click="removeAttachment('business_permit')">Remove the attachment
                                        .</a></span>
                                @endif
                            </label>
                        </div>
                        @error('business_permit')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        @if ($business_permit)
                        <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                        </p>
                        @endif
                    </div>
                </div>
            </div>


            <div class="mt-5 sm:mt-6">
                <x-button class="w-full" type="button" wire:click="updateDeedofsale">
                    Update
                </x-button>
            </div>
        </form>
    </div>
</x-modal-component>
