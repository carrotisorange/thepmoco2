<x-index-layout>
    @section('title', '| Profile')
    <x-slot name="labels">
        Profile
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/properties'">
            Go back
        </x-button>
    </x-slot>

    <div class="p-8 px-12 bg-white border-b border-gray-200">
        <form action="/profile/{{ $user->username }}/complete/update" method="POST" id="edit-form" enctype="multipart/form-data">
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
                    value="{{old('username')}}" required autofocus />

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

                <x-form-input form="edit-form" id="password" type="password" name="password" autofocus required/>

                @error('password')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

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
                    @if($user->avatar)
                    <img class="h-10 w-10 rounded-xl ml-6" src="/storage/{{ $user->avatar }}" alt="">
                    @else
                    <img class="h-10 w-10 rounded-xl ml-6" src="{{ $user->avatarUrl() }}" alt="">
                    @endif

                </div>
            </div>
            <div class="mt-5">
                <p class="text-right">
                    <x-button form="edit-form">
                        Save
                    </x-button>
                </p>
            </div>
    </div>
    </form>
    </div>
</x-index-layout>