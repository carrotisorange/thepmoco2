<form class="space-y-6" action="#" method="POST" wire:submit.prevent="submitForm()" class="w-full"
    enctype="multipart/form-data">
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            {{-- <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="/property/{{ Session::get('property') }}/concern"><img class="h-5 w-auto"
                                    src="{{ asset('/brands/back-button.png') }}"></a>
                        </div>
                    </li>
                </ol>
            </nav> --}}
            <div class="mt-5 px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-bold text-gray-700 ">Concern Reference #: {{
                            $concern_details->reference_no }}
                        </h1>
                    </div>
                </div>


                <div class=" px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-6 md:gap-6">


                        <div class="col-span-3 sm:col-span-3">
                            <label for="created_at" class="block text-sm font-medium text-gray-700">Concern reported
                                on</label>
                            <input type="date" wire:model="created_at" autocomplete="created_at"
                                value="{{ Carbon\Carbon::parse($concern_details->created_at)->format('M d, Y') }}"
                                readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            @error('created_at')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- <div class="col-span-3 sm:col-span-2">
                            <label for="tenant_uuid" class="block text-sm font-medium text-gray-700">Tenant</label>
                            <input type="text" wire:model="tenant_uuid" autocomplete="tenant_uuid"
                                value="{{ $concern_details->tenant->tenant }}" readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            @error('tenant_uuid')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div> --}}

                        <div class="col-span-3 sm:col-span-3">
                            <label for="unit_uuid" class="block text-sm font-medium text-gray-700">Unit
                                No.</label>
                            @error('unit_uuid')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            <input type="text" wire:model="unit_uuid" autocomplete="unit_uuid"
                                value="{{$concern_details->unit->unit }}" readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        </div>

                        <div class="col-span-4 sm:col-span-4">
                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                Subject</label>
                            @error('subject')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                            <input type="text" autocomplete="subject" wire:model="subject" readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        </div>

                        <div class="col-span-2 sm:col-span-2">
                            <fieldset>
                                <div>
                                    <label for="about" class="block text-sm font-medium text-gray-700">Image
                                        Uploaded:
                                    </label>
                                    <div class="mt-1">
                                        @if(!$concern_details->image == null)
                                        <a href="{{ asset('/storage/'.$concern_details->image) }}" target="_blank"
                                            class="text-indigo-600 hover:text-indigo-900">View
                                            Attachment</a>
                                        @else
                                            No image attached
                                        @endif
                                    </div>

                                </div>
                            </fieldset>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category:
                            </label>

                            <select id="category_id" wire:model="category_id"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ old('type_id', $concern_details->category_id)
                                    ==$item->id
                                    ?'selected' : ''}}>
                                    {{ $item->category }}
                                </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="sm:col-span-2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Status:
                            </label>

                            <select wire:model="status"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                <option value="active" {{ old('status', $status)=='active' ?'selected' : '' }}>
                                    active
                                </option>
                                <option value="closed" {{ old('status', $status)=='closed' ?'selected' : '' }}>
                                    closed
                                </option>
                                <option value="pending" {{ old('status', $status)=='pending' ?'selected' : '' }}>
                                    pending
                                </option>
                            </select>
                            @error('status')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>

                        <div class="sm:col-span-2">
                            <label for="urgency" class="block text-sm font-medium text-gray-700">Is Urgent?
                            </label>

                            <select wire:model="urgency"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                <option value="no" {{ $urgency=='no' ?'selected' : 'Select one' }}>
                                    no
                                </option>
                                <option value="yes" {{ $urgency=='yes' ?'selected' : 'Select one' }}>
                                    yes
                                </option>

                            </select>
                            @error('urgency')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror

                        </div>


                        <div class="sm:col-span-6">
                            <label for="concern" class="block text-sm font-medium text-gray-700"> Details of the concern
                            </label>
                            <div class="mt-1">
                                <textarea id="concern" wire:model="concern" rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-700 rounded-md">
                                        {{ $concern_details->concern }}
                                        </textarea>
                                @error('concern')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="assessed_at" class="block text-sm font-medium text-gray-700">Concern assessed
                                on</label>
                            <input type="date" wire:model="assessed_at" autocomplete="assessed_at"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            @error('assessed_at')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 sm:col-span-2">
                            <div>
                                <label for="assessed_by_id" class="block text-sm font-medium text-gray-700">Assessed by:
                                </label>
                                <div class="mt-1">
                                    <select id="assessed_by_id" wire:model="assessed_by_id"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                        <option value="">Select one</option>
                                        @foreach ($users as $item)
                                        <option value="{{ $item->user_id }}" {{ old('assessed_by_id',
                                            $assessed_by_id)==$item->user_id
                                            ?'selected' : ''}}>
                                            {{ $item->user->name.'-'.$item->user->role->role }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('assessed_by_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>

                        </div>




                        <div class="col-span-6 sm:col-span-2">
                            <div>
                                <label for="assigned_to_id" class="block text-sm font-medium text-gray-700">Assign to:
                                </label>
                                <div class="mt-1">
                                    <select id="assigned_to_id" wire:model="assigned_to_id"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                        <option value="">Select one</option>
                                        @foreach ($users as $item)
                                        <option value="{{ $item->user_id }}" {{ old('assigned_to_id',
                                            $assigned_to_id)==$item->user_id
                                            ?'selected' : ''}}>
                                            {{ $item->user->name.'-'.$item->user->role->role }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('assigned_to_id')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>


                            </div>

                        </div>

                        <div class="col-span-3 sm:col-span-6">
                            <fieldset>
                                <div>
                                    <label for="initial_assessment"
                                        class="block text-sm font-medium text-gray-700">Results of the assessment

                                    </label>
                                    <div class="mt-1">
                                        <textarea wire:model="initial_assessment" rows="3"
                                            class="h-16 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                            placeholder="">{{ $subject }}</textarea>
                                        @error('initial_assessment')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                            </fieldset>
                        </div>


                        <div class="col-span-3 sm:col-span-6">
                            <fieldset>
                                <div>
                                    <label for="about" class="block text-sm font-medium text-gray-700">Course of action
                                        taken:
                                    </label>
                                    <div class="mt-1">
                                        <textarea wire:model="action_taken" rows="3"
                                            class="h-16 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                            placeholder="">{{ $action_taken }}</textarea>
                                        @error('action_taken')
                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                            </fieldset>
                        </div>



                    </div>
                </div>

                <div class="flex justify-end">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                        href="/property/{{ Session::get('property') }}/concern">
                        Cancel
                    </a>
                    <button type="submit"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                        <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Update
                    </button>
                </div>
            </div>


        </div>
    </div>
</form>