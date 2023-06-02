<div>
    <x-modal-component>
        <x-slot name="id">
            create-unit-modal
        </x-slot>
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST"
                action="/property/{{ Session::get('property')}}/unit/{{ Str::random(8)}}/store">
                @csrf
                <div
                    class="relative transform overflow-hidden rounded-lgpx-4 pt-5 pb-4 text-left transition-all sm:my-8 sm:w-full sm:max-w-sm sm:p-6">
                    <div>
                        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-purple-100">
                            <!-- Heroicon name: outline/check -->
                            <i class="fa-solid fa-house"></i>
                        </div>
                        <div class="mt-3 text-center sm:mt-5">
                            <h3 class="text-lg font-medium leading-6 text-gray-900" id="modal-title">Create a new unit
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">How many units you want to add to your property?</p>
                            </div>

                            <input type="number" min="1" name="number_of_units" value="1"
                                class="mt-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        </div>
                    </div>
                    <div class="mt-5 sm:mt-6">


                        <button type="submit"
                            class="inline-flex w-full justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:text-sm">
                            Confirm
                        </button>

                    </div>
                </div>
            </form>
        </div>
    </x-modal-component>
</div>