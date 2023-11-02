<x-app-layout>
    @section('title', '| Particulars | Create | '. env('APP_NAME'))
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/properties/{{ Session::get('property_uuid') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property') }}</a></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session::get('property_uuid') }}/particulars"
                                        class="text-blue-600 hover:text-blue-700">Particulars</a></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Create</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    {{-- <x-button data-modal-toggle="small-modal">
                        New Particular
                    </x-button> --}}
                    <x-button form="create-form">Save Particular</x-button>
                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <!-- Name -->
                    <div>
                        <form action="/particular/{{ Str::random(10) }}/store" method="POST" id="create-form">
                            @csrf
                            <div>
                                <x-label for="particular_id" :value="__('Particular')" />

                                <x-input id="particular_id" class="block mt-1 w-full" type="text" name="particular_id"
                                    :value="old('particular_id')" form="create-form" required autofocus />


                              <x-validation-error-component name='particular' />

                            </div>

                            <div class="mt-5">
                                <x-label for="minimum_charge" :value="__('Mininum Charge')" />

                                <x-input id="minimum_charge" class="block mt-1 w-full" type="number" step="0.01"
                                    name="minimum_charge" :value="old('minimum_charge')" form="create-form" required
                                    autofocus />

                             <x-validation-error-component name='minimum_charge' />
                            </div>

                            <div class="mt-5">
                                <x-label for="due_date" :value="__('Due Date')" />
                                <?php $numberFormatter = new NumberFormatter('en_US', NumberFormatter::ORDINAL);?>
                                <select
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="due_date" id="due_date" form="create-form" required>
                                    <option value="">Select one</option>
                                    @for ($i = 1; $i <= 31; $i++) <option value="{{ $i }}">Every <span
                                            class="font-bold">{{ $numberFormatter->format($i)}}</span> day of the month
                                        </option>
                                        @endfor
                                </select>
                            </div>
                            <div class="mt-5">
                                <x-label for="surcharge" :value="__('Surcharge')" />

                                <x-input id="surcharge" class="block mt-1 w-full" type="number" step="0.01"
                                    name="surcharge" :value="old('surcharge')" form="create-form" required autofocus />

                            <x-validation-error-component name='surcharge' />
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Small Modal -->
    <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal md:h-full"
        id="small-modal">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                        New Particular
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="small-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="/particular/{{ Str::random(10) }}/store" method="POST" id="add-particular-form">
                        @csrf
                        <div class="mt-4">
                            <x-label for="particular" :value="__('Particular')" />
                            <x-input form="add-particular-form" id="particular" class="block mt-1 w-full" type="text"
                                name="particular" required />

                        </div>
                    </form>

                </div>
                <!-- Modal footer -->
                <div class="p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <p class="text-right">
                        <x-button form="add-particular-form">Save</x-button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
