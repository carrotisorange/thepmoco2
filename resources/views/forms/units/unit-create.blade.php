<form method="POST" action="/unit/{{ $batch_no }}/store">
    @csrf
    <div clas="">
        <x-label for="number_of_units" :value="__('How many units you want to create?')" />

        <x-input id="number_of_units" class="block mt-1 w-full" type="number" min="1" name="number_of_units"
            :value="old('number_of_units', 1)" autofocus />

        @error('number_of_units')
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
        @enderror

        <x-button class="mt-2">
            <p class="text-right">{{ __('Submit') }}</p>
        </x-button>
    </div>
</form>