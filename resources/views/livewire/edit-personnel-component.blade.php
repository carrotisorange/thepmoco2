<x-modal-component>

    <x-slot name="id">
        edit-personnel-modal-{{$personnel->id}}
    </x-slot>
    <h1 class="text-center font-medium">Edit Personnel</h1>
    <div class="p-5">
        {{-- <form wire:submmit.prevent="updateButton()"> --}}

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="name">Name</label>
                <input type="text" wire:model="name" name="name" id="name"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
             <x-validation-error-component name='name' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="email">Email</label>
                <input type="email" wire:model="email" name="email" id="email"
                    class="bg-white block p-4  w-full text-sm h-5 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="" required>
              <x-validation-error-component name='email' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="role_id">Role</label>
                <x-form-select wire:model="role_id" name="role_id" id="role_id">
                    <option value="">Select one</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ $role->id===$role_id? 'selected' : 'Select one' }}>
                        {{ $role->role }}
                    </option>
                    @endforeach
                </x-form-select>

              <x-validation-error-component name='role_id' />
            </div>

            <div class="mt-5 sm:mt-6">
                <label class="text-sm" for="is_approved">Has authorization to access {{ Session::get('property')
                    }}?</label>
                <x-form-select name="is_approved" id="is_approved" wire:model="is_approved" class="">
                    <option value="">Select one</option>
                    <option value="1" {{ '1'==$is_approved ? 'Select one' : 'selected' }}>
                        Yes</option>
                    <option value="0" {{ '0'==$is_approved ? 'Select one' : 'selected' }}>No</option>

                </x-form-select>

             <x-validation-error-component name='is_approved' />
            </div>
            <!-- NEW RESTRICTIONS -->
            <div class="mt-5 sm:mt-6">
                <label class="text-sm">Restrictions</label>
                <div class="py-6 grid grid-cols-5">
                    <div class="text-sm font-medium border px-1 text-center">feature
                        <div class="py-2">
                            @foreach($availableFeatures as $feature)
                            {{-- @if($feature->feature->is_active) --}}
                            <div class="px-1 py-1 border text-sm text-left font-light">{{ $feature->feature->feature }}
                            </div>
                            {{-- @endif --}}
                            @endforeach
                        </div>
                    </div>

                    <div class="text-sm font-medium border px-1 text-center">read
                        <div class="py-2">
                            @foreach($user_restrictions as $index => $user_restriction)
                            <div class="px-1 py-1 border text-sm font-light">
                                <input wire:model="user_restrictions.{{ $index }}.is_approved" type="checkbox"
                                    @if('user_restrictions.{{ $index }}.is_approved') checked @endif />
                            </div>
                            @endforeach
                        </div>
                    </div>



                </div>


            </div>

            {{--
            <div class="mt-5 sm:mt-6">





                <fieldset>
                    <label class="text-sm" for="is_approved">Restrictions</label>

                    @foreach($user_restrictions as $index => $user_restriction)
                    <div wire:key="user-restriction-{{ $user_restriction->id }}">
                        <div class="space-y-5 mt-4">

                            <div class="relative flex items-start">
                                <div class="flex h-6 items-center">
                                    <input wire:model="user_restrictions.{{ $index }}.is_approved" type="checkbox"
                                        @if('user_restrictions.{{ $index }}.is_approved') checked @endif
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                </div>
                                <div class="ml-3 text-sm leading-6">
                                    <label for="comments" class="font-medium text-gray-900"><span class="font-bold">{{
                                            $user_restriction->restriction->restriction }}</span> {{
                                        $user_restriction->feature->feature}}</label>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </fieldset>

            </div>--}}

            <div class="mt-5 sm:mt-6">
                @can('accountownerandmanager')
                <x-button class="w-full" type="button" wire:target="updateButton" wire:click="updateButton">
                    Update
                </x-button>
                @else
                <x-button class="w-full" type="button" disabled wire:target="updateButton">
                    Update
                </x-button>
                <p class="text-left text-red-500 text-xs mt-2">This feature is locked. Please contact your manager.
                </p>
                @endcan

            </div>
            {{--
        </form> --}}
    </div>
</x-modal-component>
