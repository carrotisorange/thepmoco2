<form class="mt-6" method="post" wire:submit.prevent="processPayment()">
    <div class="grid grid-cols-12 gap-y-6 gap-x-4">
        <div class="col-span-full">
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name 
            </label>
            <div class="mt-1">
                <input type="text" wire:model.lazy="name" autocomplete="name" readonly
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-full">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address
            </label>
            <div class="mt-1">
                <input type="email" wire:model.lazy="email" autocomplete="email" readonly
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-full">
            <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile Number
            </label>
            <div class="mt-1">
                <input type="text" wire:model.lazy="mobile_number" autocomplete="mobile_number" readonly
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            @error('mobile_number')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="col-span-full">
            <label for="expiration-date" class="block text-sm font-medium text-gray-700">Select your
                plan
            </label>
            <div class="mt-1">
                <select type="text" name="plan_id" id="plan_id" wire:model="plan_id" autocomplete="cc-exp"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    {{-- @if($selected_checkout_option->id == '2') --}}
                    @if($plan_id == '4')
                    <option value="4" selected> Professional </option>
                    @else
                    @foreach ($plans as $plan)

                    <option value="{{ $plan->id }}" {{ $plan_id==$plan->id ? 'selected' : 'selected'
                        }}> {{ $plan->plan }} </option>

                    @endforeach
                    @endif


                </select>
            </div>
        </div>
        <div class="col-span-full">
            <label for="expiration-date" class="block text-sm font-medium text-gray-700">Select your
                plan
                duration
            </label>
            <div class="mt-1">
                <select type="text" name="checkout_option" id="checkout_option" wire:model="checkout_option"
                    autocomplete="cc-exp"
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @if($plan_id == '4')
                    <option value="1" selected> Billed every month </option>
                    @else
                    @foreach ($checkout_options as $item)
                    {{-- @if($item->id == '2') --}}
                    <option value="{{ $item->id }}" {{ $selected_checkout_option->id==$item->id ?
                        'selected' : 'selected' }}> {{ $item->option }} </option>
                    {{-- @endif --}}
                    @endforeach
                    @endif
                </select>
            </div>
        </div>
    </div>
    {{-- <div class="border-gray-200 pt-5">
        <fieldset>
            <label for="expiration-date" class="block text-sm font-medium text-gray-700">Select your
                duration
            </label>
            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                @foreach ($checkout_options as $checkout_option)
                <label class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                    <input type="radio" name="checkout_option" value="{{ $checkout_option->id }}" class="sr-only"
                        aria-labelledby="delivery-method-0-label"
                        aria-describedby="delivery-method-0-description-0 delivery-method-0-description-1">
                    <div class="flex-1 flex">
                        <div class="flex flex-col">
                            <span id="delivery-method-0-label" class="block text-sm font-medium text-gray-900">
                                {{ $checkout_option->option }}
                            </span>
                            <span id="delivery-method-0-description-0"
                                class="mt-1 flex items-center text-sm text-gray-500">
                                {{ $checkout_option->policy }}
                            </span>
                            <span id="delivery-method-0-description-1" class="mt-6 text-sm font-medium text-gray-900">
                                ₱{{
                                number_format($selected_plan->price-($selected_plan->price*$checkout_option->discount),
                                2) }}/month
                            </span>
                        </div>
                    </div>

                    <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                        fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>

                    <div class="absolute -inset-px rounded-lg border-2 pointer-events-none" aria-hidden="true"></div>
                </label>
                @endforeach
            </div>
        </fieldset>
    </div> --}}


    <button type="submit" wire:loading.remove wire:click="processPayment()"
        class="w-full mt-6 bg-purple-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-sm font-medium text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Pay
        ₱{{
        number_format(($selected_plan->price-($selected_plan->price*$selected_checkout_option->discount))*$selected_checkout_option->policy,2)
        }}</button>

    <button type="submit" wire:loading wire:target="processPayment" disabled
        class="w-full mt-6 bg-purple-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Processing...</button>

    <p class="flex justify-center text-sm font-medium text-gray-500 mt-6">
        <!-- Heroicon name: solid/lock-closed -->
        <svg class="w-5 h-5 text-gray-400 mr-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                clip-rule="evenodd" />
        </svg>
        Payment details are secured.
    </p>
</form>