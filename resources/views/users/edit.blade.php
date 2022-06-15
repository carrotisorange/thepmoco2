<x-index-layout>
    @section('title', '| Profile')
    <x-slot name="labels">
        Profile / {{ $user->username }}
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'">
            Go back
        </x-button>
    </x-slot>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">

        <form action="/profile/{{ $user->username }}/update" method="POST" id="edit-form" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-form-input form="edit-form" type="text" name="name" value="{{old('name', $user->name)}}" required
                    autofocus />

                @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5">
                <x-label for="username" :value="__('Username')" />

                <x-form-input form="edit-form" id="username" type="text" name="username"
                    value="{{old('username', $user->username)}}" required autofocus />

                @error('username')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5">
                <x-label for="email" :value="__('Email')" />

                <x-form-input form="edit-form" id="email" type="email" name="email"
                    value="{{old('email', $user->email)}}" required autofocus />

                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5">
                <x-label for="mobile_number" :value="__('Mobile')" />

                <x-form-input form="edit-form" id="mobile_number" type="text" name="mobile_number"
                    value="{{old('mobile_number', $user->mobile_number)}}" required autofocus />

                @error('mobile_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-5">
                <x-label for="password" :value="__('Password')" />

                <x-form-input form="edit-form" id="password" type="password" name="password" autofocus />

                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            @if(auth()->user()->role_id === 5)
            <div class="mt-5">
                <x-label for="role_id" :value="__('Role')" />

                <x-form-select form="edit-form" name="role_id" id="role_id">
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected'
                        : ''
                        }}>{{ $role->role }} - {{ $role->description }}</option>
                    @endforeach
                </x-form-select>

                @error('role_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>


            <div class="mt-5">
                <x-label for="status" :value="__('Status')" />

                <x-form-select form="edit-form" name="status" id="status">

                    <option value="active" {{ 'active'==$user->status ? 'selected' : ''
                        }}>active</option>
                    <option value="inactive" {{ 'inactive'==$user->status ? 'selected' : ''
                        }}>inactive</option>
                    <option value="banned" {{ 'banned'==$user->status ? 'selected' : ''
                        }}>banned</option>
                    <option value="pending" {{ 'pending'==$user->status ? 'selected' : ''
                        }}>pending</option>
                </x-form-select>

                @error('status')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            @endcan

            <div class="mt-5 flex">
                <div class="flex-3">
                    <x-label for="avatar" :value="__('Avatar')" />

                    <x-form-input form="edit-form" id="avatar" type="file" name="avatar"
                        value="{{old('avatar', $user->avatar)}}" autofocus />

                    @error('avatar')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6">
                    @if(auth()->user()->avatar)
                    <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $user->avatar }}" alt="">
                    @else
                    <img class="h-10 w-10 rounded-xl ml-6" src="{{ auth()->user()->avatarUrl() }}" alt="">
                    @endif

                </div>
            </div>
            <div class="mt-5">
                <p class="text-right">
                    <x-button form="edit-form">
                        Update Profile Info
                    </x-button>
                </p>
            </div>

    </div>
    </form>
    </div>

</x-index-layout>