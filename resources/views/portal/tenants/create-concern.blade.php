<x-tenant-portal-layout>
    @section('title', 'Concerns')

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

                        <form action="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/concerns/store" 
                            enctype="multipart/form-data"
                            method="POST"
                            class="dropzone">
                            @csrf
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-4 gap-6">

                                        <div class="sm:col-span-6">
                                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                                Subject (required) </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input id="initial_assessment" name="initial_assessment" type="text"
                                                    value="{{ old('initial_assessment') }}"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700  rounded-md">
                                            </div>
                                            @error('initial_assessment')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="category_id"
                                                class="block text-sm font-medium text-gray-700">Category: </label>

                                            <select id="category_id" name="category_id"
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
                                            <label for="unit_uuid" class="block text-sm font-medium text-gray-700">Unit:
                                            </label>

                                            <select id="unit_uuid" name="unit_uuid"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                                <option value="">Select one</option>
                                                @foreach ($units as $item)
                                                <option value="{{ $item->unit->uuid }}" {{ old('unit_uuid')==$item->
                                                    unit->uuid? 'selected': 'Select one'}}>
                                                    {{ $item->unit->building->building }} - {{ $item->unit->unit }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('unit_uuid')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="sm:col-span-6">
                                            <label for="concern" class="block text-sm font-medium text-gray-700">
                                                Concern (required)</label>
                                            <div class="mt-1">
                                                <textarea id="concern" name="concern" rows="3"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-700 rounded-md"></textarea>
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500">Please share your concern in
                                                detail.
                                            </p>
                                            @error('concern')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="sm:col-span-6">
                                            <label class="block text-sm font-medium text-gray-700"> Upload an image
                                            </label>
                                            <div
                                                class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                <div class="space-y-1 text-center">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor"
                                                        fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <div class="flex text-sm text-gray-600">
                                                        <label for="file-upload"
                                                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                            <span>Upload a file</span>
                                                            <input id="file-upload" name="image" type="file"
                                                                class="sr-only">
                                                        </label>
                                                        
                                                    </div>
                                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Report</button>
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
</x-tenant-portal-layout>