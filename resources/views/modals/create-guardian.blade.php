<div id="create-guardian-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-end p-2">
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="create-guardian-modal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST"
                action="/tenant/{{ $tenant_details->uuid }}/guardian/store">
                @csrf
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Enter Guardian Information</h3>
                <div>

                    <x-label for="guardian">
                        Full Name <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-input wire:model="guardian" id="grid-first-name" type="text" name="guardian"
                        value="{{ old('guardian') }}" />

                    @error('guardian')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-label for="relationship_id">
                        Relationship <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-select wire:model="relationship_id" id="grid-state" name="relationship_id">
                        <option value="">Select one</option>
                        @foreach ($relationships as $relationship)
                        <option value="{{ $relationship->id }}" {{ old('relationship_id')==$relationship->id?
                            'selected': 'Select one'
                            }}>{{ $relationship->relationship }}</option>
                        @endforeach
                    </x-form-select>
                    @error('relationship_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-label for="email">
                        Email
                    </x-label>
                    <x-form-input wire:model="email" id="grid-last-name" type="email" name="email"
                        value="{{ old('email') }}" />

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-label for="mobile_number">
                        Mobile <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-input wire:model="mobile_number" id="grid-last-name" type="text" name="mobile_number"
                        value="{{ old('mobile_number') }}" />

                    @error('mobile_number')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <p class="text-right">
                        <x-form-button></x-form-button>
                    </p>
                </div>

            </form>
        </div>
    </div>
</div>