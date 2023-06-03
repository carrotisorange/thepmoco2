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
                        @if($deedofsale->contract)
                        <a href="{{ asset('/storage/'.$deedofsale->contract) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        @else
                            <a href="#/"
                                class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">No file found</a>
                        @endif
                     
                        {{-- <input id="contaa" type="file" class="" wire:model="contract"> --}}
                       
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                   <div class="mt-2 flex items-center gap-x-3">
                        <i class="fa-solid fa-file-contract"></i>
                    @if($deedofsale->title)
                        <a href="{{ asset('/storage/'.$deedofsale->title) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        @else
                            <a href="#/"
                                class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">No file found</a>
                        @endif
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="tax_declaration" class="block text-sm font-medium leading-6 text-gray-900">Tax Declaration</label>
                  <div class="mt-2 flex items-center gap-x-3">
                    <i class="fa-solid fa-file-contract"></i>
                    @if($deedofsale->tax_declaration)
                        <a href="{{ asset('/storage/'.$deedofsale->tax_declaration) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        @else
                        <a href="#/"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">No
                            file found</a>
                        @endif
                </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="deed_of_sales" class="block text-sm font-medium leading-6 text-gray-900">Deed of Sales</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <i class="fa-solid fa-file-contract"></i>
                        @if($deedofsale->deed_of_sales)
                        <a href="{{ asset('/storage/'.$deedofsale->deed_of_sales) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        @else
                        <a href="#/"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">No
                            file found</a>
                        @endif
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="contract_to_sell" class="block text-sm font-medium leading-6 text-gray-900">Contract to Sell</label>
                    <div class="mt-2 flex items-center gap-x-3">
                        <i class="fa-solid fa-file-contract"></i>
                       @if($deedofsale->contract_to_sell)
                        <a href="{{ asset('/storage/'.$deedofsale->contract_to_sell) }}" target="_blank"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">View</a>
                        @else
                        <a href="#/"
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">No
                            file found</a>
                        @endif
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="certificate_of_membership" class="block text-sm font-medium leading-6 text-gray-900">Certificate of Membership</label>
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
                </div>
                </div>

                <div class="mt-5 sm:mt-6">
                  
                </div>
            </form>
        </div>
    </div>
</x-modal-component>