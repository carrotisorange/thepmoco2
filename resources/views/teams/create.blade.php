<x-app-layout>
    @section('title', '| Team | Create')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/properties/" class="text-blue-600 hover:text-blue-700">Properties</a></li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session::get('property') }}/team"
                                        class="text-blue-600 hover:text-blue-700">Team</a></li>
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
                    <div x-data="{show:false}">
                        <form action="/team/{{ $random_str }}/store" method="POST" id="create-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div>
                                <x-label for="role_id" :value="__('Role')" />

                                <select form="create-form"
                                    class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    name="role_id" id="role_id" required @change="show = !show">
                                    <option value="">Select one</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role_id')==$role->id?
                                        'selected': 'Select one'
                                        }}>{{ $role->role }} - {{ $role->description }}</option>
                                    @endforeach
                                </select>

                                @error('role_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div x-show="show">
                                <div class="mt-5">
                                    <x-label for="name" :value="__('Name')" />

                                    <x-input form="create-form" class="block mt-1 w-full" type="text" name="name"
                                        :value="old('name')" required autofocus />

                                    @error('name')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <x-label for="username" :value="__('Username')" />

                                    <x-input form="create-form" id="username" class="block mt-1 w-full" type="text"
                                        name="username" :value="old('username')" required autofocus />

                                    @error('username')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <x-label for="email" :value="__('Email')" />

                                    <x-input form="create-form" id="email" class="block mt-1 w-full" type="email"
                                        name="email" :value="old('email')" required autofocus />

                                    @error('email')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <x-label for="mobile_number" :value="__('Mobile')" />

                                    <x-input form="create-form" id="mobile_number" class="block mt-1 w-full" type="text"
                                        name="mobile_number" :value="old('mobile_number')" required autofocus />

                                    @error('mobile_number')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <x-label for="avatar" :value="__('Avatar')" />

                                    <x-input form="create-form" id="avatar" class="block mt-1 w-full" type="file"
                                        name="avatar" :value="old('avatar')" autofocus />

                                    @error('avatar')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mt-5">
                                    <p class="text-right">
                                        <x-button form="create-form">Submit</x-button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>