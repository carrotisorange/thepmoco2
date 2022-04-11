<x-app-layout>
    @section('title', '| '.$tenant->tenant.' | Teant',)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name')}}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session('property') }}/tenants"
                                        class="text-blue-600 hover:text-blue-700">Tenants</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/tenant/{{ $tenant->uuid }}" class="text-blue-600 hover:text-blue-700">{{
                                        $tenant->tenant }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit</li>
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
                    <div>
                        <form method="POST" action="/tenant/{{ $tenant->uuid }}/update" class="w-full"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                                    <x-label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-first-name">
                                        Full Name
                                    </x-label>

                                    <x-input
                                        class="appearance-none block w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="grid-first-name" type="text" name="tenant"
                                        value="{{ old('tenant', $tenant->tenant) }}" />

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
                                        id="grid-last-name" type="email" name="email"
                                        value="{{ old('email', $tenant->email) }}">

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
                                        value="{{ old('mobile_number', $tenant->mobile_number) }}">

                                    @error('mobile_number')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>




                            </div>

                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Type
                                    </label>
                                    <select
                                        class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state" name="type">
                                        <option value="">Select one</option>

                                        <option value="studying" {{ old('type', $tenant->
                                            type) == 'studying' ? 'selected' : '' }}>
                                            studying
                                        </option>

                                        <option value="working" {{ old('type', $tenant->
                                            type) == 'working' ? 'selected' : '' }}>
                                            working
                                        </option>
                                    </select>

                                    @error('type')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/4 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Birthdate
                                    </label>
                                    <input
                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-last-name" type="date" name="birthdate"
                                        value="{{ old('birthdate', $tenant->birthdate) }}">

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

                                        <option value="female" {{ old('gender', $tenant->
                                            gender) == 'female' ? 'selected' : '' }}>
                                            female
                                        </option>

                                        <option value="male" {{ old('gender', $tenant->
                                            gender) == 'male' ? 'selected' : '' }}>
                                            male
                                        </option>


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

                                        <option value="single" {{ old('civil_status', $tenant->
                                            civil_status) == 'single' ? 'selected' : '' }}>
                                            single
                                        </option>

                                        <option value="married" {{ old('civil_status', $tenant->
                                            civil_status) == 'married' ? 'selected' : '' }}>
                                            married
                                        </option>

                                        <option value="widowed" {{ old('civil_status', $tenant->
                                            civil_status) == 'widowed' ? 'selected' : '' }}>
                                            widowed
                                        </option>

                                        <option value="divorced" {{ old('civil_status', $tenant->
                                            civil_status) == 'divorced' ? 'selected' : '' }}>
                                            divorced
                                        </option>


                                    </select>

                                    @error('civil_status')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mt-6 flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-state">
                                        Country
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-state" name="country_id">
                                            <option value="">Select one</option>
                                            @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ old('country_id', $tenant->
                                                country_id) == $country->id ? 'selected' : '' }}>
                                                {{ $country->country }}
                                            </option>
                                            @endforeach
                                        </select>

                                        @error('country_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-state">
                                        Province
                                    </label>
                                    <div class="relative">
                                        <select
                                            class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                            id="grid-state" name="province_id">
                                            <option value="">Select one</option>
                                            @foreach($provinces as $province)
                                            <option value="{{ $province->id }}" {{ old('province_id', $tenant->
                                                province_id) == $province->id ? 'selected' : '' }}>
                                                {{ $province->province }}
                                                @endforeach
                                            </option>
                                        </select>
                                        @error('province_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-city">
                                        City
                                    </label>
                                    <select
                                        class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state" id="city_id" name="city_id">
                                        <option value="">Select one</option>
                                        @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city_id', $tenant->
                                            city_id) == $city->id ? 'selected' : '' }}>
                                            {{ $city->city }}
                                            @endforeach
                                        </option>
                                    </select>

                                    @error('city_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-city">
                                        Barangay
                                    </label>
                                   <input wire:model="barangay"
                                        class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="barangay" type="text" name="barangay" value="{{ old('barangay') }}">

                                    @error('barangay')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full px-3 mb-6 md:mb-0 mt-5 flex">
                                    <div class="flex-3">
                                        <label
                                            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                            for="grid-city">
                                            Photo ID (i.e., Government issues ID, school ID, employee ID)
                                        </label>

                                        <x-input  id="photo_id" class="block mt-1 w-full" type="file"
                                            name="photo_id" value="{{old('photo_id', $tenant->photo_id)}}" autofocus />

                                        @error('photo_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mt-6">
                                        <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $tenant->photo_id }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5">
                                <p class="text-right">
                                    <x-button>

                                        Save
                                    </x-button>
                                </p>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>