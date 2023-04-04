<form id="updateTenant" method="POST" wire:submit.prevent="submitForm()" class="w-full" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="h-full grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-8">

        <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="tenant" class="block text-xs font-medium text-gray-900">Full Name</label>
                <input type="text" wire:model.debounce.500ms.lazy="tenant"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">
                @error('tenant')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="status" class="block text-xs font-medium text-gray-900">Status</label>
                <select wire:model.debounce.500ms="status"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    <option value="active" {{ old('status', $status)=='active' ? 'selected' : 'selected' }}>
                        active
                    </option>
                    <option value="inactive" {{ old('status', $status)=='inactive' ? 'selected' : 'selected' }}>
                        inactive
                    </option>
                </select>
                @error('status')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="category" class="block text-xs font-medium text-gray-900">Category</label>
                <select wire:model.debounce.500ms="category"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    <option value="primary" {{ old('category', $category)=='primary' ? 'selected' : 'selected' }}>
                        primary
                    </option>
                    <option value="secondary" {{ old('category', $category)=='secondary' ? 'selected' : 'selected' }}>
                        secondary
                    </option>
                </select>
                @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-b-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="name" class="block text-xs font-medium text-gray-900">Tenant
                    Reference No</label>
                <input type="text" wire:model.debounce.500ms.lazy="bill_reference_no" readonly
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">

            </div>
        </div> --}}

        <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="mobile_number" class="block text-xs font-medium text-gray-900">Mobile #</label>
                <input type="text" wire:model.debounce.500ms.lazy="mobile_number"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">
                @error('mobile_number')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="email" class="block text-xs font-medium text-gray-900">Email
                </label>
                <input type="email" wire:model.debounce.500ms.lazy="email"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">
                @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="country_id" class="block text-xs font-medium text-gray-900">Country
                </label>
                <select wire:model.debounce.500ms="country_id"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    @foreach($countries as $country)
                    <option value="{{ $country->id }}" {{ old('country_id', $tenant_details->
                        country_id) == $country->id ? 'selected' : '' }}>
                        {{ $country->country }}
                    </option>
                    @endforeach
                </select>
                @error('country_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="province_id" class="block text-xs font-medium text-gray-900">Province</label>
                <select wire:model.debounce.500ms="province_id"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    @foreach($provinces as $province)
                    <option value="{{ $province->id }}" {{ old('province_id', $tenant_details->
                        province_id) == $province->id ? 'selected' : '' }}>
                        {{ $province->province }}
                    </option>
                    @endforeach
                </select>
                @error('province_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="city_id" class="block text-xs font-medium text-gray-900">City</label>
                <select wire:model.debounce.500ms="city_id"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city_id', $tenant_details->
                        city_id) == $city->id ? 'selected' : '' }}>
                        {{ $city->city }}
                    </option>
                    @endforeach
                </select>
                @error('city_id')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </div>
        </div> --}}

        <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="barangay" class="block text-xs font-medium text-gray-900">
                    Address</label>
                <input type="text" wire:model.debounce.500ms.lazy="barangay"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm"
                    placeholder="">
                @error('barangay')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-8">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="type" class="block text-xs font-medium text-gray-900">
                    Type</label>
                <select wire:model.debounce.500ms="type"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                    <option value="studying" {{ old('type', $type)=='studying' ? 'selected' : 'selected' }}>
                        studying
                    </option>
                    <option value="working" {{ old('type', $type)=='working' ? 'selected' : 'selected' }}>
                        working
                    </option>
                </select>

                @error('type')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>


        @if($type=='studying')
        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="course" class="block text-xs font-medium text-gray-900">Course</label>
                <input type="text" wire:model.debounce.500ms.lazy="course"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('course')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="year_level" class="block text-xs font-medium text-gray-900">Year Level</label>
                <input type="text" wire:model.debounce.500ms.lazy="year_level"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('year_level')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="school" class="block text-xs font-medium text-gray-900">School</label>
                <input type="text" wire:model.debounce.500ms.lazy="school"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('school')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="school_address" class="block text-xs font-medium text-gray-900">Address</label>
                <input type="text" wire:model.debounce.500ms.lazy="school_address"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('school_address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @else

        <div class="sm:col-span-4">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="occupation" class="block text-xs font-medium text-gray-900">Occupation</label>
                <input type="text" wire:model.debounce.500ms.lazy="occupation"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('occupation')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="employer" class="block text-xs font-medium text-gray-900">Employer</label>
                <input type="text" wire:model.debounce.500ms.lazy="employer"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('employer')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="sm:col-span-2">
            <div
                class="bg-white relative border border-gray-300 rounded-md rounded-t-none px-3 py-2 focus-within:z-10 focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
                <label for="employer_address" class="block text-xs font-medium text-gray-900">Address</label>
                <input type="text" wire:model.debounce.500ms.lazy="employer_address"
                    class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm">
                @error('employer_address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>

        @endif
    </div>

    <div class="mt-5 flex justify-end">
        <button type="button" data-modal-toggle="warning-destroy-tenant-modal"
            class="inline-flex items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            <i class="fa-solid fa-trash"></i>&nbsp; Delete
        </button>
        &nbsp;
        <button type="button" wire:loading.remove wire:click="submitForm()"
            class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
            <i class="fa-solid fa-check"></i> &nbsp; Update
        </button>
        <button type="button" wire:loading disabled wire:target="submitForm"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Loading...
        </button>
    </div>
</form>
@include('modals.warnings.destroy-tenant-modal')