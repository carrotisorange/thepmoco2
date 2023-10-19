<style>
   .divtext {
      border: ridge 2px;
      padding: 5px;
      width: 20em;
      min-height: 5em;
      overflow: auto;
   }
</style>
<div>

   <div class="mt-8">
      <div class="max-full mx-auto sm:px-6">
         <form class="space-y-6" wire:submit.prevent="submitForm()" class="w-full">
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


                     <div class="col-span-3 sm:col-span-2">
                        <x-label for="created_at">Date reported
                        </x-label>
                        <x-form-input type="date" wire:model="created_at" autocomplete="created_at"
                           value="{{ Carbon\Carbon::parse($concern_details->created_at)->format('M d, Y') }}"
                           readonly />
                        @error('created_at')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>

                     <div class="col-span-3 sm:col-span-2">
                        <x-label for="tenant">Tenant</x-label>
                        <x-form-input type="text" wire:model="tenant" autocomplete="tenant" value="{{ $tenant }}"
                           readonly />

                     </div>


                     <div class="col-span-3 sm:col-span-2">
                        <x-label for="unit">Unit
                           No.</x-label>

                        <x-form-input type="text" wire:model="unit" autocomplete="unit" value="{{$unit }}" readonly />
                     </div>

                     <div class="col-span-3 sm:col-span-3">
                        <x-label for="mobile_number">Mobile</x-label>
                        <x-form-input type="text" wire:model="mobile_number" autocomplete="mobile_number" />
                        @error('mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>

                     <div class="col-span-3 sm:col-span-3">
                        <x-label for="email">Email</x-label>
                        <x-form-input type="email" wire:model="email" autocomplete="email" />
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>

                     <div class="col-span-4 sm:col-span-6">
                        <x-label for="subject">
                           Subject</x-label>

                        <x-form-input type="text" autocomplete="subject" wire:model="subject" readonly />
                        @error('subject')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>

                     <div class="col-span-3 sm:col-span-6">
                        <fieldset>
                           <div>
                              <x-label for="image">Tenant
                                 Attachment
                              </x-label>
                              <div
                                 class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                 <div class="space-y-1 text-center">

                                    <div class="flex text-sm text-gray-600">
                                       <label for="image"
                                          class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">


                                          {{-- <input id="image" type="file" class="sr-only" wire:model="image"> --}}



                                       </label>
                                       @if(!$concern_details->image == null)
                                       &nbsp;

                                       <a href="{{ asset('/storage/'.$concern_details->image) }}" target="_blank"
                                          class="text-indigo-600 hover:text-indigo-900">View
                                          Attachment</a>

                                       @else
                                       <span>No attachment</span>
                                       @endif

                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                                 </div>


                              </div>


                           </div>
                        </fieldset>
                     </div>

                     <div class="sm:col-span-2">
                        <x-label for="category_id">Category:
                        </x-label>

                        <x-form-select id="category_id" wire:model="category_id">
                           @foreach ($categories as $item)
                           <option value="{{ $item->id }}" {{ old('type_id', $concern_details->category_id)
                              ==$item->id
                              ?'selected' : ''}}>
                              {{ $item->category }}
                           </option>
                           @endforeach
                        </x-form-select>
                        @error('category_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                     </div>

                     <div class="sm:col-span-2">
                        <x-label for="status">Status:
                        </x-label>

                        <x-form-select wire:model="status">
                           <option value="active" {{ old('status', $status)=='active' ?'selected' : '' }}>
                              active
                           </option>
                           <option value="closed" {{ old('status', $status)=='closed' ?'selected' : '' }}>
                              closed
                           </option>
                           <option value="pending" {{ old('status', $status)=='pending' ?'selected' : '' }}>
                              pending
                           </option>
                        </x-form-select>
                        @error('status')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                     </div>

                     <div class="sm:col-span-2">
                        <x-label for="urgency">Is Urgent?
                        </x-label>

                        <x-form-select wire:model="urgency">
                           <option value="no" {{ $urgency=='no' ?'selected' : 'Select one' }}>
                              no
                           </option>
                           <option value="yes" {{ $urgency=='yes' ?'selected' : 'Select one' }}>
                              yes
                           </option>

                        </x-form-select>
                        @error('urgency')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror

                     </div>


                     <div class="sm:col-span-6">
                        <x-label for="concern"> Details of the concern
                        </x-label>
                        <div class="mt-1">
                           <x-form-textarea id="concern" wire:model="concern" row="20">
                              {{ $concern_details->concern }}
                           </x-form-textarea>
                           @error('concern')
                           <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                           @enderror
                        </div>

                     </div>

                     <div class="col-span-3 sm:col-span-3">
                        <x-label for="availability_date" class="block text-sm font-medium text-gray-700">Available
                           Date
                        </x-label>
                        <x-form-input type="date" wire:model="availability_date" autocomplete="availability_date" />
                        @error('availability_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>

                     <div class="col-span-3 sm:col-span-3">
                        <x-label for="availability_time">Available
                           Time
                        </x-label>
                        <x-form-input type="time" wire:model="availability_time" autocomplete="availability_time" />
                        @error('availability_time')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>

                     <div class="col-span-3 sm:col-span-2">
                        <x-label for="assessed_at">Date Assessed</x-label>
                        <x-form-input type="date" wire:model="assessed_at" autocomplete="assessed_at" />
                        @error('assessed_at')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>


                     <div class="col-span-6 sm:col-span-2">
                        <div>
                           <x-label for="assessed_by_id">Assessed by
                           </x-label>
                           <div class="mt-1">
                              @cannot('tenant')
                              <x-formselect id="assessed_by_id" wire:model="assessed_by_id">
                                 <option value="">Select one</option>
                                 @foreach ($users as $item)
                                 <option value="{{ $item->user_id }}" {{ old('assessed_by_id', $assessed_by_id)==$item->
                                    user_id
                                    ?'selected' : ''}}>
                                    {{ $item->user->name.'-'.$item->user->role->role }}
                                 </option>
                                 @endforeach
                              </x-formselect>
                              @error('assessed_by_id')
                              <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                              @enderror

                              @else
                              @if($assessed_by_id)
                              {{ App\Models\User::find($assessed_by_id)->name }}
                              @else
                              Not yet assigned
                              @endif
                              @endcannot
                           </div>


                        </div>

                     </div>




                     <div class="col-span-6 sm:col-span-2">
                        <div>
                           <x-label for="assigned_to_id">Assign to
                           </x-label>
                           <div class="mt-1">
                              @cannot('tenant')
                              <x-form-select id="assigned_to_id" wire:model="assigned_to_id">
                                 <option value="">Select one</option>
                                 @foreach ($users as $item)
                                 <option value="{{ $item->user_id }}" {{ old('assigned_to_id', $assigned_to_id)==$item->
                                    user_id
                                    ?'selected' : ''}}>
                                    {{ $item->user->name.'-'.$item->user->role->role }}
                                 </option>
                                 @endforeach
                              </x-form-select>
                              @error('assigned_to_id')
                              <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                              @enderror
                              @else
                              @if($assigned_to_id)
                              {{ App\Models\User::find($assigned_to_id)->name }}
                              @else
                              Not yet assigned
                              @endif
                              @endcannot
                           </div>


                        </div>

                     </div>


                     <div class="col-span-3 sm:col-span-6">
                        <fieldset>
                           <div>
                              <x-label for="initial_assessment">Results of
                                 the assessment

                              </x-label>
                              <div class="mt-1">
                                 <x-form-textarea wire:model="initial_assessment" rows="3">{{ $subject }}
                                 </x-form-textarea>
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
                              <x-label for="about">Course of action
                                 taken:
                              </x-label>
                              <div class="mt-1">
                                 <x-form-textarea wire:model="action_taken" rows="3">{{ $action_taken }}
                                 </x-form-textarea>
                                 @error('action_taken')
                                 <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                 @enderror
                              </div>

                           </div>
                        </fieldset>
                     </div>


                     <div class="col-span-3 sm:col-span-6">
                        <fieldset>
                           <div>
                              <label for="action_taken_image" class="block text-sm font-medium text-gray-700">Personnel
                                 Attachment
                              </label>
                              <div
                                 class="bg-white mt-1 flex justify-center  border border-gray-700 border-dashed rounded-md">
                                 <div class="space-y-1 text-center">

                                    <div class="flex text-sm text-gray-600">
                                       <label for="action_taken_image"
                                          class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                          <span>Attach a file</span>

                                          <input id="action_taken_image" type="file" class="sr-only"
                                             wire:model="action_taken_image">



                                       </label>
                                       @if(!$concern_details->action_taken_image == null)
                                       &nbsp; or &nbsp;

                                       <a href="{{ asset('/storage/'.$concern_details->action_taken_image) }}"
                                          target="_blank" class="text-indigo-600 hover:text-indigo-900">View
                                          Attachment</a>
                                       @endif

                                    </div>
                                    <p class="text-xs text-gray-500">PNG, JPG, DOCX, PDF up to 10MB</p>

                                 </div>


                              </div>
                              @error('action_taken_image')
                              <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                              @else
                              @if ($action_taken_image)
                              <p class="text-green-500 text-xs mt-2">File has been attached. <i
                                    class="fa-solid fa-circle-check"></i></p>
                              @endif
                              @enderror

                           </div>
                        </fieldset>
                     </div>
                  </div>
               </div>

               @cannot('tenant')
               <div class="flex justify-end">
                  <x-button class="bg-red-500"
                     onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/concern'">
                     Cancel
                  </x-button>
                  <x-button type="submit">
                     Update
                  </x-button>
               </div>
               @endcannot
            </div>

         </form>
      </div>
   </div>
</div>