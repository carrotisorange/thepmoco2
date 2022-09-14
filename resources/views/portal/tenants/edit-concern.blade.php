<x-tenant-portal-layout>
    @section('title', 'Concerns')

<div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/concerns">
                                <img class="h-5 w-auto" src="{{ asset('/brands/back-button.png') }}">
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="mt-5 sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700">Concern # {{ $concern->reference_no }}</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    @if(!$concern->image == null)
                    <button type="button"
                        onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns/{{ $concern->id }}/download'"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        View Attachment
                    </button>
                    @endif
                    <button type="button"
                        onclick="window.location.href='/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns'"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        View reported concerns
                    </button>
            
                </div>
            </div>
            {{-- <a href="#" class="flex justify-end text-sm font-medium text-purple-500 hover:text-purple-700">Reported
                on {{ Carbon\Carbon::parse($concern->created_at)->format('M d, Y') }}</a> --}}

            <div>
                <div class="flex justify-center mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                    <div class="mt-5 md:mt-0 md:col-span-6">
                        {{-- <form
                            action="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/concerns/store"
                            method="POST">
                            @csrf --}}
                            <div class="shadow sm:rounded-md sm:overflow-hidden">
                                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                    <div class="grid grid-cols-4 gap-6">
                                        <div class="sm:col-span-6">
                                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                                Subject </label>
                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                <input id="initial_assessment" name="initial_assessment" type="text"
                                                    value="{{ $concern->initial_assessment }}"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700  rounded-md">
                                            </div>
                                            @error('initial_assessment')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="sm:col-span-2">
                                            <label for="concern"
                                                class="block text-sm font-medium text-gray-700">Category: </label>

                                            <select id="category_id" name="category_id"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                                <option value="">{{ $concern->category->category }}</option>

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
                                                <option value="">{{ $concern->unit->building->building }} - {{
                                                    $concern->unit->unit }}</option>

                                            </select>
                                            @error('category_id')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="sm:col-span-6">
                                            <label for="concern" class="block text-sm font-medium text-gray-700">
                                                Concern </label>
                                            <div class="mt-1">
                                                <textarea id="concern" name="concern" rows="3"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-700 rounded-md">
                                                    {{ $concern->concern }}
                                                    </textarea>
                                            </div>

                                            @error('concern')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>



                                        {{-- <div class="sm:col-span-6">
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
                                                            <input id="file-upload" name="file-upload" type="file"
                                                                class="sr-only">
                                                        </label>
                                                        <p class="pl-1">or drag and drop</p>
                                                    </div>
                                                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                                </div>
                                            </div>
                                        </div> --}}


                                        <div class="sm:col-span-2">
                                            <label for="concern"
                                                class="block text-sm font-medium text-gray-700">Department: </label>

                                            <select id="category_id" name="category_id"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                                <option value="{{ $concern->concern_department }}">{{
                                                    $concern->concern_department }}</option>

                                            </select>
                                            @error('category_id')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="sm:col-span-3">
                                            <label for="unit_uuid"
                                                class="block text-sm font-medium text-gray-700">Urgency: </label>

                                            <select id="unit_uuid" name="unit_uuid"
                                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                                <option value="{{ $concern->urgency }}">{{ $concern->urgency }}</option>

                                            </select>
                                            @error('category_id')
                                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        {{-- <button type="submit"
                                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Report</button>
                                        --}}
                                    </div>
                                </div>
                                {{--
                        </form> --}}
                    </div>
                </div>
            </div>
</x-tenant-portal-layout>