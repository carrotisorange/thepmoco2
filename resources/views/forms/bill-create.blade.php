<form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="post"
    action="/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/bill/store">
    @csrf

    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Bill Information</h3>
    <div>
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">

            <div class="w-full md:w-full px-3">
                <x-label for="particular_id">
                    Select a particular
                </x-label>
                <x-form-select wire:model="particular_id" id="particular_id" name="particular_id">
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
        </div>

        <div class="mt-5 flex flex-wrap -mx-3 mb-6">

            <div class="w-full md:w-full px-3">
                <x-label for="particular_id">
                    Unit
                </x-label>
                <x-form-select wire:model="unit_uuid" id="unit_uuid" name="unit_uuid">

                    @foreach ($units as $unit)
                    @if($units->count() == 1)
                    <option value="{{ $unit->unit->uuid }}" {{ old('unit_uuid')==$unit->unit->uuid?
                        'selected': 'Select one'
                        }}>{{ $unit->unit->building->building.' '.$unit->unit->unit }}</option>
                    @else

                    <option value="{{ $unit->unit->uuid }}" {{ old('unit_uuid')==$unit->unit->uuid?
                        'selected': 'Select one'
                        }}>{{ $unit->unit->building->building.' '.$unit->unit->unit }}</option>
                    @endif
                    @endforeach
                </x-form-select>

                @error('unit_uuid')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <x-label>Period Covered</x-label>
        <div class="mt-5 flex flex-wrap -mx-3 mb-6">

            <div class="w-full md:w-1/2 px-3">
                <x-label for="start">
                    Start
                </x-label>
                <x-form-input wire:model="start" id="grid-last-name" type="date"
                    value="{{ old('start', Carbon\Carbon::now()->startOfMonth()->format('Y-m-d')) }}" name="start" />

                @error('start')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <x-label for="end">
                    End
                </x-label>
                <x-form-input wire:model="end" id="grid-last-name" type="date"
                    value="{{ old('end', Carbon\Carbon::now()->addMonth()->endOfMonth()->format('Y-m-d')) }}"
                    name="end" />

                @error('end')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


        </div>

        <div class="mt-5 flex flex-wrap -mx-3 mb-6">

            <div class="w-full md:w-full px-3">
                <x-label for="bill">
                    Amount
                </x-label>
                <x-form-input wire:model="bill" id="grid-last-name" type="number" step="0.001" value="{{ old('bill') }}"
                    name="bill" min="0" />

                @error('bill')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-form-button>Create</x-form-button>
            </p>
        </div>
</form>

</div>
</form>