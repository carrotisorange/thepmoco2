<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div>
                    <form method="POST" wire:submit.prevent="submitForm" enctype="multipart/form-data"
                        action="/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/sale/{{ Str::random(8) }}/store"
                        class="w-full" id="create-form">
                        @csrf
                        <div class="flex flex-wrap mx-3 mb-6">

                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="turnover_at">
                                    Date of turnover
                                </label>
                                <input wire:model="turnover_at"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="turnover_at" type="date" value="{{ old('start')}}" name="turnover_at">

                                @error('turnover_at')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="classification">
                                    Classification
                                </label>
                                <select wire:model="classification"
                                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="classification" name="classification">

                                    <option value="">Select one</option>
                                    <option value="regular" {{ old('classification')=='regular' ? 'selected'
                                        : 'Select one' }}>
                                        {{
                                        'regular' }}</option>
                                    <option value="vip" {{ old('classification')=='vip' ? 'selected' : 'Select one' }}>
                                        {{
                                        'vip' }}</option>
                                    <option value="vvip" {{ old('classification')=='vvip' ? 'selected' : 'Select one'
                                        }}>
                                        {{
                                        'vvip' }}</option>
                                </select>

                                @error('classification')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="price">
                                    Price
                                </label>
                                <input wire:model="price"
                                    class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="price" value="{{ old('price') }}" type="number" step="0.001" name="price">

                                @error('price')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="status">
                                    Status
                                </label>
                                <select wire:model="status"
                                    class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="status" name="status">
                                    <option value="">Select one</option>
                                    <option value="active" {{ old('status')=='active' ? 'selected' : 'Select one' }}>
                                        {{
                                        'active' }}</option>
                                    <option value="inactive" {{ old('status')=='inactive' ? 'selected' : 'Select one'
                                        }}>
                                        {{
                                        'inactive' }}</option>
                                </select>

                                @error('status')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>

                        <div class="flex flex-wrap mx-3 mb-6">
                            <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
                                <x-label for="contract"
                                    :value="__('Contract (Please attached the signed contract here.)')" />

                                <input wire:model="contract"
                                    class="appearance-none block w-full text-gray-700 border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-last-name" type="file" name="contract" value="{{ old('contract') }}">

                                @error('contract')
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