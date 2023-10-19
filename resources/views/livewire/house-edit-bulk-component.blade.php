<div>
    <div>

        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:units-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700">Houses / Edit</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/house'">Back
                    </x-button>

                    @if(App\Models\Property::find(Session::get('property_uuid'))->houses->count())
                    <x-button wire:click="updateHouse()">
                        Update
                    </x-button>
                    @endif
                </div>
            </div>

            <div class="mt-3 -my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                {{-- <form wire:submit.prevent="updateForm()"> --}}
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50">
                            <tr>

                                <x-th>
                                    House
                                </x-th>
                                <x-th>
                                    Status
                                </x-th>
                                <x-th>
                                    Address
                                </x-th>

                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($houses as $index => $house)
                            <div wire:key="house-field-{{ $house->uuid }}">
                                <tr>


                                    <x-td>
                                        <x-table-input type="text" wire:model="houses.{{ $index }}.house" />
                                        @error('houses.{{ $index }}.house')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </x-td>


                                    <x-td>
                                        <x-table-select wire:model="houses.{{ $index }}.status_id">
                                            <option value="">Select one</option>
                                            @foreach ($statuses as $status)
                                            <option value="{{ $status->status_id }}" {{ 'houses'
                                                .$index.'status_id'===$status->
                                                status_id? 'selected' : 'Select one' }}>{{ $status->status }}
                                            </option>
                                            @endforeach
                                        </x-table-select>
                                        @error('houses.{{ $index }}.status_id')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </x-td>

                                    <x-td>
                                        <x-table-input type="text" wire:model="houses.{{ $index }}.address" />
                                        @error('houses.{{ $index }}.address')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </x-td>
                                </tr>
                            </div>

                            @endforeach
                        </tbody>
                    </table>
                    {{--
                </form> --}}
            </div>
        </div>
    </div>
</div>