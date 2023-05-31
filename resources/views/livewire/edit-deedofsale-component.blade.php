<x-modal-component>
    <x-slot name="id">
        edit-deedofsale-modal-{{$deedofsale->uuid}}
    </x-slot>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
            <div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Edit Unit
                        
                    </h3>
                    <div class="mt-2">

                    </div>
                </div>
            </div>
            <form wire:submmit.prevent="updateDeedofsale">
                
                <div class="mt-5 sm:mt-6">
                    <label for="contract" class="block text-sm font-medium leading-6 text-gray-900">Leasing Contract</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <i class="fa-solid fa-file-contract"></i>
                        <a href="{{ asset('/storage/'.$deedofsale->contract) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        {{-- <input id="contaa" type="file" class="" wire:model="contract"> --}}
                       
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                   <div class="mt-2 flex items-center gap-x-3">
                        <i class="fa-solid fa-file-contract"></i>
                        <a href="{{ asset('/storage/'.$deedofsale->title) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        {{-- <input id="contaa" type="file" class="" wire:model="contract"> --}}
                    
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="tax_declaration" class="block text-sm font-medium leading-6 text-gray-900">Tax Declaration</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    <i class="fa-solid fa-file-contract"></i>
                    <a href="{{ asset('/storage/'.$deedofsale->tax_declaration) }}" target="_blank"
                        class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                    {{-- <input id="contaa" type="file" class="" wire:model="contract"> --}}
                
                </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="deed_of_sales" class="block text-sm font-medium leading-6 text-gray-900">Deed of Sales</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <i class="fa-solid fa-file-contract"></i>
                        <a href="{{ asset('/storage/'.$deedofsale->deed_of_sales) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        {{-- <input id="contaa" type="file" class="" wire:model="contract"> --}}
                    
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="contract_to_sell" class="block text-sm font-medium leading-6 text-gray-900">Contract to Sell</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <i class="fa-solid fa-file-contract"></i>
                        <a href="{{ asset('/storage/'.$deedofsale->contract_to_sell) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        {{-- <input id="contaa" type="file" class="" wire:model="contract"> --}}
                    
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="certificate_of_membership" class="block text-sm font-medium leading-6 text-gray-900">Certificate of Membership</label>
                   <div class="mt-2 flex items-center gap-x-3">
                    <i class="fa-solid fa-file-contract"></i>
                    <a href="{{ asset('/storage/'.$deedofsale->certificate_of_membership) }}" target="_blank"
                        class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                    {{-- <input id="contaa" type="file" class="" wire:model="contract"> --}}
                
                </div>
                </div>

                <div class="mt-5 sm:mt-6">

                    {{-- <button type="button" wire:click="updateDeedofsale" wire:loading.remove
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        <i class="fa-solid fa-arrow-right"></i>&nbsp Update
                    </button> --}}
                    <button type="button" wire:loading wire:target="updateDeedofsale" disabled
                        class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                        Loading...
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-modal-component>