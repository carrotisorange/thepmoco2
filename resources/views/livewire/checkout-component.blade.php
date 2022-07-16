<div>
    @include('layouts.notifications')
    <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
        <div class="flex flex-col md:w-full">
            <h2 class="mb-4 font-bold md:text-xl text-heading ">Customer Information
            </h2>
            <form class="justify-center w-full mx-auto" method="post" wire:submit.prevent="submitForm">
                <div class="">
                    <div class="space-x-0 lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/2">
                            <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">
                                Full Name</label>
                            <input name="firstName" type="text" value="{{ auth()->user()->name }}"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                readonly>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label for="Email" class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                            <input name="Last Name" type="text" value="{{ auth()->user()->email }}"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                readonly>
                        </div>
                    </div>
                    <div class="mt-4">

                    </div>
                    <div class="mt-4">
                        <div class="w-full">
                            <label for="Address" class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                            <textarea
                                class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                wire:model="address" cols="20" rows="4" placeholder="Address"></textarea>
                            @error('address')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="space-x-0 lg:flex lg:space-x-4">
                        <div class="w-full lg:w-1/2">
                            <label for="city" class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                            <input wire:model="city" type="text" placeholder="City"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            @error('city')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="w-full lg:w-1/2 ">
                            <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                                Zip Code</label>
                            <input wire:model="zip_code" type="number"  min="1" placeholder="Post Code"
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                            @error('zip_code')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <h2 class="mb-4 font-bold md:text-xl text-heading ">Plan Information
                        </h2>
                    </div>

                    <div class="mt-4">
                        <div class="w-full">
                            <label for="Address" class="block mb-3 text-sm font-semibold text-gray-500">Select your
                                plan</label>
                            <select
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                wire:model="plan_id">
                                @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}" {{ $plan_id==$plan->id ? 'selected' : 'selected'
                                    }}> {{
                                    $plan->plan }}
                                </option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                </div>

        </div>
        <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
            <div class="pt-12 md:pt-0 2xl:ps-4">
                <h2 class="text-xl font-bold">Purchase Summary
                </h2>
                <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Plan: <span class="ml-2">{{ $selected_plan->plan }}</span></div>
                <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Description: <span class="ml-2">{{ $selected_plan->description }}</span></div>
                <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Price: Php <span class="ml-2">{{ number_format($selected_plan->price, 2) }}</span></div>
                {{-- <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Shipping Tax<span class="ml-2">$10</span></div>
                <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Total<span class="ml-2">$50.00</span></div> --}}
            </div>
            <div class="mt-4">
                <button class="w-full px-6 py-2 text-purple-200 bg-purple-600 hover:bg-purple-900" wire:loading.remove
                    wire:click="submitForm()">
                    Process
                </button>
                <div wire:loading wire:target="submitForm">
                    <span class="text-center">Processing</span>
                </div>
                {{-- <svg wire:loading class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>

                <button class="">Process</button> --}}
            </div>
        </div>
    </div>
    </form>
</div>