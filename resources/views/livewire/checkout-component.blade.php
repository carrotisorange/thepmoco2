<div>
    @include('layouts.notifications')
    <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
        <div class="flex flex-col md:w-full">
            <h2 class="mb-4 font-bold md:text-xl text-heading ">Customer Information
            </h2>
            <form class="justify-center w-full mx-auto" method="post" wire:submit.prevent="payNow()">
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
                            <input wire:model="zip_code" type="number" min="1" placeholder="Post Code"
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
                                {{-- @foreach ($plans as $plan)
                                <option value="{{ $plan->id }}" {{ $plan_id==$plan->id ? 'selected' : 'selected'
                                    }}> {{
                                    $plan->plan }}
                                </option>
                                @endforeach --}}
                                @if($selected_checkout_option->id == '1')
                                   @foreach ($plans as $plan)
                                    <option value="{{ $plan->id }}" {{ $plan_id==$plan->id ? 'selected' : 'selected'
                                        }}> {{
                                        $plan->plan }}
                                    </option>
                                    @endforeach
                                @else
                                    @if($selected_plan->id == '1')
                                    <option value="1">basic</option>
                                    @elseif($selected_plan->id == '2')
                                    <option value="2">advanced</option>
                                    @else
                                    <option value="3">premium</option>
                                    @endif
                                @endif
                            </select>

                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="w-full">
                            <label for="Address" class="block mb-3 text-sm font-semibold text-gray-500">Select your
                                checkout option</label>
                            <select
                                class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                wire:model="checkout_option">
                                {{-- @foreach ($checkout_options as $checkout_option) --}}
                                @if($selected_checkout_option->id == '1')
                                <option value="1">Pay Now</option>
                                @else
                                <option value="1">Pay After 30 Days</option>
                                @endif
                                {{-- @endforeach --}}
                            </select>
                        </div>
                    </div>


                </div>

        </div>
        <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
            <div class="pt-12 md:pt-0 2xl:ps-4">
                <h2 class="text-xl font-bold">Purchase Summary
                </h2>
                <table class="mt-5 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="bg-gray-50">
                        <tr>
                            <x-th>Plan</x-th>
                            <x-td>{{ $selected_plan->plan }}</x-td>
                        </tr>
                        <tr>
                            <x-th>Description</x-th>
                            <x-td>{{ $selected_plan->description }}</x-td>
                        </tr>
                        <tr>
                            <x-th>Price</x-th>
                            <x-td>{{ number_format($selected_plan->price, 2) }}</x-td>
                        </tr>
                        <tr>
                            <x-th>Payment Policy</x-th>
                            <x-td>{{ $selected_checkout_option->policy }}</x-td>
                        </tr>
                    </thead>
                </table>
                {{-- <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    <span class="ml-2">The process page is still being developed. This is just a simulation. Your card
                        won't be charged.</span>
                </div> --}}
                {{-- <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Description: <span class="ml-2">{{ $selected_plan->description }}</span></div>
                <div
                    class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                    Payment Policy: Php <span class="ml-2">{{ $selected_checkoutoption->policy }}</span></div>
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
                <button class="w-full px-6 py-2 text-purple-200 bg-purple-900 hover:bg-purple-1200" wire:loading.remove
                    wire:click="payNow">
                    Process
                </button>
                <button
                    class="w-full px-6 py-2 text-purple-200 bg-purple-900 hover:bg-purple-1200 opacity-10 cursor-not-allowed"
                    wire:loading wire:target="payNow" disabled>
                    Processing...
                </button>

            </div>

        </div>
    </div>
    </form>
</div>