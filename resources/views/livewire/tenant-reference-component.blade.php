{{-- <div> --}}

    <div class="p-8 bg-white border-b border-gray-200">
        <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
            <div class="bg-gray-100 mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
                <div class="md:grid md:grid-cols-1 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="grid grid-cols-2 gap-6">

                            <div class="col-span-6">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Relationship to
                                    the
                                    tenant</label>
                                <select wire:model.lazy="relationship_id" autocomplete="relationship_id"
                                    class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option value="">Select one</option>
                                    @foreach ($relationships as $relationship)
                                    <option value="{{ $relationship->id }}" {{ old('relationship_id')==$relationship->
                                        id?
                                        'selected': 'Select one'
                                        }}>{{ $relationship->relationship }}</option>
                                    @endforeach
                                </select>
                               <x-validation-error-component name='relationship_id' />
                            </div>

                            @if($relationship_id)
                            <div class="col-span-6">
                                <label for="reference" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" wire:model.lazy="reference"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                               <x-validation-error-component name='reference' />
                            </div>



                            <div class="col-span-2">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="text" wire:model.lazy="email"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                               <x-validation-error-component name='email' />
                            </div>

                            <div class="col-span-2">
                                <label for="mobile_number"
                                    class="block text-sm font-medium text-gray-700">Mobile</label>
                                <input type="text" wire:model.lazy="mobile_number"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                              <x-validation-error-component name='mobile_number' />
                            </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-10">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $tenant->uuid }}">
                        Cancel
                    </a>

                    @if($reference)
                    <x-button type="submit">
                        Submit
                    </x-button>
                    @endif
                </div>
            </div>




        </form>

    </div>
</div>
