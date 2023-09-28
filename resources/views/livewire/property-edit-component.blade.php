<div>
    @include('layouts.notifications')
   <form class="space-y-6" method="POST" wire:submit.prevent="submitForm()" enctype="multipart/form-data">

    <div class=" space-y-8 divide-y divide-gray-200 sm:space-y-5">
        <div>
            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Property
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-input type="text" name="property" id="property" autocomplete="property"
                                wire:model.lazy="property" value="{{old('property', $property)}}"/>
                        </div>
                     
                    </div>

                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="registered_tin" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Registered TIN
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-input type="text" name="registered_tin" id="registered_tin" autocomplete="registered_tin" wire:model.lazy="registered_tin"
                                value="{{old('registered_tin', $registered_tin)}}"/>
                        </div>
                    
                    </div>
                
                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Ownership
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-select name="ownership" id="ownership" autocomplete="ownership" wire:model.lazy="ownership">
                                <option value="Single owned" {{ old('ownership')=='Single owned' ? 'selected'
                                    : 'Select one' }}>
                                    Single
                                    owned</option>
                                <option value="Multiple owned" {{ old('ownership')=='Multiple owned' ? 'selected'
                                    : 'Select one' }}>
                                    Multiple
                                    owned</option>
                            </x-select>
                        </div>
                      
                    </div>

                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Type
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-select name="type_id" id="type_id" disabled autocomplete="type_id" wire:model.lazy="type_id">
                                @foreach($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id', $property_details->type_id) ==
                                    $type->id ?
                                    'selected' : ''
                                    }}>{{ $type->type }}</option>
                                @endforeach
                            </x-select>
                        </div>
                      
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Email
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-input type="email" name="email" id="email" autocomplete="email"
                                value="{{old('email', $email)}}" wire:model.lazy="email"/>
                        </div>
                       
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Mobile
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-input type="text" name="mobile" id="mobile" autocomplete="mobile"
                                value="{{old('mobile', $mobile)}}" wire:model.lazy="mobile"/>
                        </div>
                     
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="telephone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Telephone
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-input type="text" name="telephone" id="mobile" autocomplete="telephone"
                                value="{{old('telephone', $telephone)}}" wire:model.lazy="telephone"/>
                        </div>
                      
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="facebook_page" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Facebook Page
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-input type="text" name="facebook_page" id="facebook_page" autocomplete="facebook_page"
                                value="{{old('facebook_page', $facebook_page)}}" wire:model.lazy="facebook_page"/>
                        </div>
                      
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="note_to_transient" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Notes to the welcome email to guest
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-input type="text" name="note_to_transient" id="note_to_transient"
                                autocomplete="note_to_transient"
                                value="{{old('note_to_transient', $note_to_transient)}}"
                                wire:model.lazy="note_to_transient"/>
                        </div>
                    
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="note_to_bill" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Notes to the Statements of Account (SOA) (export, send through email)
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-input type="text" name="note_to_bill" id="note_to_bill" autocomplete="note_to_bill"
                                value="{{old('note_to_bill', $note_to_bill)}}" wire:model.lazy="note_to_bill"/>
                        </div>
                     
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Country
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-select name="country_id" id="country_id" autocomplete="country_id"
                                wire:model.lazy="country_id">

                                @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{ old('country_id', $country_id)==$country->
                                    id?'selected':
                                    'Select one' }}>{{ $country->country }}</option>
                                @endforeach
                            </x-select>
                        </div>
                       
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Region
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-select name="province_id" id="province_id" autocomplete="province_id"
                                wire:model.lazy="province_id">
                                <option value="">Select one</option>
                                @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ old('province_id')===$province->
                                    id?
                                    'selected': 'Select one'
                                    }}>{{ $province->province }}</option>
                                @endforeach
                            </x-select>
                        </div>
                     
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="ownership" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        City
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-select name="city_id" id="city_id" autocomplete="city_id" wire:model.lazy="city_id">
                                <option value="">Select one</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}" {{ old('city_id'. $city_id)===$city->id?
                                    'selected': 'Select one'
                                    }}>{{ $city->city }}</option>
                                @endforeach
                            </x-select>
                        </div>
                      
                    </div>

                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Barangay
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-input type="text" name="barangay" id="barangay" autocomplete="barangay"
                                value="{{old('barangay', $barangay)}}" wire:model.lazy="barangay"/>
                        </div>
                      
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="status" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Status
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex rounded-md shadow-sm">
                            <x-select name="status" id="ownership" autocomplete="status" wire:model.lazy="status">
                                <option value="active" {{ old('active')=='active' ? 'selected' : 'Select one' }}>
                                    Active</option>
                                <option value="Inactive" {{ old('inactive')=='inactive' ? 'selected' : 'Select one' }}>
                                    Inactive
                                </option>
                            </x-select>
                        </div>
                      
                    </div>

                </div>

                 <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="thumbnail" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Thumbnail
                    </label>
                    <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                        <div class="space-y-1 text-center">
                    
                            <div class="flex text-sm text-gray-600">
                    
                                <label for="thumbnail"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="thumbnail" name="thumbnail" type="file" wire:model="thumbnail"
                                        class="sr-only">
                                </label>
                    
                    
                                @if($property_details->thumbnail)
                                &nbsp; or &nbsp;
                                <a target="_blank"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500"
                                    href="{{ asset('/storage/'.$property_details->thumbnail) }}">View attachment</a>
                    
                                @endif
                    
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <p class="text-center">
                                @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @else
                            @if($thumbnail)
                            <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                            @endif
                            @enderror
                            </p>
                        </div>
                    </div>  

                </div>
                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Title
                    </label>
                    <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                        <div class="space-y-1 text-center">
                    
                            <div class="flex text-sm text-gray-600">
                    
                                <label for="title"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                    <span>Upload a file</span>
                                    <input id="title" name="title" type="file" wire:model="title"
                                        class="sr-only">
                                </label>
                    
                    
                                @if($property_details->title)
                                &nbsp; or &nbsp;
                                <a target="_blank"
                                    class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500"
                                    href="{{ asset('/storage/'.$property_details->title) }}">View attachment</a>
                    
                                @endif
                    
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <p class="text-center">
                                @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @else
                            @if($title)
                            <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                            @endif
                            @enderror
                            </p>
                        </div>
                    </div>  

                </div>


               <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="business_permit" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                    Business Permit
                </label>
                <div class="mt-2 flex justify-center rounded-md border-2 border-gray-300">
                    <div class="space-y-1 text-center">
            
                        <div class="flex text-sm text-gray-600">
            
                            <label for="business_permit"
                                class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                                <span>Upload a file</span>
                                <input id="business_permit" name="business_permit" type="file" wire:model="business_permit" class="sr-only">
                            </label>
            
            
                            @if($property_details->business_permit)
                            &nbsp; or &nbsp;
                            <a target="_blank"
                                class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500"
                                href="{{ asset('/storage/'.$property_details->business_permit) }}">View attachment</a>
            
                            @endif
            
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                        <p class="text-center">
                            @error('business_permit')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @else
                        @if($business_permit)
                        <p class="text-green-500 text-xs mt-2">File has been uploaded!</p>
                        @endif
                        @enderror
                        </p>
                    </div>
                </div>
            
            </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                        href="/property/">
                        Cancel
                    </a>
                    <x-button type="submit" wire:click="submitForm()" id="create-form">
                        Update
                    </x-button>
                </div>
            </div>
</form>
</div>