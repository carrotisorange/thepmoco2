<div>
    @include('layouts.notifications')
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Tenant Concern Form</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button type="button"
                    onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concern'"
                  >
                    View reported concerns
                </x-button>

            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div class="mb-10 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        <form wire:submit.prevent="submitForm()" enctype="multipart/form-data" method="POST"
                            class="dropzone">
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-4 gap-6">

                                        <div class="sm:col-span-6">
                                            <x-label for="subject">
                                                Subject </x-label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <x-form-input wire:model="subject" type="text" value="{{ old('subject') }}" placeholder="Statements of Account is not updated."/>
                                            </div>
                                            @error('subject')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="category_id"
                                                class="block text-sm font-medium text-gray-700">Select a category </label>

                                            <x-form-select wire:model="category_id"
                                              >
                                                <option value="">Select one</option>
                                                @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" {{ old('category_id')==$item->id?
                                                    'selected': 'Select one'}}>
                                                    {{ $item->category }}
                                                </option>
                                                @endforeach
                                            </x-form-select>
                                            @error('category_id')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="sm:col-span-3">
                                            <x-label for="unit_uuid">Select a unit
                                            </x-label>

                                            <x-form-select wire:model="unit_uuid">
                                                <option value="">Select one</option>
                                                @foreach ($units as $item)
                                                <option value="{{ $item->unit->uuid }}" {{ old('unit_uuid')==$item->
                                                    unit->uuid? 'selected': 'Select one'}}>
                                                    {{ $item->unit->unit }}
                                                </option>
                                                @endforeach
                                            </x-form-select>
                                            @error('unit_uuid')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="sm:col-span-6">
                                            <x-label for="concern" >
                                                Details of the concern</x-label>
                                            <div class="mt-1">
                                                <x-form-textarea wire:model="concern" rows="20"
                                                placeholder=""></x-form-textarea>
                                            </div>

                                            @error('concern')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-3">
                                            <x-label for="availability_date" >
                                                Date Available </x-label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <x-form-input wire:model="availability_date" type="date" value="{{ old('availability_date') }}" />
                                            </div>
                                            @error('availability_date')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-3">
                                            <x-label for="availability_time">
                                                Time Available </x-label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <x-form-input wire:model="availability_time" type="time" value="{{ old('availability_time') }}"/>
                                            </div>
                                            @error('availability_time')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-span-6">
                                            <label class="block text-sm font-medium text-gray-700"> Please attach an image of your concern

                                            </label>
                                            <div
                                                class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="image"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span>Attach a file</span>
                                                            <input id="image" type="file"
                                                                class="sr-only" wire:model="image">
                                                        </label>

                                                    </div>
                                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                                                </div>


                                            </div>
                                            @error('image')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @else
                                            @if ($image)
                                            <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                                    class="fa-solid fa-circle-check"></i></p>
                                            @endif
                                            @enderror

                                        </div>

                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                                            href="/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns/">
                                            Cancel
                                        </a>
                                        <x-button type="submit">
                                            Report
                                        </x-button>
                                    </div>
                                </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>


    </div>
</div>
