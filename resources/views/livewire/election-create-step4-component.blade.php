<div>
    <form wire:submit.prevent='submitForm'>
        <div class="mt-5 px-4 sm:px-6 lg:px-8">

            <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">

                <div class="py-6">

                    <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                        <div class="lg:col-span-3 mt-2 ml-5">
                            <x-label for="floor_id">Heading/Greetings </x-label>
                            <x-form-input wire:model='greetings' name="headings">
                            </x-form-input>
                           <x-validation-error-component name='greetings' />

                        </div>
                        <div class="lg:col-span-2 mt-3 ml-5">
                            <x-label for="floor_id">Elecom Rules</x-label>
                            <x-form-input wire:model='elecom_rules' name="elecom_rules">
                            </x-form-input>
                         <x-validation-error-component name='elecom_rules' />

                        </div>

                        <div class="lg:col-span-2 mt-3 ml-5">
                            <x-label for="floor_id">General Instructions</x-label>
                            <x-form-input wire:model='general_instructions' name="general_instructions">
                            </x-form-input>
                           <x-validation-error-component name='general_instructions' />

                        </div>

                        <div class="lg:col-span-2 mt-2 ml-5">
                            <div class="flex justify-between py-6">
                                <p class="">List of Running Candidates</p>

                            </div>
                        </div>


                        <div class="lg:col-span-2 ">


                            <h2 class="sr-only">Candidates</h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 space-x-0 lg:space-x-5">



                                <div class="lg:col-span-1 mt-2">
                                    <div class="bg-white">

                                        <form class="">

                                            <ul role="list"
                                                class="divide-y divide-gray-200 border-b border-t border-gray-200">
                                                <li class="flex py-6">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('/brands/user.png') }}" alt=""
                                                            class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                                    </div>

                                                    <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                                        <div>

                                                            <h4 class="text-sm">
                                                                <a href="#"
                                                                    class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                                            </h4>
                                                            <div class="flex justify-between">
                                                                <p class="text-sm font-medium text-gray-900">Position
                                                                </p>
                                                                <div class="flex items-center mb-4">
                                                                    <input id="default-checkbox" type="checkbox"
                                                                        value=""
                                                                        class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                    <label for="default-checkbox"
                                                                        class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                                </div>
                                                            </div>
                                                            <p class="mt-1 text-sm text-gray-500"># of Years as HOA
                                                                Member</p>

                                                            <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                                        </div>


                                                </li>

                                                <!-- More products... -->
                                            </ul>



                                        </form>

                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>

                </div>


            </div>

            <div class="flex justify-end mt-10">

                <x-button class="bg-red-500"
                    onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/election/{{ $election->id }}/create/step-2'">
                    Back
                </x-button>

                <x-button wire:click='submitForm'>
                    Next
                </x-button>

            </div>
    </form>
</div>
</div>
</div>
