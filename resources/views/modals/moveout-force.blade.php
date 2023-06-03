<div>
    <x-modal-component>
        <x-slot name="id">
            create-particular-modal
        </x-slot>
        <form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST" action="/property/{{ $contract->property_uuid }}/contract/{{ $contract->uuid }}/moveout/force">
            @csrf
            <h3 class="text-xl font-medium text-gray-900 dark:text-white">Force Moveout</h3>

            <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                <div class="w-full md:w-full px-3">
                    <x-label>Remarks <span class="text-red-600">*</span></x-label>

                    <x-form-textarea name="remarks" required />

                </div>
            </div>

            <div class="flex justify-end mt-5">
                <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline" href="#/"
                    wire:click="exitModal()">
                   Cancel
                </a>
                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                   
                    Force Moveout
                </button>
            </div>
        </form>
    </x-modal-component>
</div>