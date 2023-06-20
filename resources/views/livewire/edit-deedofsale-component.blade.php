<x-modal-component>
    <x-slot name="id">
        edit-deedofsale-modal-{{$deedofsale->uuid}}
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all  sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Edit Deed Of Sale

                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>
            <form wire:submmit.prevent="updateDeedofsale">

                <div class="mt-5 sm:mt-6">
                        <label class="text-sm" for="guardian">Turnover on</label>
                        <input type="date" id="turnover_at" wire:model="turnover_at"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                        @error('turnover_at')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="mt-5 sm:mt-6">
                    <label class="text-sm" for="guardian">Purchasing Price</label>
                    <input type="number" step="0.001" id="price" wire:model="price"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('price')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


              <div class="sm:col-span-3">
                    <label for="contract" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Contract</label>
                    @if(!$deedofsale->contract)
                    <span>No file is uploaded. </span>
                    @else
                    <a target="_blank" href="{{ asset('/storage/'.$deedofsale->contract) }}">View file</a>
                
                    @endif
                    <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                        <div class="space-y-1 text-center">
                
                            <div class="flex text-sm text-gray-600">
                                <label for="contract"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="contract" name="contract" type="file" wire:model="contract" class="sr-only">
                                </label>
                
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <p class="text-center">
                                @error('contract')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @else
                            @if($contract)
                            <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                            @endif
                            @enderror
                            </p>
                        </div>
                    </div>
                </div>

               <div class="sm:col-span-3">   
                    <label for="title" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Title</label>
                    @if(!$deedofsale->title)
                    <span>No file is uploaded. </span>
                    @else
                    <a target="_blank" href="{{ asset('/storage/'.$deedofsale->title) }}">View file</a>
                    
                    @endif
                   <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                        <div class="space-y-1 text-center">
                           
                            <div class="flex text-sm text-gray-600">
                                <label for="title"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="title" name="title" type="file" wire:model="title" class="sr-only">
                                </label>
           
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <p class="text-center">
                                @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @else
                            @if($title)
                            <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                            @endif
                            @enderror
                            </p>
                        </div>
                    </div>
                </div>
                <div class="sm:col-span-3">   
                    <label for="tax_declaration" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Tax Declaration</label>
                    @if(!$deedofsale->tax_declaration)
                    <span>No file is uploaded. </span>
                    @else
                    <a target="_blank" href="{{ asset('/storage/'.$deedofsale->tax_declaration) }}">View file</a>
                    
                    @endif
                   <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                        <div class="space-y-1 text-center">
                           
                            <div class="flex text-sm text-gray-600">
                                <label for="tax_declaration"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="tax_declaration" name="tax_declaration" type="file" wire:model="tax_declaration" class="sr-only">
                                </label>
           
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <p class="text-center">
                                @error('tax_declaration')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @else
                            @if($tax_declaration)
                            <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                            @endif
                            @enderror
                            </p>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-3">   
                    <label for="deed_of_sales" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Deeds of Sale</label>
                    @if(!$deedofsale->deed_of_sales)
                    <span>No file is uploaded. </span>
                    @else
                    <a target="_blank" href="{{ asset('/storage/'.$deedofsale->deed_of_sales) }}">View file</a>
                    
                    @endif
                   <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                        <div class="space-y-1 text-center">
                           
                            <div class="flex text-sm text-gray-600">
                                <label for="deed_of_sales"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="deed_of_sales" name="deed_of_sales" type="file" wire:model="deed_of_sales" class="sr-only">
                                </label>
           
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <p class="text-center">
                                @error('deed_of_sales')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @else
                            @if($deed_of_sales)
                            <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                            @endif
                            @enderror
                            </p>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-3">
                   
                    <label for="contract_to_sell" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Contract to Sell</label>
                    @if(!$deedofsale->contract_to_sell)
                    <span>No file is uploaded. </span>
                    @else
                    <a target="_blank" href="{{ asset('/storage/'.$deedofsale->contract_to_sell) }}">View file</a>
                    
                    @endif
                   <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                        <div class="space-y-1 text-center">
                           
                            <div class="flex text-sm text-gray-600">
                                <label for="contract_to_sell"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="contract_to_sell" name="contract_to_sell" type="file" wire:model="contract_to_sell" class="sr-only">
                                </label>
           
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <p class="text-center">
                                @error('contract_to_sell')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @else
                            @if($contract_to_sell)
                            <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                            @endif
                            @enderror
                            </p>
                        </div>
                    </div>
                </div>

                <div class="sm:col-span-3">
                   
                
                    <label for="certificate_of_membership" class="block mt-3 text-sm font-medium leading-6 text-gray-900">Certificate of Membership</label>
                    @if(!$deedofsale->certificate_of_membership)
                    <span>No file is uploaded. </span>
                    @else
                    <a target="_blank" href="{{ asset('/storage/'.$deedofsale->certificate_of_membership) }}">View file</a>
                    
                    @endif
                   <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                        <div class="space-y-1 text-center">
                           
                            <div class="flex text-sm text-gray-600">
                                <label for="certificate_of_membership"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="certificate_of_membership" name="certificate_of_membership" type="file" wire:model="certificate_of_membership" class="sr-only">
                                </label>
           
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <p class="text-center">
                                @error('certificate_of_membership')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @else
                            @if($certificate_of_membership)
                            <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                            @endif
                            @enderror
                            </p>
                        </div>
                    </div>
                </div>
                        
                {{-- <div class="mt-5 sm:mt-6">
                    <label for="certificate_of_membership"
                        class="block text-sm font-medium leading-6 text-gray-900">Certificate of Membership</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <i class="fa-solid fa-file-contract"></i>
                        @if($deedofsale->certificate_of_membership)
                        <a href="{{ asset('/storage/'.$deedofsale->certificate_of_membership) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        @else
                        <a href="#/"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">No
                            file found</a>
                        @endif

                        <input id="certificate_of_membership" type="file" class="" wire:model="certificate_of_membership">
                    </div>
                </div> --}}

                <div class="mt-5 sm:mt-6">
                    <button type="button" wire:click="updateDeedofsale"
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-modal-component>