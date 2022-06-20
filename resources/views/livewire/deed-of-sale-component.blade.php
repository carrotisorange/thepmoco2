<div class="p-8 px-12 bg-white border-b border-gray-200">
    <form method="POST" wire:submit.prevent="submitForm" enctype="multipart/form-data"
        action="/unit/{{ $unit->uuid }}/owner/{{ $owner->uuid }}/sale/{{ Str::random(8) }}/store" class="w-full"
        id="create-form">
        @csrf
        <div class="flex flex-wrap mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3">
                <x-label for="turnover_at">
                    Date of turnover
                </x-label>
                <x-form-input wire:model="turnover_at" id="turnover_at" type="date" value="{{ old('start')}}"
                    name="turnover_at" />

                @error('turnover_at')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <x-label for="classification">
                    Classification
                    </x-lab>
                    <x-form-select wire:model="classification" id="classification" name="classification">

                        <option value="">Select one</option>
                        <option value="regular" {{ old('classification')=='regular' ? 'selected' : 'Select one' }}>
                            {{
                            'regular' }}</option>
                        <option value="vip" {{ old('classification')=='vip' ? 'selected' : 'Select one' }}>
                            {{
                            'vip' }}</option>
                        <option value="vvip" {{ old('classification')=='vvip' ? 'selected' : 'Select one' }}>
                            {{
                            'vvip' }}</option>
                    </x-form-select>

                    @error('classification')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
            </div>

        </div>

        <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <x-label for="price">
                    Price
                </x-label>
                <x-form-input wire:model="price" id="price" value="{{ old('price') }}" type="number" step="0.001"
                    name="price" />

                @error('price')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <x-label for="status">
                    Status
                </x-label>
                <x-form-select wire:model="status" id="status" name="status">
                    <option value="">Select one</option>
                    <option value="active" {{ old('status')=='active' ? 'selected' : 'Select one' }}>
                        {{
                        'active' }}</option>
                    <option value="inactive" {{ old('status')=='inactive' ? 'selected' : 'Select one' }}>
                        {{
                        'inactive' }}</option>
                </x-form-select>

                @error('status')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


        </div>

        <div class="flex flex-wrap mx-3 mb-6">
            <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
                <x-label for="contract" :value="__('Contract (Please attached the signed contract here.)')" />

                <x-form-input wire:model="contract" id="grid-last-name" type="file" name="contract"
                    value="{{ old('contract') }}" />

                @error('contract')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-5">
            <p class="text-right">
                <x-form-button>
                    Create
                </x-form-button>
            </p>
        </div>
    </form>
</div>