<x-new-layout>
    @section('title','Cashflow | '. Session::get('property_name'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">

                    <h1 class="mb-5 text-3xl font-bold text-gray-700">Cashflow</h1>

                </div>

                {{-- <div class="sm:col-span-3">

                    <div class="sm:col-span-2">
                        <form>
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300 ">Filters</label>
                            <div class="relative w-64 mb-5">
                                <div
                                    class="flex absolute justify-end inset-y-0 left-0 items-center pl-3 pointer-events-none">

                                </div>
                                <button type="button"
                                    class="px-2 py-3 h-9 rounded-lg border border-gray-300 dark:border-gray-600 bg-white w-full flex items-center justify-between text-sm text-gray-400"
                                    aria-controls="filter-section-0" aria-expanded="false">
                                    <span class="text-sm font-medium text-gray-900"> Select Month:</span>
                                    <span class="ml-6 flex items-center">
                                        <!--
                            Expand/collapse icon, toggle classes based on question open state.
        
                            Heroicon name: solid/chevron-down
        
                            Open: "-rotate-180", Closed: "rotate-0"
                          -->
                                        <svg class="rotate-0 h-5 w-5 transform" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>
                                </h3>

                                <div class="hidden mt-5 grid grid-cols-1 gap-y-6  sm:grid-cols-6">
                                    <div class="sm:col-span-3">
                                        <div class=" pl-2 bg-white" id="filter-section-0">
                                            <div class="">


                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-0" name="category[]" value="tees"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-0"
                                                        class="ml-3 text-sm text-gray-500">January</label>

                                                </div>


                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-1" name="category[]"
                                                        value="crewnecks" type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-1"
                                                        class="ml-3 text-sm text-gray-500">February</label>

                                                </div>


                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-2"
                                                        class="ml-3 text-sm text-gray-500">March</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-2"
                                                        class="ml-3 text-sm text-gray-500">April</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-2"
                                                        class="ml-3 text-sm text-gray-500">May</label>
                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-2"
                                                        class="ml-3 text-sm text-gray-500">June</label>
                                                </div>


                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-2"
                                                        class="ml-3 text-sm text-gray-500">July</label>

                                                </div>




                                            </div>

                                        </div>

                                    </div>

                                    <div class="sm:col-span-3">
                                        <div class=" pl-2 bg-white" id="filter-section-0">
                                            <div class="">


                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-2"
                                                        class="ml-3 text-sm text-gray-500">August</label>

                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-2"
                                                        class="ml-3 text-sm text-gray-500">September</label>

                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-0" name="category[]" value="tees"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-0"
                                                        class="ml-3 text-sm text-gray-500">October</label>


                                                </div>


                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-1" name="category[]"
                                                        value="crewnecks" type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-1"
                                                        class="ml-3 text-sm text-gray-500">November</label>

                                                </div>


                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-2"
                                                        class="ml-3 text-sm text-gray-500">December</label>

                                                </div>

                                                <div class="flex items-center">
                                                    <input id="filter-mobile-category-2" name="category[]" value="hats"
                                                        type="checkbox"
                                                        class="h-4 w-4 border-gray-300 rounded text-indigo-600 focus:ring-indigo-500">
                                                    <label for="filter-mobile-category-2"
                                                        class="ml-3 text-sm text-gray-500">Last Year</label>

                                                </div>


                                                <div class="flex justify-end">
                                                    <button type="submit"
                                                        class="ml-3 inline-flex justify-center  px-4 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-gray-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Apply
                                                        Filters</button>
                                                </div>

                                            </div>

                                        </div>


                                    </div>



                                </div>
                            </div>


                    </div>



                    </form>




                </div>




 --}}




            </div>

            {{-- <div
                class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <a href="#"
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Daily</a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            class="inline-block p-4 text-blue-600 rounded-t-lg border-b-2 border-blue-600 active dark:text-blue-500 dark:border-blue-500"
                            aria-current="page">Monthly</a>
                    </li>
                    <li class="mr-2">
                        <a href="#"
                            class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300">Annual
                            Summary</a>
                    </li>

                </ul>
            </div> --}}


            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        <table class="min-w-full table-fixed">

                            <thead class="">
                                <tr>
                                    <th scope="col" class="relative w-12 px-5 sm:w-8 sm:px-8">
                                        #
                                    </th>
                                  
                                    <th scope="col" class="PX-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        DATE</th>
                                    
                                    
                                    <th scope="col" class="PX-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        DESCRIPTION</th>
                                    {{-- <th scope="col" class="PX-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        PAYOR/PAYEE</th> --}}
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        INCOME</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        EXPENSE</th>
                                    {{-- <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                        BALANCE</th> --}}

                                    </th>
                                </tr>
                            </thead>


                            @foreach ($accountpayables->union($collections) as $index => $cashflow)

                            <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                                <!-- Selected: "bg-gray-50" -->
                                <tr>
                                    <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                        <!-- Selected row marker, only show when row is selected. -->

                                        {{ $index+1 }}
                                    </td>
                                    <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                  
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $cashflow->date }}
                                    </td>
                                  
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $cashflow->label }}
                                    </td>
                                  
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($cashflow->label == 'INCOME')
                                            {{ number_format($cashflow->amount, 2) }}
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($cashflow->label == 'EXPENSE')
                                        {{ number_format($cashflow->amount, 2) }}
                                        @endif
                                    </td>
                     

                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>






                </div>
            </div>
        </div>

    </div>
</x-new-layout>