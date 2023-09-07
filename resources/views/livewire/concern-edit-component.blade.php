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
                        <label for="created_at" class="block text-sm font-medium text-gray-700">Date reported
                           </label>
                        <input type="date" wire:model="created_at" autocomplete="created_at"
                           value="{{ Carbon\Carbon::parse($concern_details->created_at)->format('M d, Y') }}" readonly
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('created_at')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>
   
                     <div class="col-span-3 sm:col-span-2">
                        <label for="tenant" class="block text-sm font-medium text-gray-700">Tenant</label>
                        <input type="text" wire:model="tenant" autocomplete="tenant"
                           value="{{ $tenant }}" readonly
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('tenant')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>
                     
   
                     <div class="col-span-3 sm:col-span-2">
                        <label for="unit" class="block text-sm font-medium text-gray-700">Unit
                           No.</label>
                        @error('unit')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <input type="text" wire:model="unit" autocomplete="unit"
                           value="{{$unit }}" readonly
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                     </div>

                     <div class="col-span-3 sm:col-span-3">
                        <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile</label>
                        <input type="text" wire:model="mobile_number" autocomplete="mobile_number" 
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('mobile_number')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>

                     <div class="col-span-3 sm:col-span-3">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model="email" autocomplete="email" 
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>
   
                     <div class="col-span-4 sm:col-span-6">
                        <label for="subject" class="block text-sm font-medium text-gray-700">
                           Subject</label>
                        @error('subject')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                        <input type="text" autocomplete="subject" wire:model="subject" readonly
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                     </div>
   
                     <div class="col-span-3 sm:col-span-6">
                        <fieldset>
                           <div>
                              <label for="image" class="block text-sm font-medium text-gray-700">Tenant
                                 Attachment
                              </label>
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
   
                     <div class="col-span-3 sm:col-span-3">
                        <label for="availability_date" class="block text-sm font-medium text-gray-700">Available
                           Date
                        </label>
                        <input type="date" wire:model="availability_date" autocomplete="availability_date"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('availability_date')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>
   
                     <div class="col-span-3 sm:col-span-3">
                        <label for="availability_time" class="block text-sm font-medium text-gray-700">Available
                           Time
                        </label>
                        <input type="time" wire:model="availability_time" autocomplete="availability_time"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('availability_time')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>
   
                     <div class="col-span-3 sm:col-span-2">
                        <label for="assessed_at" class="block text-sm font-medium text-gray-700">Date Assessed</label>
                        <input type="date" wire:model="assessed_at" autocomplete="assessed_at"
                           class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                        @error('assessed_at')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                     </div>
   
                   
                     <div class="col-span-6 sm:col-span-2">
                        <div>
                           <label for="assessed_by_id" class="block text-sm font-medium text-gray-700">Assessed by
                           </label>
                           <div class="mt-1">
                              @cannot('tenant')
                              <select id="assessed_by_id" wire:model="assessed_by_id"
                                 class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                 <option value="">Select one</option>
                                 @foreach ($users as $item)
                                 <option value="{{ $item->user_id }}" {{ old('assessed_by_id', $assessed_by_id)==$item->
                                    user_id
                                    ?'selected' : ''}}>
                                    {{ $item->user->name.'-'.$item->user->role->role }}
                                 </option>
                                 @endforeach
                              </select>
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
                           <label for="assigned_to_id" class="block text-sm font-medium text-gray-700">Assign to
                           </label>
                           <div class="mt-1">
                              @cannot('tenant')
                              <select id="assigned_to_id" wire:model="assigned_to_id"
                                 class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                                 <option value="">Select one</option>
                                 @foreach ($users as $item)
                                 <option value="{{ $item->user_id }}" {{ old('assigned_to_id', $assigned_to_id)==$item->
                                    user_id
                                    ?'selected' : ''}}>
                                    {{ $item->user->name.'-'.$item->user->role->role }}
                                 </option>
                                 @endforeach
                              </select>
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
                              <label for="initial_assessment" class="block text-sm font-medium text-gray-700">Results of
                                 the assessment
   
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
   
   
                     <div class="col-span-3 sm:col-span-6">
                        <fieldset>
                           <div>
                              <label for="action_taken_image" class="block text-sm font-medium text-gray-700">Personnel Attachment
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
                  <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline" wire:loading.remove
                     href="/property/{{ Session::get('property_uuid') }}/concern">
                     Cancel
                  </a>
                  <button type="submit" wure:loading.remove
                     class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
   
   
                     Update
                  </button>
                  <button type="button" disabled wire:loading
                     class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  
                  
                     Loading...
                  </button>
               </div>
               @endcannot
            </div>
   
            </form>
         </div>
         @include('layouts.notifications')
      </div>
   
</div>