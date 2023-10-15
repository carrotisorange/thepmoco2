<div>
    {{-- @include('layouts.notifications') --}}
    <div class="p-8 bg-white border-b border-gray-200">
        <form class="space-y-6" wire:submit.prevent="updateTotalAmountDue()" method="POST">
            <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-1 md:gap-6">
                    <div class="mt-1 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-2 gap-6">


                            <div class="col-span-2">
                                <label for="totalAmountDue" class="block text-sm font-medium text-gray-700">Amount
                                    Due</label>
                                <input type="text" wire:model="totalAmountDue"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                                @error('totalAmountDue')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-10">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="{{ url()->previous() }}">
                        Cancel
                    </a>


                    <x-button type="submit">
                        Update and Unbill
                    </x-button>

                </div>
            </div>




        </form>

    </div>
</div>
