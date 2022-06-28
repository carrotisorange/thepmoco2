<div>
    @can('manager')
    <div class="p-8 px-12 bg-white border-b border-gray-200">
        <form wire:submit.prevent="submitForm" enctype="multipart/form-data">
            <div class="flex flex-row">
                <div class="basis-full">
                    <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                        <x-label for="role_id" :value="__('Role')" />

                        <x-form-select wire:model="role_id" form="create-form" name="role_id" id="role_id" autofocus>
                            <option value="">Select one</option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" {{ old('role_id')==$role->id?
                                'selected': 'Select one'
                                }}>{{ $role->role }} </option>
                            @endforeach
                        </x-form-select>

                        @error('role_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full">
                    <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                        <x-label for="name" :value="__('Name')" />

                        <x-form-input wire:model="name" form="create-form" type="text" name="name"
                            :value="old('name')" />

                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full">
                    <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                        <x-label for="username" :value="__('Username')" />

                        <x-form-input wire:model="username" form="create-form" id="username" type="text" name="username"
                            :value="old('username', $username)" autofocus />

                        @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full">
                    <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                        <x-label for="email" :value="__('Email')" />

                        <x-form-input wire:model="email" form="create-form" id="email" type="email" name="email"
                            :value="old('email')" autofocus />

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full">
                    <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                        <x-label for="mobile_number" :value="__('Mobile')" />

                        <x-form-input wire:model="mobile_number" form="create-form" id="mobile_number" type="text"
                            name="mobile_number" :value="old('mobile_number')" autofocus />

                        @error('mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full">
                    <div class="mt-2 w-full md:w-full px-3 mb-6 md:mb-0">
                        <x-label for="mobile_number" :value="__('Password')" />

                        <x-form-input wire:model="password" type="text" autofocus />

                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="basis-full">
                    <div class="mt-5 w-full md:w-full px-3 mb-6 md:mb-0">
                        <x-button wire:loading.remove wire:click="submitForm">
                            Create
                        </x-button>
                        <div wire:loading wire:target="submitForm">
                            Processing...
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endcan

    <div class="mt-2 mb-2">
        {{ $teams->links() }}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Name</x-th>
                    <x-th>Contact</x-th>
                    <x-th>Status</x-th>
                    <x-th>Created</x-th>
                    <x-th>Email verified at</x-th>
                    <x-th></x-th>
                </tr>
            </thead>
            @forelse ($teams as $index => $item)
            <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <tr>
                    <x-td>{{ $index }}</x-td>
                    <x-td>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <a href="/profile/{{ $item->username }}/edit">
                                    <img class="h-10 w-10 rounded-full" src="/storage/{{ $item->avatar }}" alt=""></a>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">{{
                                    $item->name }}
                                </div>
                                <div class="text-sm text-gray-500">{{ $item->role }}
                                </div>
                            </div>
                        </div>
                    </x-td>
                    <x-td>
                        <div class="text-sm text-gray-900">{{ $item->email }}
                        </div>
                        <div class="text-sm text-gray-500">{{ $item->mobile_number }}
                        </div>
                    </x-td>
                    <x-td>
                        @if($item->status === 'active')
                        <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-circle-check"></i> {{
                            $item->status }}
                            @else
                            <span
                                class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                <i class="fa-solid fa-clock"></i> {{
                                $item->status }}
                            </span>
                            @endif
                    </x-td>
                    <x-td>{{ Carbon\Carbon::parse($item->user_created)->timezone('Asia/Manila')->format('M d, Y @
                        g:i
                        A')}}</x-td>
                    <x-td>
                        @if($item->status==='active')
                        {{ Carbon\Carbon::parse($item->email_verified_at)->timezone('Asia/Manila')->format('M d, Y @
                        g:i
                        A')}}

                        @endif
                    </x-td>
                    <x-td>
                        <x-button onclick="confirmMessage()" wire:loading.remove
                            wire:click='removeUser({{ $item->user_id }})'
                            class="bg-purple-800 hover:bg-purple-700 active:bg-purple-900 focus:border-purple-900">
                            Remove</x-button>
                        <div wire:loading wire:target="removeUser">
                            Processing...
                        </div>
                    </x-td>
                    @empty
                    <x-td>No data found!</x-td>
                </tr>
            </tbody>
            @endforelse
        </table>
    </div>
    @include('layouts.notifications')
</div>