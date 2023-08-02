<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">Tenant Concern Form</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button"
                    onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    View reported concerns
                </button>

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
                                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                                Subject </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input wire:model="subject" type="text" value="{{ old('subject') }}" placeholder="Statements of Account is not updated."
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700  rounded-md">
                                            </div>
                                            @error('subject')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="category_id"
                                                class="block text-sm font-medium text-gray-700">Select a category </label>

                                            <select wire:model="category_id"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                                <option value="">Select one</option>
                                                @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" {{ old('category_id')==$item->id?
                                                    'selected': 'Select one'}}>
                                                    {{ $item->category }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="sm:col-span-3">
                                            <label for="unit_uuid" class="block text-sm font-medium text-gray-700">Select a unit
                                            </label>

                                            <select wire:model="unit_uuid"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                                <option value="">Select one</option>
                                                @foreach ($units as $item)
                                                <option value="{{ $item->unit->uuid }}" {{ old('unit_uuid')==$item->
                                                    unit->uuid? 'selected': 'Select one'}}>
                                                    {{ $item->unit->unit }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('unit_uuid')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="sm:col-span-6">
                                            <label for="concern" class="block text-sm font-medium text-gray-700">
                                                Details of the concern</label>
                                            <div class="mt-1">
                                                <textarea wire:model="concern" rows="3" 
                                                placeholder="I am writing to bring to your attention a concern regarding my recent bill. I received my billing statement on {{ Carbon\Carbon::now()->format('M d, Y') }}, and after reviewing it thoroughly, I noticed some discrepancies that I believe require clarification and resolution. 
                                                The details of the issue are as follows:"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-700 rounded-md"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Please share your concern in
                                                detail.
                                            </p>
                                            @error('concern')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="availability_date" class="block text-sm font-medium text-gray-700">
                                                Date Available </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input wire:model="availability_date" type="date" value="{{ old('availability_date') }}"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700  rounded-md">
                                            </div>
                                            @error('availability_date')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="availability_time" class="block text-sm font-medium text-gray-700">
                                                Time Available </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input wire:model="availability_time" type="time" value="{{ old('availability_time') }}"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700  rounded-md">
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
                                        <button type="submit"
                                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                           
                                            Report
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>

                    {{-- <button type="button"
                        class="mb-5 inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-30">Select
                        All</button> --}}
                </div>
            </div>
        </div>

        {{-- <div class="px-4 mt-5 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
            {{ $collections->links() }}
        </div> --}}
    </div>
</div>