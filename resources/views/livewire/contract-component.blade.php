<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    <form method="POST" wire:submit.prevent="submitForm" enctype="multipart/form-data" 
                        action="/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/store"
                        class="w-full" id="create-form">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">

                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Start 
                                </label>
                                <input wire:model="start"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                id="grid-last-name" type="date" value="{{ old('start', $start)}}" name="start">

                                @error('start')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    End
                                </label>
                                <input wire:model="end"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="date" name="end" value="{{ old('end', $end )}}">

                                @error('end')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">

                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Term
                                </label>
                                <input
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" value="{{ old('term') }}" type="text" name="term">
                            </div>

                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Rent
                                </label>
                                <input wire:model="rent"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="number" value="{{ old('rent',$rent) }}" name="rent">

                                @error('rent')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Discount
                                </label>
                                <input wire:model="discount"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="number" value="{{ old('discount', $discount) }}" name="discount">

                                @error('discount')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/4 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Interaction
                                </label>
                                <select wire:model="interaction"
                                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state" name="interaction">

                                    <option value="">Select one</option>
                                    <option value="ads" {{ old('interaction')=='ads' ? 'selected' : 'Select one' }}>
                                        {{
                                        'ads' }}</option>
                                    <option value="facebook" {{ old('interaction')=='facebook' ? 'selected'
                                        : 'Select one' }}>
                                        {{
                                        'facebook' }}</option>
                                    <option value="referred" {{ old('interaction')=='referred' ? 'selected'
                                        : 'Select one' }}>
                                        {{
                                        'referred' }}</option>
                                    <option value="walk-in" {{ old('interaction')=='walk-in' ? 'selected' : 'Select one'
                                        }}>
                                        {{
                                        'walk-in' }}</option>
                                </select>

                                @error('interaction')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
                                <x-label for="photo_id"
                                    :value="__('Contract (Please attached the signed contract here.)')" />

                                <input wire:model="contract"
                                    class="appearance-none block w-full text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="file" name="photo_id" value="{{ old('photo_id') }}">

                                @error('photo_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                        <div class="mt-5">
                            <p class="text-right">
                                <x-button form="create-form">
                                    <svg wire:loading wire:target="submitForm"
                                        class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4">
                                        </circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                        </path>
                                    </svg>
                                    Submit
                                </x-button>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>