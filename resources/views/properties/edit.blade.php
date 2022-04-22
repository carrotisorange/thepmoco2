<x-app-layout>
    @section('title', '| '.$property->property.' | Edit',)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md w-full">
                            <ol class="list-reset flex">
                                <li><a href="/properties" class="text-blue-600 hover:text-blue-700">Properties </a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>

                                <li><a href="/property/{{ $property->uuid }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        $property->property }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Edit</li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/properties'"><i
                            class="fa-solid fa-circle-arrow-left"></i>&nbspBack
                    </x-button>
                    <x-button onclick="window.location.href='/property/{{ Str::random(10) }}/create'"><i
                            class="fa-solid fa-circle-plus"></i>&nbspProperty
                    </x-button>
                    {{-- <x-button form="edit-form">Save</x-button> --}}
                </h5>

            </div>
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">

                    <div>
                        <form action="/property/{{ $property->uuid }}/update" method="POST" id="edit-form"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mx-5">
                                <x-label for="property" :value="__('Property')" />

                                <x-form-input form="edit-form" type="text" name="property"
                                    value="{{old('property', $property->property)}}" required autofocus />

                                @error('property')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5 mx-5">
                                <x-label for="type" :value="__('Description')" />

                                <x-form-textarea name="description" id="description" cols="30" rows="10">{{
                                    old('description', $property->description) }}</x-form-textarea>

                                @error('description')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5 mx-5">
                                <x-label for="type_id" :value="__('Type')" />

                                <x-form-select form="edit-form" name="type_id" id="type_id">
                                    @foreach($types as $type)
                                    <option value="{{ $type->id }}" {{ $type->id == $property->type_id ? 'selected' : ''
                                        }}>{{ $type->type }}</option>
                                    @endforeach
                                </x-form-select>

                                @error('type_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5 mx-5">
                                <x-label for="status" :value="__('Status')" />

                                <x-form-select form="edit-form"
                                    name="status" id="status">
                                    <option value="active" {{ $property->status == 'active' ?
                                        'selected' : ''
                                        }}>active</option>
                                    <option value="inactive" {{ $property->status == 'inactive' ?
                                        'selected' : ''
                                        }}>inactive</option>
                                    <option value="pending" {{ $property->status == 'pending' ?
                                        'selected' : ''
                                        }}>pending</option>

                                </x-form-select>

                                @error('type_id')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5 flex mx-5">
                                <div class="flex-3">
                                    <x-label for="thumbnail" :value="__('Thumbnail')" />

                                    <x-form-input form="edit-form" id="thumbnail" type="file"
                                        name="thumbnail" value="{{old('thumbnail', $property->thumbnail)}}" autofocus />

                                    @error('thumbnail')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-6">
                                    <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $property->thumbnail }}"
                                        alt="">
                                </div>
                            </div>
                            <div class="mt-5 flex mx-5">
                                <div class="flex-3">
                                    <x-label for="tenant_contract"
                                        :value="__('Tenant Contract (Please only upload a PDF file.)')" />

                                    <x-form-input form="edit-form" id="tenant_contract" type="file"
                                        name="tenant_contract"
                                        value="{{old('tenant_contract', $property->tenant_contract)}}" autofocus />

                                    @error('tenant_contract')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-5 mx-5">
                                    @if($property->tenant_contract)
                                    <a target="_blank" class="text-blue"
                                        href="/property/{{ Session::get('property') }}/tenant_contract">Click here to
                                        view the contract</a>
                                    @else
                                    <span>No contract is uploaded.</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-5 flex mx-5">
                                <div class="flex-3">
                                    <x-label for="owner_contract"
                                        :value="__('Owner Contract (Please only upload a PDF file.)')" />

                                    <x-form-input form="edit-form" id="owner_contract" type="file"
                                        name="owner_contract"
                                        value="{{old('owner_contract', $property->owner_contract)}}" autofocus />

                                    @error('owner_contract')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mt-6">
                                    @if($property->owner_contract)
                                    <a target="_blank" class="text-blue"
                                        href="/property/{{ Session::get('property') }}/owner_contract">Click here to
                                        view the contract</a>
                                    @else
                                    <span>No contract is uploaded.</span>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-5">
                                <p class="text-right">
                                    <x-button><i class="fa-solid fa-circle-check"></i>&nbspSave</x-button>
                                </p>
                            </div>


                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>