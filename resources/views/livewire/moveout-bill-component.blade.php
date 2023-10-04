<div>
    @include('layouts.notifications')
    <form method="POST" wire:submit.prevent="submitForm" action="/contract/{{ $contract->uuid }}/moveout" class="w-full"
        id="create-form">
        @csrf

        <div class="flex flex-wrap -mx-3 mb-6">

            <div class="w-full md:w-1/4 px-3">
                <x-label for="particular_id">
                    Particular
                </x-label>
                <x-form-select wire:model="particular_id"
                  id="particular_id" name="particular_id">
                    <option value="">Select one</option>
                    @foreach ($particulars as $particular)
                    <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->id?
                        'selected': 'Select one'
                        }}>{{ $particular->particular }}</option>
                    @endforeach
                </x-form-select>

                @error('particular_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full md:w-1/4 px-3">
                <x-label for="bill">
                    Amount
                </x-label>
                <x-form-input wire:model="bill"
                    id="grid-last-name" type="number" value="{{ old('bill') }}" name="bill" min="0" />

                @error('bill')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="w-full md:w-1/4 px-3">
                <x-label for="start">
                    Period covered (start)
                </x-label>
                <x-form-input wire:model="start"
                   id="grid-last-name" type="date" value="{{ old('start',$start) }}" name="start" />

                @error('start')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/4 px-3">
                <x-label for="end">
                    Period covered (end)
                </x-label>
                <x-form-input wire:model="end"
                    id="grid-last-name" type="date" value="{{ old('end',$end) }}" name="end" />

                @error('end')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


        </div>
        <div class="mt-5">
            <p class="text-right">
        
                <x-button type="submit"></x-button>
            </p>
        </div>
    </form>

</div>