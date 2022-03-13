<x-app-layout>
    @section('title', '| Reference | Create')
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
                                <li><a href="/property/{{ Session::get('property') }}/tenants"
                                        class="text-blue-600 hover:text-blue-700">Tenants</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}"
                                        class="text-blue-600 hover:text-blue-700">{{ $tenant->tenant }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Reference</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Create</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/create'">
                        Save</x-button>
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

                        <form method="POST"
                            action="/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/reference/{{ Str::random(10) }}/store"
                            class="w-full" id="create-form">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 px-3">
                                    <x-label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-first-name">
                                        Full Name
                                    </x-label>
                                    <x-input
                                        class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        id="grid-first-name" type="text" name="reference"
                                        value="{{ old('reference') }}" />

                                    @error('reference')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="w-full md:w-1/2 px-3">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                        for="grid-last-name">
                                        Relationship
                                    </label>
                                    <select
                                        class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        id="grid-state" name="relationship">
                                        <option value="">Select one</option>
                                        <option value="parent" {{ old('relationship')=='parent' ? 'selected'
                                            : 'Select one' }}>{{
                                            'parent' }}</option>
                                        <option value="spouse" {{ old('relationship')=='spouse' ? 'selected'
                                            : 'Select one' }}>{{
                                            'spouse' }}</option>
                                        <option value="sibling" {{ old('relationship')=='sibling' ? 'selected'
                                            : 'Select one' }}>{{
                                            'sibling' }}</option>
                                        <option value="friend" {{ old('relationship')=='friend' ? 'selected'
                                            : 'Select one' }}>{{
                                            'friend' }}</option>
                                        <option value="relative" {{ old('relationship')=='relative' ? 'selected'
                                            : 'Select one' }}>{{
                                            'relative' }}</option>
                                        <option value="child" {{ old('relationship')=='child' ? 'selected'
                                            : 'Select one' }}>{{
                                            'child' }}</option>

                                    </select>

                                    @error('relationship')
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




                            <div class="mt-5">
                                <p class="text-right">
                                    <x-button form="create-form">Submit</x-button>
                                </p>
                            </div>
                        </form>

                    </div>

                    @if (!$references->count())
                    <span class="text-center text-red">No references found!</span>
                    @else
                    <span>Guarians ({{ $references->count() }}) </span>

                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Reference</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Mobile</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Relationship</th>


                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>

                            @foreach ($references as $reference)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $reference->reference }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $reference->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $reference->mobile_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $reference->relationship }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/reference/{{ $reference->id }}/delete"
                                            id="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button class="text-red-600 hover:text-red-900"
                                                form="delete-form">Remove</button>
                                        </form>

                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>