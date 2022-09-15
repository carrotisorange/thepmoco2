<x-new-layout>
    @section('title','Concerns | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ url()->previous() }}"><img class="h-5 w-auto"
                                    src="{{ asset('/brands/back-button.png') }}"></a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="mt-5 px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold text-gray-700 mt-5">Concerns</h1>
                        <h1 class="text-3xl font-bold text-gray-700 ">Reference #: {{ $concern->reference_no }}</h1>
                    </div>
                </div>

                <form class="space-y-6" action="#" method="POST">

                    <div class=" px-4 py-5 sm:rounded-lg sm:p-6">
                        <div class="md:grid md:grid-cols-6 md:gap-6">


                            <div class="col-span-3 sm:col-span-2">
                                <label for="first-name" class="block text-sm font-medium text-gray-700">Date
                                    Reported:</label>
                                <input type="text" name="created_at" id="created_at" autocomplete="created_at"
                                    value="{{ Carbon\Carbon::parse($concern->created_at)->format('M d, Y') }}" readonly
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="last-name" class="block text-sm font-medium text-gray-700">Tenant</label>
                                <input type="text" name="tenant_uuid" id="tenant_uuid" autocomplete="tenant_uuid"
                                    value="{{ $concern->concern }}" readonly
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Unit
                                    No.</label>
                                <input type="text" name="unit_uuid" id="unit_uuid" autocomplete="unit_uuid"
                                    value="{{ $concern->unit->unit }}" readonly
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label for="email-address" class="block text-sm font-medium text-gray-700">Unit
                                    Subject</label>
                                <input type="text" name="initial_assessment" id="initial_assessment"
                                    autocomplete="initial_assessment" value="{{ $concern->initial_assessment }}"
                                    readonly
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            </div>

                            <div class="sm:col-span-4">
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Category:
                                </label>

                                <select id="category_id" name="category_id"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                    @foreach ($categories as $item)
                                    <option value="{{ $item->id }}" {{ old('type_id', $concern->category_id) ==$item->id
                                        ?'selected' : ''}}>
                                        {{ $item->category }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>


                            <div class="sm:col-span-6">
                                <label for="concern" class="block text-sm font-medium text-gray-700"> Concern
                                </label>
                                <div class="mt-1">
                                    <textarea id="concern" name="concern" rows="3"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-700 rounded-md">
                                    {{ $concern->concern }}
                                    </textarea>
                                </div>

                            </div>



                            <div class="col-span-3 sm:col-span-2">
                                <fieldset>
                                    <div>
                                        <label for="about" class="block text-sm font-medium text-gray-700">Image
                                            Uploaded:
                                        </label>
                                        <div class="mt-1">

                                        </div>

                                    </div>
                                </fieldset>
                            </div>


                            <div class="col-span-3 sm:col-span-2">
                                <fieldset>
                                    <div>
                                        <label for="about" class="block text-sm font-medium text-gray-700">Course of
                                            action
                                            taken/Remarks:
                                        </label>
                                        <div class="mt-1">
                                            <textarea id="about" name="about" rows="3"
                                                class="h-16 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                                placeholder=""></textarea>
                                        </div>

                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <fieldset>
                                    <div>
                                        <label for="about" class="block text-sm font-medium text-gray-700">Resolved by:
                                        </label>
                                        <div class="mt-1">
                                            <textarea id="about" name="about" rows="3"
                                                class="h-5 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                                placeholder=""></textarea>
                                        </div>


                                    </div>
                                </fieldset>
                                <div class="mt-2 grid grid-cols-1 gap-y-6  sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <div class=" pl-2" id="filter-section-0">
                                            <div class="">


                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-0" name="category[]" value="tees"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-0"
                                                        class="ml-3 text-sm text-gray-500">Concern
                                                        Closed</label>

                                                </div>


                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-1" name="category[]"
                                                        value="crewnecks" type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-1"
                                                        class="ml-3 text-sm text-gray-500">Concern
                                                        Pending</label>

                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                </div>

                            </div>



                        </div>
                    </div>
            </div>

            <div class="flex justify-end">
                <button type="button"
                    class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                <button type="submit"
                    class="ml-3 inline-flex justif y-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Respond</button>
            </div>
        </div>
    </div>
</x-new-layout>