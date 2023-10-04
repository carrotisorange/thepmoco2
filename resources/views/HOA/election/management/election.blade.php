<x-new-layout>
    @section('title','Election | '. env('APP_NAME'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">Election</h1>
            </div>


            <div class="mx-auto">

                <div class="border-b border-gray-200 dark:border-gray-700 mb-4">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        @foreach($electionSubfeaturesArray as $subfeature)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="{{ $subfeature }}-tab"
                                data-tabs-target="#{{ $subfeature }}" type="button" role="tab"
                                aria-controls="{{ $subfeature }}" aria-selected="false">
                                {{ $subfeature }}
                            </button>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div id="myTabContent" wire:ignore>
                    @foreach($electionSubfeaturesArray as $subfeature)
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="">
                                    @if($subfeature === 'policy-form')
                                    <div class="lg:col-span-1 mt-2 ml-5">
                                        <div
                                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="floor_id" class="block text-base font-medium text-gray-900">Date
                                                of Election</label>
                                            <x-form-input name="date_of_election">
                                            </x-form-input>
                                        </div>
                                    </div>

                                    <div class="lg:col-span-1 mt-2 ml-5">
                                        <div
                                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="floor_id" class="block text-base font-medium text-gray-900">Time
                                                Limit</label>
                                            <x-form-input name="time_limit">
                                            </x-form-input>
                                        </div>
                                    </div>

                                    <div class="lg:col-span-1 mt-2 ml-5">
                                        <p class="py-6 text-base">Qualified Voters</p>
                                        <div
                                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="floor_id"
                                                class="block text-base font-medium text-gray-900">Number of Months
                                                behind dues</label>
                                            <x-form-input name="number_of_months_behind_dues">
                                            </x-form-input>
                                        </div>
                                    </div>

                                    <div class="lg:col-span-1 mt-6 ml-5">

                                        <div class="relative bg-white  px-3 py-2">
                                            <label for="floor_id"
                                                class="block text-base font-medium text-gray-900 mb-6">Allow Proxy
                                                Voting</label>

                                            <div class="flex items-center mb-4">
                                                <form-select>
                                                    <option value="">asdasd</option>
                                                </form-select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lg:col-span-2 mt-2 ml-5">
                                        <div
                                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="floor_id"
                                                class="block text-base font-medium text-gray-900">Other Policies <span
                                                    class="font-light text-gray-300">optional</span></label>
                                            <x-form-input
                                                class="block w-full border-0 p-0 text-gray-900  focus:ring-0 sm:text-base">
                                            </x-form-input>
                                        </div>
                                    </div>
                                    @elseif($subfeature === 'candidates')
                                    <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                                        <div class="lg:col-span-1 mt-2 ml-5">
                                            <div
                                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                                <label for="" class="block text-base font-medium text-gray-900">Number of Candidates</label>
                                                <x-form-input name="no_of_candidates">
                                                </x-form-input>
                                            </div>
                                        </div>

                                        <div class="lg:col-span-1 mt-2 ml-5">
                                            <div
                                                class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                                <label for="floor_id" class="block text-base font-medium text-gray-900">Number of Winning Candidates</label>
                                                <x-form-input name="number_of_winning_candidates">
                                                </x-form-input>
                                            </div>
                                        </div>

                                        <div class="lg:col-span-2 mt-2 ml-5">
                                            <div class="flex justify-between py-6">
                                                <p class="">Candidates</p>


                                                <x-button>Add a New Candidate</x-button>
                                            </div>
                                        </div>


                                        <div class="lg:col-span-2 mt-2">
                                            <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4">
                                                <div class="lg:col-span-1 mt-2">
                                                    <div
                                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                                        <label for="floor_id" class="block text-base font-medium text-gray-900">Name</label>
                                                        <x-form-input name="name" >
                                                        </x-form-input>
                                                    </div>
                                                </div>
                                                <div class="lg:col-span-1 mt-2">
                                                    <div
                                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                                        <label for="floor_id" class="block text-base font-medium text-gray-900">Position</label>
                                                        <x-form-input name="position">
                                                        </x-form-input>
                                                    </div>
                                                </div>
                                                <div class="lg:col-span-1 mt-2">
                                                    <div
                                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                                        <label for="floor_id" class="block text-base font-medium text-gray-900"># of Years as HOA
                                                            member</label>
                                                        <x-form-input name="number_of_years_of_hoa">
                                                        </x-form-input>
                                                    </div>
                                                </div>
                                                <div class="lg:col-span-1 mt-2">
                                                    <div
                                                        class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                                        <label for="floor_id" class="block text-base font-medium text-gray-900">Resume</label>
                                                        <div class="flex text-base text-gray-600">
                                                            <label for="file-upload"
                                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                                <span>Upload a file</span>
                                                                <x-form-input id="file-upload" type="file" wire:model="contract" class="sr-only" />
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($subfeature === 'ballot-form')
                                   <div class="space-x-5 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
                                    <div class="lg:col-span-2 mt-2 ml-5">
                                        <div
                                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="floor_id" class="block text-base font-medium text-gray-900">Heading/Greetings <span
                                                    class="font-light text-gray-500">optional</span></label>
                                            <x-form-input name="headings">
                                            </x-form-input>
                                        </div>
                                    </div>
                                    <div class="lg:col-span-2 mt-2 ml-5">
                                        <div
                                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="floor_id" class="block text-base font-medium text-gray-900">Elecom Rules</label>
                                            <x-form-input name="elecon_rules">
                                            </x-form-input>
                                        </div>
                                    </div>

                                    <div class="lg:col-span-2 mt-2 ml-5">
                                        <div
                                            class="relative border bg-white border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                                            <label for="floor_id" class="block text-base font-medium text-gray-900">General Instructions</label>
                                            <x-form-input name="general_instructions">
                                            </x-form-input>
                                        </div>
                                    </div>

                                    <div class="lg:col-span-2 mt-2 ml-5">
                                        <div class="flex justify-between py-6">
                                            <p class="">List of Running Candidates</p>
                                            <button class="px-2 py-2 bg-purple-500 rounded-lg text-white text-base">Edit Candidates</button>
                                        </div>
                                    </div>


                                    <div class="lg:col-span-2 ">


                                        <h2 class="sr-only">Candidates</h2>

                                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 space-x-0 lg:space-x-5">

                                            <div class="lg:col-span-1 mt-2">
                                                <div class="bg-white">

                                                    <form class="">

                                                        <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">

                                                            <li class="flex py-6">
                                                                <div class="flex-shrink-0">
                                                                    <img src="{{ asset('/brands/user.png') }}" alt=""
                                                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                                                </div>

                                                                <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                                                    <div>

                                                                        <h4 class="text-sm">
                                                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                                                        </h4>
                                                                        <div class="flex justify-between">
                                                                            <p class="text-sm font-medium text-gray-900">Position</p>
                                                                            <div class="flex items-center mb-4">
                                                                                <input id="default-checkbox" type="checkbox" value=""
                                                                                    class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>

                                                                        <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                                                    </div>


                                                            </li>
                                                            <li class="flex py-6">
                                                                <div class="flex-shrink-0">
                                                                    <img src="{{ asset('/brands/user.png') }}" alt=""
                                                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                                                </div>

                                                                <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                                                    <div>

                                                                        <h4 class="text-sm">
                                                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                                                        </h4>
                                                                        <div class="flex justify-between">
                                                                            <p class="text-sm font-medium text-gray-900">Position</p>
                                                                            <div class="flex items-center mb-4">
                                                                                <input id="default-checkbox" type="checkbox" value=""
                                                                                    class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>

                                                                        <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                                                    </div>


                                                            </li>
                                                        </ul>



                                                    </form>

                                                </div>

                                            </div>

                                            <div class="lg:col-span-1 mt-2">
                                                <div class="bg-white">

                                                    <form class="">

                                                        <ul role="list" class="divide-y divide-gray-200 border-b border-t border-gray-200">
                                                            <li class="flex py-6">
                                                                <div class="flex-shrink-0">
                                                                    <img src="{{ asset('/brands/user.png') }}" alt=""
                                                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                                                </div>

                                                                <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                                                    <div>

                                                                        <h4 class="text-sm">
                                                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                                                        </h4>
                                                                        <div class="flex justify-between">
                                                                            <p class="text-sm font-medium text-gray-900">Position</p>
                                                                            <div class="flex items-center mb-4">
                                                                                <input id="default-checkbox" type="checkbox" value=""
                                                                                    class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>

                                                                        <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                                                    </div>


                                                            </li>
                                                            <li class="flex py-6">
                                                                <div class="flex-shrink-0">
                                                                    <img src="{{ asset('/brands/user.png') }}" alt=""
                                                                        class="h-24 w-24 rounded-md object-cover object-center sm:h-32 sm:w-32">
                                                                </div>

                                                                <div class="ml-4 flex flex-1 flex-col sm:ml-6">
                                                                    <div>

                                                                        <h4 class="text-sm">
                                                                            <a href="#" class="font-medium text-gray-700 hover:text-gray-800">Name</a>
                                                                        </h4>
                                                                        <div class="flex justify-between">
                                                                            <p class="text-sm font-medium text-gray-900">Position</p>
                                                                            <div class="flex items-center mb-4">
                                                                                <input id="default-checkbox" type="checkbox" value=""
                                                                                    class="w-8 h-8 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                                                <label for="default-checkbox"
                                                                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"></label>
                                                                            </div>
                                                                        </div>
                                                                        <p class="mt-1 text-sm text-gray-500"># of Years as HOA Member</p>

                                                                        <p class="mt-1 text-sm text-blue-500 underline">Resume</p>
                                                                    </div>


                                                            </li>

                                                            <!-- More products... -->
                                                        </ul>



                                                    </form>

                                                </div>

                                            </div>



                                        </div>

                                    </div>
                                </div>

                                    @elseif($subfeature === 'voters')
                                    <div class="flex justify-between">

                                        <div class="w-full flex justify-between py-6">
                                            <!-- show only if proxy voting is allowed -->
                                            <button
                                                class="underline font-medium text-blue-500 rounded-lg px-2 text-base">View
                                                Proxy Voters</button>
                                            <a href=""
                                                class="text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                                type="button">
                                                Download List</a>

                                        </div>
                                    </div>

                                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                            <div class="mb-5 mt-2 relative overflow-hidden">
                                                <table
                                                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                    <thead class="bg-gray-50">
                                                        <tr>
                                                            <x-th>#</x-th>
                                                            <x-th>HOME OWNER</x-th>
                                                            <x-th>HOUSE NUMBER</x-th>
                                                            <x-th>POSITION</x-th>
                                                            <x-th>TIME STARTED</x-th>
                                                            <x-th>TIME ENDED</x-th>
                                                            <x-th>SIGNATURE</x-th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">

                                                        <tr>

                                                            <x-td>1</x-td>
                                                            <x-td>Juan Dela Cruz</x-td>
                                                            <x-td>156-A</x-td>
                                                            <x-td>Officer</x-td>
                                                            <x-td>1:00 PM</x-td>
                                                            <x-td>1:15 PM</x-td>
                                                            <x-td>signature</x-td>

                                                        </tr>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    @else

                                    <div class="flex justify-between">

                                        <div class="w-full flex py-6">

                                            <a href="qualified-votes"
                                                class="underline font-medium text-blue-500 rounded-lg px-2 text-base">View
                                                Total
                                                Number of Qualified Votes</a>




                                        </div>


                                        <div class="w-full flex justify-end py-6">

                                            <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover"
                                                data-dropdown-trigger="hover"
                                                class="text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center"
                                                type="button">
                                                Actions <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg></button>
                                            <!-- Dropdown menu -->
                                            <div id="dropdownHover"
                                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                    aria-labelledby="dropdownHoverButton">
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Download
                                                            Results</a>
                                                    </li>




                                                </ul>
                                            </div>

                                        </div>




                                    </div>

                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <x-th>MODE OF CONDUCTING ELECTION</x-th>



                                            </tr>
                                        </thead>
                                        <tbody class="text-base bg-white divide-y divide-gray-200">

                                            <tr>

                                                <x-td>online</x-td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <x-th>#</x-th>
                                                <x-th>CANDIDATE</x-th>
                                                <x-th>VOTES</x-th>

                                            </tr>
                                        </thead>
                                        <tbody class="text-base bg-white divide-y divide-gray-200">

                                            <tr>

                                                <x-td>1</x-td>
                                                <x-td>Juan Dela Cruz</x-td>
                                                <x-td>100</x-td>


                                            </tr>

                                        </tbody>
                                    </table>

                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>


        </div>
    </div>

    </x-hoa-layout>

    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
