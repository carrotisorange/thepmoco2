<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">{{ $unit->unit }} / Unit Concern Form</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                {{-- <button type="button"
                    onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    View reported concerns
                </button> --}}

            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div class="mb-10 relative overflow-hidden ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        <form wire:submit.prevent="submitForm()" enctype="multipart/form-data" method="POST"
                            class="dropzone">
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-4 gap-6">

                                        <div class="sm:col-span-2">
                                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                                Subject (required) </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input wire:model="subject" type="text" value="{{ old('subject') }}"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700  rounded-md">
                                            </div>
                                            @error('subject')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-3">
                                            <label for="category_id"
                                                class="block text-sm font-medium text-gray-700">Category: </label>

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


                                        <div class="sm:col-span-6">
                                            <label for="concern" class="block text-sm font-medium text-gray-700">
                                                Concern (required)</label>
                                            <div class="mt-1">
                                                <textarea wire:model="concern" rows="3"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-700 rounded-md"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Please share your concern in
                                                detail.
                                            </p>
                                            @error('concern')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="col-span-6">
                                            <label class="block text-sm font-medium text-gray-700"> Please attach an image of the concern
                                            </label>
                                            <div
                                                class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">

                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="image"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span>Attach a file</span>
                                                            <input id="image" type="file" class="sr-only"
                                                                wire:model="image">
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
                                    <div class="px-4 py-3 text-right sm:px-6">
                                        <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                                            href="{{ url()->previous() }}">
                                            Cancel
                                        </a>
                                        <button type="submit"
                                            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                                            <svg wire:loading wire:target="submitForm"
                                                class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4">
                                                </circle>
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                </path>
                                            </svg>
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