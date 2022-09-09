<x-tenant-portal-layout>
    @section('title', 'Concerns')

    <main class="flex-1 pb-8 h-screen y-screen overflow-y-scroll">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mt-5 px-4 sm:px-6 lg:px-8">
                {{-- <a href="#"
                    class="flex justify-end text-sm font-medium text-purple-500 hover:text-purple-700">Change to
                    request</a> --}}

                <div>
                    <div class="flex justify-center mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                        <div class="mt-5 md:mt-0 md:col-span-6">
                            <form
                                action="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/concerns/store"
                                method="POST">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-4 gap-6">

                                            <div class="sm:col-span-6">
                                                <label for="subject" class="block text-sm font-medium text-gray-700">
                                                    Subject (required) </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input id="initial_assessment" name="initial_assessment" type="text" value="{{ old('initial_assessment') }}"
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
                                                        <option value="{{ $item->id }}" {{ old('category_id')==$item->id? 'selected': 'Select one'}}>
                                                            {{ $item->category }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </div>


                                            <div class="sm:col-span-3">
                                                <label for="unit_uuid"
                                                    class="block text-sm font-medium text-gray-700">Unit: </label>

                                                <select id="unit_uuid" name="unit_uuid"
                                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                                    <option value="">Select one</option>
                                                    @foreach ($units as $item)
                                                    <option value="{{ $item->unit->uuid }}" {{ old('unit_uuid')==$item->unit->uuid? 'selected': 'Select one'}}>
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


{{-- 
                                            <div class="sm:col-span-6">
                                                <label class="block text-sm font-medium text-gray-700"> Upload an image
                                                </label>
                                                <div
                                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                    <div class="space-y-1 text-center">
                                                        <svg class="mx-auto h-12 w-12 text-gray-400"
                                                            stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                                            aria-hidden="true">
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

                                            
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Report</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="mt-10 sm:px-6">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-3xl font-bold text-gray-700">Concerns</h1>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            {{-- <button type="button"
                                class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-900 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Export
                                Contract</button> --}}

                        </div>
                    </div>
                    <div class="mt-8 flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                                <div
                                    class="mb-10 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <!-- Selected row actions, only show when rows are selected. -->
                                    <div
                                        class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                                    </div>

                                    <table class="min-w-full table-fixed">

                                        <thead class="">
                                            <tr>
                                                <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">

                                                </th>


                                                <th scope="col"
                                                    class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                                    REPORTED ON</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    SUBJECT</th>

                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    CATEGORY </th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    CONCERN</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    STATUS</th>


                                                </th>
                                            </tr>
                                        </thead>

                                        @forelse ($concerns as $index => $item)
                                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                                            <!-- Selected: "bg-gray-50" -->
                                            <tr>
                                                <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                                    <!-- Selected row marker, only show when row is selected. -->

                                                    <input type="checkbox"
                                                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y')}}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $item->initial_assessment }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $item->category->category }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    <a class="font-medium text-blue-900"
                                                        href="/{{ auth()->user()->role_id }}/tenant/{{ auth()->user()->username }}/concerns/{{ $item->id }}">{{
                                                        $item->concern }}</a>
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ $item->status }}
                                                </td>

                                            </tr>
                                        </tbody>
                                        @empty
                                        <tr>
                                            <td
                                                class="whitespace-nowrap py-4 pr-4 text-right text-sm font-medium sm:pr-6">
                                                No concerns
                                                found.</td>
                                        </tr>
                                        @endforelse


                                    </table>
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

    </main>
</x-tenant-portal-layout>