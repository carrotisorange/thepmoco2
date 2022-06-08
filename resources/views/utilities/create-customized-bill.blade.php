<div id="create-customized-bill-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-lg h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-end p-2">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="create-customized-bill-modal">
                    <svg class=" w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST"
                action="/bill/{{ Session::get('property') }}/store/{{ $active_contracts->count() }}/customized">
                @csrf

                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Configure your customized bills</h3>

                <p class="text-sm font-medium text-gray-900 dark:text-white">You're about to create <b>{{
                        $active_contracts->count() }}</b> bills for <b>{{ $active_tenants->count('tenant_uuid') }}</b>
                    active tenants. You may still modify these bills when you click <b>CONFIRM</b>.`
                </p>


                <div class="mt-5">

                    <x-label for="particular_id">
                        Select a particular<span class="text-red-600">*</span>
                    </x-label>

                    <x-form-select wire:model="particular_id" name="particular_id" id="particular_id">
                        <option value="">Select one</option>
                        @foreach ($particulars as $particular)
                        <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->
                            particular_id?
                            'selected': 'Select one'
                            }}>{{ $particular->particular }}</option>
                        @endforeach
                    </x-form-select>

                    @error('particular_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mt-5">
                    <x-label for="">
                        Period Covered<span class="text-red-600">*</span>
                    </x-label>
                    <div class="flex flex-wrap mb-6">

                        <div class="w-full md:w-1/2">
                            <x-label for="start">
                                Start 
                            </x-label>
                            <x-form-input wire:model="start" id="start" type="date"
                                value="{{ old('start', Carbon\Carbon::now()->format('Y-m-d')) }}" name="start" />

                            @error('start')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <x-label for="end">
                                End 
                            </x-label>
                            <x-form-input wire:model="end" id="end" type="date" name="end"
                                value="{{ old('end', Carbon\Carbon::now()->addMonth()->format('Y-m-d')) }}" />

                            @error('end')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
          
                </div>

                {{-- <div class="mt-5">
                    <x-label for="due_date">
                        Due Date 
                    </x-label>
                    <x-form-input wire:model="due_date" id="start" type="date" name="due_date"
                        value="{{ old('due_date') }}" />

                    @error('due_date')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div> --}}

                <div class="mt-5">
                    <x-label for="due_date">
                        Amount<span class="text-red-600">*</span>
                    </x-label>
                    <x-form-input wire:model="bill" id="bill" type="number" name="bill" value="{{ old('bill') }}" />

                    @error('bill')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <p class="text-right">
                    <x-button>
                        <i class="fa-solid fa-circle-check"></i>&nbsp Confirm
                    </x-button>
                </p>

            </form>
        </div>
    </div>
</div>