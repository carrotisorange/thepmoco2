<form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST" action="/biller/store">
    @csrf
    <h3 class="text-xl font-medium text-gray-900 dark:text-white">Biller Information</h3>

    <div class="mt-5 flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-full px-3">
            <x-label>Biller <span class="text-red-600">*</span></x-label>
            <x-form-input id="biller" type="text" name="biller" required />

            @error('biller')
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