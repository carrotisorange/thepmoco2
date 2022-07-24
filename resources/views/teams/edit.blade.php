<x-index-layout>
    @section('title', '| Teams')
    <x-slot name="labels">
    
       <li class="text-gray-500">Team</li>
        </li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">{{ $member->name }}</li>
       
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/team'">
           Go back to teams
        </x-button>
    </x-slot>
    <div class="p-8 px-12 bg-white border-b border-gray-200">

        <form action="/property/{{ Session::get('property') }}/team/{{ $member->username }}/update" method="POST" id="edit-form" enctype="multipart/form-data">
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

                <x-form-input form="edit-form" id="username" class="block mt-1 w-full" type="text" name="username"
                    value="{{old('username', $member->username)}}" required autofocus />

                @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-5">
                <x-label for="email" :value="__('Email')" />

                <x-form-input form="edit-form" id="email" class="block mt-1 w-full" type="email" name="email"
                    value="{{old('email', $member->email)}}" required autofocus />

                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-5">
                <x-label for="mobile_number" :value="__('Mobile')" />

                <x-form-input form="edit-form" id="mobile_number" class="block mt-1 w-full" type="text"
                    name="mobile_number" value="{{old('mobile_number', $member->mobile_number)}}" required autofocus />

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

                    <x-form-input form="edit-form" id="avatar" class="block mt-1 w-full" type="file" name="avatar"
                        value="{{old('avatar', $member->avatar)}}" autofocus />

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
                    <x-button>Update Member Info</x-button>
                </p>
            </div>
    </div>
    </form>
    </div>

</x-index-layout>