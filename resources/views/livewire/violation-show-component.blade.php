<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button data-modal-toggle="violation-create-component">New violation </x-button>
            </div>
        </div>
        <div class="mt-3">
           <form wire:submit.prevent="update">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-6">
                               <x-label>Unit</x-label>
                                <div class="mt-2">
                                     <x-form-select name="unit_uuid" wire:model="unit_uuid">
                                        <option value="{{ $unit_uuid }}" {{ old('unit_uuid')==$unit_uuid ? 'selected' : 'Select one'}}> {{ App\Models\Unit::where('uuid',$unit_uuid)->value('unit') }} </option>
                                    </x-form-select>
                                </div>
                                <x-validation-error-component name="unit_uuid"></x-validation-error-component>
                            </div>

                            <div class="sm:col-span-3">
                                <x-label>Tenant</x-label>
                                <div class="mt-2">
                                    <x-form-select name="unit_uuid" wire:model="unit_uuid">
                                        <option value="{{ $tenant_uuid }}" {{ old('tenant_uuid')==$tenant_uuid ? 'selected' : 'Select one'}}> {{ App\Models\Tenant::where('uuid',$tenant_uuid)->value('tenant') }} </option>
                                    </x-form-select>
                                </div>
                                <x-validation-error-component name="tenant_uuid"></x-validation-error-component>

                            </div>
                            <div class="sm:col-span-3">
                                <x-label>Owner</x-label>
                                <div class="mt-2">
                                    <x-form-select name="owner_uuid" wire:model="owner_uuid">
                                        <option value="{{ $owner_uuid }}" {{ old('owner_uuid')==$owner_uuid ? 'selected' : 'Select one'}}> {{ App\Models\Owner::where('uuid',$owner_uuid)->value('owner') }} </option>
                                    </x-form-select>
                                </div>
                                <x-validation-error-component name="owner_uuid"></x-validation-error-component>

                            </div>


                         <div class="sm:col-span-3">
                            <x-label>Violation</x-label>
                            <div class="mt-2">
                                <x-form-input wire:model="violation"></x-form-input>
                            </div>
                            <x-validation-error-component name="violation"></x-validation-error-component>
                        </div>

                        <div class="sm:col-span-3">
                            <x-label>Category</x-label>
                            <div class="mt-2">
                         <x-form-select name="type_id" wire:model="type_id">
                                @foreach ($types as $type)
                                <option value="{{ $type->id }}">{{ $type->type }}</option>
                                @endforeach
                            </x-form-select>
                            </div>
                            <x-validation-error-component name="type_id"></x-validation-error-component>
                        </div>

                        <div class="sm:col-span-6">
                            <x-label>Details</x-label>
                            <div class="mt-2">
                                <x-form-textarea wire:model="details"></x-form-textarea>
                            </div>
                            <x-validation-error-component name="details"></x-validation-error-component>
                        </div>

                        <div class="sm:col-span-6">
                                <x-label>Image</x-label>
                                <div class="mt-2">
                                  <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-purple-600 hover:text-purple-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-purple-500">
                                                {{-- <span wire:loading.remove>Upload a file</span> --}}

                                                <span wire:loading>Loading...</span>
                                                <input id="image" wire:model="image" type="file" class="sr-only">
                                                <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                                @if($image)
                                                <span class="text-blue-500 text-xs mt-2">
                                                    <a target="_blank" href="{{ asset('/storage/'.$violation_details->image) }}" >View the attachment
                                                    </a></span>
                                                    <br>
                                                    {{-- <span class="text-red-500 text-xs mt-2">
                                                        <a href="#/" wire:click="removeAttachment()">Remove the attachment
                                                        </a></span> --}}
                                                @endif
                                            </label>
                                        </div>
                                        @error('image')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                        @if ($image)
                                        {{-- <p class="text-green-500 text-xs mt-2">File has been attached. <i class="fa-solid fa-circle-check"></i>
                                        </p> --}}
                                        @endif
                                    </div>
                                </div>
                                </div>
                                <x-validation-error-component name="image"></x-validation-error-component>
                            </div>


                        </div>
                    </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/violation'" class="bg-red-500">
                        Cancel
                    </x-button>
                    <x-button type="submit">Update</x-button>
                </div>
            </form>
        </div>
    </div>
@livewire('violation-create-component')
</div>
