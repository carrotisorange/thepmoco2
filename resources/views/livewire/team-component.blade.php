<div class="py-12">
    <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden shadow-sm sm:rounded-lg">
            <div class="">
                <div x-data="{show:false}">
                    <form wire:submit.prevent="submitForm" enctype="multipart/form-data"
                        action="/team/{{ Str::random(8) }}/store" method="POST" id="create-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <x-label for="role_id" :value="__('Select a role for the member.')" />

                            <x-form-select wire:model="role_id" form="create-form" name="role_id" id="role_id"
                                @change="show = !show">
                                <option value="">Select one</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id')==$role->id?
                                    'selected': 'Select one'
                                    }}>{{ $role->role }} - {{ $role->description }}</option>
                                @endforeach
                            </x-form-select>

                            @error('role_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div x-show="show">
                            <div class="mt-5">
                                <x-label for="name" :value="__('Name')" />

                                <x-form-input wire:model="name" form="create-form" type="text" name="name"
                                    :value="old('name')" autofocus />

                                @error('name')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="username" :value="__('Username')" />

                                <x-form-input wire:model="username" form="create-form" id="username" type="text"
                                    name="username" :value="old('username', $username)" autofocus />

                                @error('username')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="email" :value="__('Email')" />

                                <x-form-input wire:model="email" form="create-form" id="email" type="email" name="email"
                                    :value="old('email')" autofocus />

                                @error('email')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="mobile_number" :value="__('Mobile')" />

                                <x-form-input wire:model="mobile_number" form="create-form" id="mobile_number"
                                    type="text" name="mobile_number" :value="old('mobile_number')" autofocus />

                                @error('mobile_number')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <x-label for="avatar" :value="__('Avatar')" />

                                <x-form-input wire:model="avatar" form="create-form" id="avatar" type="file"
                                    name="avatar" :value="old('avatar')" autofocus />

                                @error('avatar')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <p class="text-right">
                                    <x-button form="create-form">
                                        <svg wire:loading wire:target="submitForm"
                                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                stroke-width="4">
                                            </circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                        <i class="fa-solid fa-circle-check"></i>&nbspSubmit
                                    </x-button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>