<x-app-layout>
    @section('title', '| member'. $member->name)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li><a href="/property/{{ Session::get('property') }}/team"
                                        class="text-blue-600 hover:text-blue-700">Team</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $member->name }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/team'"><i
                            class="fa-solid fa-circle-arrow-left"></i>&nbspBack
                    </x-button>
                    <x-button onclick="window.location.href='/team/{{ Str::random(10) }}/create'"><i
                            class="fa-solid fa-circle-plus"></i>&nbspadd
                    </x-button>
                </h5>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    <div>
                        <form action="/team/{{ $member->username }}/update" method="POST" id="edit-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div>
                                <x-label for="name" :value="__('Name')" />

                                <x-form-input form="edit-form" class="block mt-1 w-full" type="text" name="name"
                                    value="{{old('name', $member->name)}}" required autofocus />

                                @error('name')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-5">
                                <x-label for="username" :value="__('Username')" />

                                <x-form-input form="edit-form" id="username" class="block mt-1 w-full" type="text"
                                    name="username" value="{{old('username', $member->username)}}" required autofocus />

                                @error('username')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-5">
                                <x-label for="email" :value="__('Email')" />

                                <x-form-input form="edit-form" id="email" class="block mt-1 w-full" type="email"
                                    name="email" value="{{old('email', $member->email)}}" required autofocus />

                                @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-5">
                                <x-label for="mobile_number" :value="__('Mobile')" />

                                <x-form-input form="edit-form" id="mobile_number" class="block mt-1 w-full" type="text"
                                    name="mobile_number" value="{{old('mobile_number', $member->mobile_number)}}"
                                    required autofocus />

                                @error('mobile_number')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-5">
                                <x-label for="role_id" :value="__('Role')" />

                                <x-form-select form="edit-form" name="role_id" id="role_id">
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}" {{ $role->id == $member->role_id ? 'selected' : ''
                                        }}>{{ $role->role }} - {{ $role->description }}</option>
                                    @endforeach
                                </x-form-select>
                                @error('role_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-5">
                                <x-label for="status" :value="__('Status')" />

                                <x-formselect form="edit-form" name="status" id="status">

                                    <option value="active" {{ 'active'==$member->status ? 'selected' : ''
                                        }}>active</option>
                                    <option value="inactive" {{ 'inactive'==$member->status ? 'selected' : ''
                                        }}>inactive</option>
                                    <option value="banned" {{ 'banned'==$member->status ? 'selected' : ''
                                        }}>banned</option>
                                    <option value="pending" {{ 'pending'==$member->status ? 'selected' : ''
                                        }}>pending</option>
                                </x-formselect>
                                @error('status')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mt-5 flex">
                                <div class="flex-3">
                                    <x-label for="avatar" :value="__('Avatar')" />

                                    <x-form-input form="edit-form" id="avatar" class="block mt-1 w-full" type="file"
                                        name="avatar" value="{{old('avatar', $member->avatar)}}" autofocus />

                                    @error('avatar')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-6">
                                    <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $member->avatar }}" alt="">
                                </div>
                            </div>
                            <div class="mt-5">
                                <p class="text-right">
                                    <x-form-button form="edit-form">
                                      
                                    </x-form-button>
                                </p>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>