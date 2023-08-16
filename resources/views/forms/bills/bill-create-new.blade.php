<form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" wire:submit.prevent="submitForm()" method="POST">
    <div class="sm:col-span-6">
        <label for="particular_id" class="block text-sm font-medium text-gray-700">Select a bill
            particular</label>
        <select wire:model="particular_id"
            class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
            <option value="">Select one</option>
            @foreach ($particulars as $particular)
            <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->
                particular_id?
                'selected': 'Select one'
                }}>{{ $particular->particular }}</option>
            @endforeach
        </select>
        @error('particular_id')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

    </div>

    @if($particular_id)
    <x-label>Period Covered</x-label>
    <div class="mt-5 flex flex-wrap -mx-3 mb-6">

        <div class="w-full md:w-1/2 px-3">
            <x-label for="start">
                Start
            </x-label>
            <x-form-input wire:model="start" type="date"
                value="{{ old('start', Carbon\Carbon::now()->startOfMonth()->format('Y-m-d')) }}" name="start" />

            @error('start')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
            <x-label for="end">
                End
            </x-label>
            <x-form-input wire:model="end" type="date"
                value="{{ old('end', Carbon\Carbon::now()->addMonth()->endOfMonth()->format('Y-m-d')) }}" name="end" />

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
            <x-form-input wire:model="bill" type="number" step="0.001" value="{{ old('bill') }}" min="0" />

            @error('bill')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>
    @endif

    <div class="flex justify-end mt-2">

        <button type="button"
            onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant->uuid }}'"
            class="ml-3 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Skip
        </button>
        @if($particular_id)
        <button type="submit"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">


            Create
        </button>
        @endif
    </div>
</form>