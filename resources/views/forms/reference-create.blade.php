<form class="space-y-6" wire:submit.prevent="submitForm()">
    <div class="mt-1 px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-6">
                        <x-label for="last-name">What's the relationship
                            of the reference to the tenant?</x-label>
                        <x-form-select wire:model="relationship_id" autocomplete="relationship_id">
                            <option value="">Select one</option>
                            @foreach ($relationships as $relationship)
                            <option value="{{ $relationship->id }}" {{ old('relationship_id')==$relationship->id? 'selected': 'Select one'}}>{{ $relationship->relationship }}</option>
                            @endforeach
                        </x-form-select>
                      <x-validation-error-component name='relationshipid' />
                    </div>

                    @if($relationship_id)
                    <div class="col-span-6">
                        <x-label for="reference" >Full Name</x-label>
                        <x-form-input type="text" wire:model="reference" />
                        <x-validation-error-component name='reference' />
                    </div>

                    <div class="col-span-2">
                        <x-label for="email" >Email</x-label>
                        <x-form-input type="text" wire:model="email" />
                        <x-validation-error-component name='email' />
                    </div>

                    <div class="col-span-2">
                        <x-label for="mobile_number" >Mobile</x-label>
                        <x-form-input type="text" wire:model="mobile_number" />
                        <x-validation-error-component name='mobile_number' />
                    </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="flex justify-end mt-10">
            <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/create">
                Skip
            </a>

           <x-button type="submit">
                Next
            </x-button>
        </div>
    </div>




</form>
