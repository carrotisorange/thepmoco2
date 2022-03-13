<x-app-layout>
    @section('title', '| Owner | Create')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session::get('property') }}/units"
                                        class="text-blue-600 hover:text-blue-700">Units</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/unit/{{ $unit->uuid }}" class="text-blue-600 hover:text-blue-700">{{
                                        $unit->unit
                                        }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session::get('property') }}/owners"
                                        class="text-blue-600 hover:text-blue-700">Owners</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Create</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">

                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <!-- Name -->
                    <div>

                        <form method="POST" action="/unit/{{ $uuid }}/owner/{{ Str::random(10) }}/store" class="w-full"
                            id="create-form">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                                    <x-label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-first-name">
                                        Full Name
                                    </x-label>
                                    <x-input
                                        class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="grid-first-name" type="text" name="tenant" value="{{ old('tenant') }}" />

                                    @error('tenant')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Email
                                    </label>
                                    <input
                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name" type="email" name="email" value="{{ old('email') }}">

                                    @error('email')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Mobile
                                    </label>
                                    <input
                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name" type="text" name="mobile_number"
                                        value="{{ old('mobile_number') }}">

                                    @error('mobile_number')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>




                            </div>

                            <div class="flex flex-wrap -mx-3 mb-2">
                                {{-- <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Status
                                    </label>
                                    <select
                                        class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state" name="type">
                                        <option value="">Select one</option>
                                        <option value="studying" {{ old('type')=='studying' ? 'selected' : 'Select one'
                                            }}>{{
                                            'studying' }}</option>
                                        <option value="working" {{ old('type')=='working' ? 'selected' : 'Select one'
                                            }}>{{
                                            'working' }}</option>

                                    </select>

                                    @error('type')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                                <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Birthdate
                                    </label>
                                    <input
                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name" type="date" name="birthdate" value="{{ old('birthdate') }}">

                                    @error('birthdate')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Gender
                                    </label>
                                    <select
                                        class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state" name="gender">
                                        <option value="">Select one</option>
                                        <option value="female" {{ old('gender')=='female' ? 'selected' : 'Select one'
                                            }}>
                                            {{
                                            'female' }}</option>
                                        <option value="male" {{ old('gender')=='male' ? 'selected' : 'Select one' }}>{{
                                            'male' }}</option>
                                    </select>

                                    @error('gender')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Civil Status
                                    </label>
                                    <select
                                        class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state" name="civil_status">
                                        <option value="">Select one</option>
                                        <option value="single" {{ old('civil_status')=='single' ? 'selected'
                                            : 'Select one' }}>
                                            {{
                                            'single' }}</option>
                                        <option value="married" {{ old('civil_status')=='married' ? 'selected'
                                            : 'Select one' }}>{{
                                            'married' }}</option>
                                        <option value="widowed" {{ old('civil_status')=='widowed' ? 'selected'
                                            : 'Select one' }}>
                                            {{
                                            'widowed' }}</option>
                                        <option value="divorced" {{ old('civil_status')=='divorced' ? 'selected'
                                            : 'Select one' }}>{{
                                            'divorced' }}</option>
                                    </select>

                                    @error('civil_status')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-state">
                                        Country
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-state" name="country_id">
                                            <option value="">Select one</option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" {{ old('country_id')==$country->id?
                                                'selected': 'Select one'
                                                }}>{{ $country->country }}</option>
                                            @endforeach
                                        </select>

                                        @error('country_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-state">
                                        Province
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-state" name="province_id">
                                            <option value="">Select one</option>
                                            @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}" {{ old('province_id')==$province->id?
                                                'selected': 'Select one'
                                                }}>{{ $province->province }}</option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-city">
                                        City
                                    </label>
                                    <select
                                        class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state" id="city_id" name="city_id">
                                        <option value="">Select one</option>
                                        @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id')==$city->id?
                                            'selected': 'Select one'
                                            }}>{{ $city->city }}</option>
                                        @endforeach
                                    </select>

                                    @error('city_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>



                            </div>
                            <div class="mt-5">
                                <p class="text-right">
                                    <x-button form="create-form">Submit</x-button>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
</x-app-layout>