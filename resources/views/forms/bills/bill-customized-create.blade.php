<form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST"
    action="/property/{{ Session::get('property') }}/bill/customized/{{ $active_contracts->count() }}/store">
    @csrf
    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Configure your customized bills</h3>
    <p class="text-sm font-medium text-gray-900 dark:text-white">You're about to create <b class="font-bold text-lg text-red-500">{{
            $active_contracts->count() }}</b> bills for <b class="font-bold text-lg text-red-500">{{ $active_tenants->count('tenant_uuid') }}</b>
        active tenants <b class="font-bold text-lg text-red-500">ONLY.</b> You may still modify these bills when you click <b>CONFIRM</b>.`
    </p>
    <div class="mt-5">
        <x-label for="particular_id">
            Select a particular<span class="text-red-600">*</span>
        </x-label>

        <x-form-select name="particular_id" id="particular_id">
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
                <x-form-input id="start" type="date" value="{{ old('start', Carbon\Carbon::now()->format('Y-m-d')) }}"
                    name="start" />

                @error('start')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <x-label for="end">
                    End
                </x-label>
                <x-form-input id="end" type="date" name="end"
                    value="{{ old('end', Carbon\Carbon::now()->addMonth()->format('Y-m-d')) }}" />

                @error('end')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="mt-5">
        <x-label for="due_date">
            Amount<span class="text-sm">(Optional)</span>
        </x-label>
        <x-form-input id="bill" type="number" name="bill" value="{{ old('bill', 0) }}" required />
        @error('bill')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror
    </div>
    <p class="text-right">
        <x-button>
            Confirm
        </x-button>
    </p>
</form>