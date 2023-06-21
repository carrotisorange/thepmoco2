<x-modal-component>
    <x-slot name="id">
        edit-deedofsale-modal-{{$deedofsale->uuid}}
    </x-slot>
   <h1 class="text-center font-medium">Edit Deed of Sales</h1>
    <div class="p-5">
            <form wire:submmit.prevent="updateDeedofsale" class="-mt-5">

                <div class="mt-2 sm:mt-2">
                        <label class="text-sm" for="guardian">Turnover on</label>
                        <input type="date" id="turnover_at" wire:model="turnover_at"
                            class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required>
                        @error('turnover_at')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                <div class="mt-2 sm:mt-2">
                    <label class="text-sm" for="guardian">Purchasing Price</label>
                    <input type="number" step="0.001" id="price" wire:model="price"
                        class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('price')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

            
                <div class="mt-2 sm:mt-2">
                    <label for="contract" class="block text-sm font-medium leading-6 text-gray-900">Leasing
                        Contract</label>
                    <div class="flex justify-center items-center gap-x-3 ">
                        <i class="fa-solid fa-file-contract"></i>
                        @if($deedofsale->contract)
                        <a href="{{ asset('/storage/'.$deedofsale->contract) }}" target="_blank"
                            class="rounded-md px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">View</a>
                        @else
                        <a href="#/"
                            class="rounded-md px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">No
                            file found</a>
                        @endif

                        <input id="contract" type="file" class="" wire:model="contract">

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
                            class="rounded-md bg-purple-500 px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-purple-500">No
                            file found</a>
                        @endif

                        <input id="title" type="file" class="" wire:model="title">
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="tax_declaration" class="block text-sm font-medium leading-6 text-gray-900">Tax
                        Declaration</label>
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

                        <input id="tax_declaration" type="file" class="" wire:model="tax_declaration">
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="deed_of_sales" class="block text-sm font-medium leading-6 text-gray-900">Deed of
                        Sales</label>
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
                        
                        <input id="deed_of_sales" type="file" class="" wire:model="deed_of_sales">
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="contract_to_sell" class="block text-sm font-medium leading-6 text-gray-900">Contract to
                        Sell</label>
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

                        <input id="contract_to_sell" type="file" class="" wire:model="contract_to_sell">
                    </div>
                </div>

                <div class="mt-5 sm:mt-6">
                    <label for="certificate_of_membership"
                        class="block text-sm font-medium leading-6 text-gray-900">Certificate of Membership</label>
                    <div class="flex justify-center items-center gap-x-3 ">
                        <i class="fa-solid fa-file-contract"></i>
                        @if($deedofsale->certificate_of_membership)
                        <a href="{{ asset('/storage/'.$deedofsale->certificate_of_membership) }}" target="_blank"
                            class="rounded-md px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">View</a>
                        @else
                        <a href="#/"
                            class="rounded-md px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300">No
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
</x-modal-component>