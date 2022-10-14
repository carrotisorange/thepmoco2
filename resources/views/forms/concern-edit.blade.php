<form class="space-y-6" action="#" method="POST" wire:submit.prevent="submitForm()" class="w-full"
    enctype="multipart/form-data">
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <ol role="list" class="flex items-center space-x-4">
                    <li>
                        <div class="flex items-center">
                            <a href="{{ url()->previous() }}"><img class="h-5 w-auto"
                                    src="{{ asset('/brands/back-button.png') }}"></a>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="mt-5 px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-3xl font-bold text-gray-700 ">Concern Reference #: {{ $concern->reference_no }}
                        </h1>
                    </div>
                </div>


                <div class=" px-4 py-5 sm:rounded-lg sm:p-6">
                    <div class="md:grid md:grid-cols-6 md:gap-6">


                        <div class="col-span-3 sm:col-span-2">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Concern reported
                                on</label>
                            <input type="text" wire:model="created_at" autocomplete="created_at"
                                value="{{ Carbon\Carbon::parse($concern->created_at)->format('M d, Y') }}" readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Tenant</label>
                            <input type="text" wire:model="tenant_uuid" autocomplete="tenant_uuid"
                                value="{{ $concern->tenant->tenant }}" readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">Unit
                                No.</label>
                            <input type="text" wire:model="unit_uuid" autocomplete="unit_uuid"
                                value="{{ $concern->unit->building->building.' '.$concern->unit->unit }}" readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        </div>

                        <div class="col-span-4 sm:col-span-4">
                            <label for="email-address" class="block text-sm font-medium text-gray-700">
                                Summary of the concern</label>
                            <input type="text" autocomplete="subject" wire:model="unit_uuid"
                                readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        </div>

                        <div class="col-span-2 sm:col-span-2">
                            <fieldset>
                                <div>
                                    <label for="about" class="block text-sm font-medium text-gray-700">Image
                                        Uploaded:
                                    </label>
                                    <div class="mt-1">
                                        @if(!$concern->image == null)
                                        <a href="{{ asset('/storage/'.$concern->image) }}" target="_blank"
                                            class="text-indigo-600 hover:text-indigo-900">View
                                            Attachment</a>
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
                                <option value="{{ $item->id }}" {{ old('type_id', $concern->category_id) ==$item->id
                                    ?'selected' : ''}}>
                                    {{ $item->category }}
                                </option>
                                @endforeach
                            </select>

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

                        </div>

                        <div class="sm:col-span-2">
                            <label for="status" class="block text-sm font-medium text-gray-700">Is Urgent?
                            </label>

                            <select wire:model="status"
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                <option value="no" {{ old('urgency', $urgency)=='no' ?'selected' : '' }}>
                                    no
                                </option>
                                <option value="yes" {{ old('urgency', $urgency)=='yes' ?'selected' : '' }}>
                                    yes
                                </option>

                            </select>

                        </div>


                        <div class="sm:col-span-6">
                            <label for="concern" class="block text-sm font-medium text-gray-700"> Details of the concern
                            </label>
                            <div class="mt-1">
                                <textarea id="concern" wire:model="concern" rows="3"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-700 rounded-md">
                                        {{ $concern->concern }}
                                        </textarea>
                            </div>

                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <label for="first-name" class="block text-sm font-medium text-gray-700">Concern assessed
                                on</label>
                            <input type="date" wire:model="assessed_at" autocomplete="created_at"
                                value="{{ Carbon\Carbon::parse($concern->created_at)->format('M d, Y') }}" readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
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
                                </div>


                            </div>

                        </div>


                        <div class="col-span-3 sm:col-span-6">
                            <fieldset>
                                <div>
                                    <label for="about" class="block text-sm font-medium text-gray-700">Initial 
                                        assessments
                                    </label>
                                    <div class="mt-1">
                                        <textarea wire:model="initial_assessment" rows="3"
                                            class="h-16 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border border-gray-700 rounded-md"
                                            placeholder="">{{ $action_taken }}</textarea>
                                    </div>

                                </div>
                            </fieldset>
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
                                        <option value="{{ $item->user_id }}" {{ old('assigned_to_id', $assigned_to_id)==$item->user_id
                                            ?'selected' : ''}}>
                                            {{ $item->user->name.'-'.$item->user->role->role }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                        
                        
                            </div>
                        
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
                                    </div>

                                </div>
                            </fieldset>
                        </div>



                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="button"
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
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
                        Respond
                    </button>
                </div>
            </div>


        </div>
    </div>
</form>