<div>
    @include('modals.popup-error')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-between">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
                </div>
            </div>
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-3 lg:row-start-1 lg:row-span-3">
                <h2 class="sr-only">Images</h2>

                <div class="grid grid-cols-1 lg:gap-6">
                    <img src="{{ asset('/brands/avatar.png') }}" alt="avatar"
                        class="lg:col-span-2 md:row-span-2 rounded-md">

                    <div class="flex items-center justify-center ml-5">
                    </div>
                </div>
            </div>
            <div class="mt-8 lg:col-span-9">
                <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                        data-tabs-toggle="#myTabContent" role="tablist">
                        @foreach($userSubfeaturesArray as $subfeature)
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 rounded-t-lg border-b-2" id="{{ $subfeature }}-tab" data-tabs-target="#{{ $subfeature }}" type="button" role="tab" aria-controls="{{ $subfeature }}" aria-selected="false">{{ $subfeature }}</button>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div id="myTabContent" wire:ignore>
                    @foreach($userSubfeaturesArray as $subfeature)
                    @if($subfeature == 'user')
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel"
                        aria-labelledby="{{ $subfeature }}-tab">
                        <div>
                            <form class="space-y-6" wire:submit.prevent="updateUser()">
                                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="name" >Name</x-label>
                                        <x-form-input type="text" wire:model="name" autocomplete="name"/>
                                        <x-validation-error-component name='name' />
                                    </div>
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="username">Username</x-label>
                                        <x-form-input type="text" wire:model="username" autocomplete="username"/>
                                        <x-validation-error-component name='username' />
                                    </div>
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="email" >Email</x-label>
                                        <x-form-input type="email" wire:model="email" autocomplete="email" />
                                        <x-validation-error-component name='email' />
                                    </div>
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="username" >Mobile Number</x-label>
                                        <x-form-input type="text" wire:model="mobile_number" autocomplete="mobile_number"/>
                                        <x-validation-error-component name='mobile_number' />
                                    </div>
                                    <div class="col-span-2">
                                        <x-label for="gender">Gender</x-label>
                                        <x-form-select wire:model="gender" autocomplete="gender">
                                            <option value="">Select one</option>
                                            <option value="female" {{ 'female'==$gender ? 'Select one' : 'selected' }}>female</option>
                                            <option value="male" {{ 'male'==$gender ? 'Select one' : 'selected' }}>male </option>
                                        </x-form-select>
                                        <x-validation-error-component name='gender' />
                                    </div>
                                    @if($user_id == auth()->user()->id)
                                    <div class="col-span-6 sm:col-span-2">
                                        <x-label for="password" >Password</x-label>
                                        <x-form-input type="password" wire:model="password" autocomplete="password" />
                                        <x-validation-error-component name='password' />
                                    </div>
                                    @endif
                                    @can('accountownerandmanager')
                                    <div class="col-span-2">
                                        <x-label for="role_id" >Role</x-label>
                                        <x-form-select wire:model="role_id" autocomplete="role_id">
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' :'selected'}}>{{ $role->role }}</option>
                                            @endforeach
                                        </x-form-select>
                                        <x-validation-error-component name='role_id' />
                                    </div>
                                    @endcan
                                </div>
                            </form>
                        </div>
                        <div class="mt-5 flex justify-end">
                           <x-button onclick="window.location.href='/login'" class="bg-red-500">
                               Cancel
                            </x-button>
                            &nbsp;
                            <x-button type="submit" wire:click="updateUser()">
                                Update
                            </x-button>
                        </div>
                    </div>
                    @else
                    <div class="p-4 purple rounded-lg dark:bg-gray-800" id="{{ $subfeature }}" role="tabpanel" aria-labelledby="{{ $subfeature }}-tab">
                        <div class="-my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    @if($subfeature == 'property')
                                    @include('tables.properties')
                                    @elseif($subfeature === 'session')
                                    @include('tables.sessions')
                                    @elseif($subfeature === 'document')
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
