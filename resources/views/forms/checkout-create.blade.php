<form class="mt-6" method="post" wire:submit.prevent="processPayment()">
    <div class="grid grid-cols-12 gap-y-6 gap-x-4">
        <div class="col-span-full">
            <label for="name" class="block text-sm font-medium text-gray-700">Full Name
            </label>
            <div class="mt-1">
                <input type="text" wire:model.lazy="name" autocomplete="name" readonly
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
          <x-validation-error-component name='name' />
        </div>

        <div class="col-span-full">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address
            </label>
            <div class="mt-1">
                <input type="email" wire:model.lazy="email" autocomplete="email" readonly
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
          <x-validation-error-component name='email' />
        </div>

        <div class="col-span-full">
            <label for="mobile_number" class="block text-sm font-medium text-gray-700">Mobile Number
            </label>
            <div class="mt-1">
                <input type="text" wire:model.lazy="mobile_number" autocomplete="mobile_number" readonly
                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
           <x-validation-error-component name='mobile_number' />
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
   <x-validation-error-component name='unit_uuid' />
    <button type="submit"
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
