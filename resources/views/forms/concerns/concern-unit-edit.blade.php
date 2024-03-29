<form class="space-y-6" action="#" method="POST" wire:submit.prevent="submitForm()" class="w-full"
    enctype="multipart/form-data">
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">

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
                            <label for="created_at" class="block text-sm font-medium text-gray-700">Date reported
                                </label>
                            <input type="date" wire:model="created_at" autocomplete="created_at"
                                value="{{ Carbon\Carbon::parse($concern_details->created_at)->format('M d, Y') }}"
                                readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                         <x-validation-error-component name='created_at' />
                        </div>

                        <div class="col-span-3 sm:col-span-3">
                            <label for="unit_uuid" class="block text-sm font-medium text-gray-700">Unit
                                No.</label>
                         <x-validation-error-component name='unit_uuid' />
                            <input type="text" wire:model="unit_uuid" autocomplete="unit_uuid"
                                value="{{$concern_details->unit->unit }}" readonly
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        </div>

                        <div class="col-span-4 sm:col-span-4">
                            <label for="subject" class="block text-sm font-medium text-gray-700">
                                Subject</label>
                           <x-validation-error-component name='subject' />
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
                          <x-validation-error-component name='category_id' />

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
                           <x-validation-error-component name='status' />

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
                          <x-validation-error-component name='urgency' />

                        </div>


                        <div class="sm:col-span-6">
                            <label for="concern" class="block text-sm font-medium text-gray-700"> Details of the concern
                            </label>
                            <div class="mt-1">
                                <textarea id="concern" wire:model="concern" rows="20"
                                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block h-96 w-full sm:text-sm border border-gray-700 rounded-md">
                                        {{ $concern_details->concern }}
                                        </textarea>
                              <x-validation-error-component name='concern' />
                            </div>

                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label for="assessed_at" class="block text-sm font-medium text-gray-700">Concern assessed
                                on</label>
                            <input type="date" wire:model="assessed_at" autocomplete="assessed_at"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                          <x-validation-error-component name='assessed_at' />
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
                                  <x-validation-error-component name='assessed_by_id' />
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
                                  <x-validation-error-component name='assigned_to_id' />
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
                                     <x-validation-error-component name='initial_assessment' />
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
                                      <x-validation-error-component name='action_taken' />
                                    </div>

                                </div>
                            </fieldset>
                        </div>



                    </div>
                </div>

                <div class="flex justify-end">
                    <x-button class="bg-red-500" onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/concern'">
                        Cancel
                    </x-button>

                    <x-button type="submit">
                        Update
                    </x-button>
                </div>
            </div>


        </div>
    </div>
</form>
