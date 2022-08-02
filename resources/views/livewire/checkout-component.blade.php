<div>
    <div class="bg-white">
        <main class="lg:min-h-screen lg:overflow-hidden lg:flex lg:flex-row-reverse">
            <h1 class="sr-only">Checkout</h1>

            <!-- Mobile order summary -->
            <section aria-labelledby="order-heading" class="bg-gray-50 px-4 py-6 sm:px-6 lg:hidden">
                <div class="max-w-lg mx-auto">
                    <div class="flex items-center justify-between">
                        <h2 id="order-heading" class="text-lg font-medium text-gray-900">Your Order</h2>

                    </div>

                    <div id="disclosure-1">
                        <ul role="list" class="divide-y divide-gray-200 border-b border-gray-200">
                            <li class="flex py-6 space-x-6">
                                <img src="{{ asset('/brands/full-logo.png') }}" alt="{{ $selected_plan->description }}"
                                    class="flex-none w-40 h-40 object-center object-cover bg-gray-200 rounded-md">
                                <div class="flex flex-col justify-between space-y-4">
                                    <div class="text-sm font-medium space-y-1">
                                        <h3 class="text-gray-900">{{ $selected_plan->plan }} plan</h3>
                                        <p class="text-gray-900">₱{{ number_format($selected_plan->price, 2) }}/month
                                        </p>
                                        <p class="text-gray-500">{{ $selected_plan->description }}</p>

                                    </div>

                                </div>
                            </li>

                            <!-- More products... -->
                        </ul>

                        <form class="mt-5">
                            <label for="discount-code-mobile" class="block text-sm font-medium text-gray-700">Discount
                                code</label>
                            <div class="flex space-x-4 mt-1">
                                <input type="text" id="discount-code-mobile" name="discount-code-mobile"
                                    class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <button type="submit"
                                    class="bg-gray-200 text-sm font-medium text-gray-600 rounded-md px-4 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Apply</button>
                            </div>
                        </form>
                        <dl class="text-sm font-medium text-gray-500 mt-10 space-y-6">
                            <div class="flex justify-between">
                                <dt>Subtotal</dt>
                                <dd class="text-gray-900">₱{{ number_format($selected_plan->price, 2) }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="flex">
                                    Discount
                                    <span
                                        class="ml-2 rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 tracking-wide">{{
                                        $selected_discount_code->discount_code }}</span>
                                </dt>
                                <dd class="text-gray-900">₱{{
                                    number_format(($selected_plan->price*$selected_checkout_option->discount),2) }}
                                </dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Taxes</dt>
                                <dd class="text-gray-900">₱0</dd>
                            </div>

                            <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                                <dt class="text-base">Total</dt>
                                <dd class="text-base">₱{{
                                    number_format($selected_plan->price-($selected_plan->price*$selected_checkout_option->discount),2)
                                    }}</dd>
                            </div>
                        </dl>
                    </div>

                   
                </div>
            </section>

            <!-- Order summary -->
            <section aria-labelledby="summary-heading" class="hidden bg-gray-50 w-full max-w-md flex-col lg:flex">
                <h2 id="summary-heading" class="sr-only">Order summary</h2>

                <ul role="list" class="flex-auto overflow-y-auto divide-y divide-gray-200 px-6">
                    <li class="flex py-6 space-x-6">
                        <img src="{{ asset('/brands/full-logo.png') }}" alt="{{ $selected_plan->description }}"
                            class="flex-none w-40 h-40 object-center object-cover bg-gray-200 rounded-md">
                        <div class="flex flex-col justify-between space-y-4">
                            <div class="text-sm font-medium space-y-1">
                                <h3 class="text-gray-900">{{ $selected_plan->plan }} plan</h3>
                                <p class="text-gray-900">₱{{ number_format($selected_plan->price, 2) }}/month</p>
                                <p class="text-gray-500">{{ $selected_plan->description }}</p>
                            </div>
                        </div>
                    </li>

                    <label for="discount-code" class="block text-sm font-medium text-gray-700">Discount code</label>
                    <div class="flex space-x-4 mt-1">
                        <input type="text" id="discount_code" wire.mode.lazy="discount_code"
                            class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <button type="submit"
                            class="bg-gray-200 text-sm font-medium text-gray-600 rounded-md px-4 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-indigo-500">Apply</button>
                    </div>


                    <dl class="text-sm font-medium text-gray-500 mt-10 space-y-6">
                        <div class="flex justify-between">
                            <dt>Subtotal</dt>
                            <dd class="text-gray-900">₱{{ number_format($selected_plan->price, 2) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="flex">
                                Discount
                                <span
                                    class="ml-2 rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 tracking-wide">{{
                                    $selected_discount_code->discount_code }}</span>
                            </dt>
                            <dd class="text-gray-900">₱{{
                                number_format(($selected_plan->price*$selected_checkout_option->discount),2) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt>Taxes</dt>
                            <dd class="text-gray-900">₱0</dd>
                        </div>

                        <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                            <dt class="text-base">Total</dt>
                            <dd class="text-base">₱{{
                                number_format($selected_plan->price-($selected_plan->price*$selected_checkout_option->discount),2)
                                }}</dd>
                        </div>
                    </dl>
                </ul>

                {{-- <div class=" bg-gray-50 border-t border-gray-200 p-6">


                </div> --}}
            </section>

            <!-- Checkout form -->
            <section aria-labelledby="payment-heading"
                class="flex-auto overflow-y-auto px-4 pt-12 pb-16 sm:px-6 sm:pt-16 lg:px-8 lg:pt-0 lg:pb-24">
                <div class="max-w-lg mx-auto">


                    <form class="mt-6" method="post" wire:submit.prevent="processPayment()">
                        <div class="grid grid-cols-12 gap-y-6 gap-x-4">
                            <div class="col-span-full">
                                <label for="name" class="block text-sm font-medium text-gray-700">Full Name
                                </label>
                                <div class="mt-1">
                                    <input type="text" wire:model.lazy="name" autocomplete="name"
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
                                    <input type="email" wire:model.lazy="email" autocomplete="email"
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
                                    <input type="text" wire:model.lazy="mobile_number" autocomplete="mobile_number"
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
                                    <select type="text" name="plan_id" id="plan_id" wire:model="plan_id"
                                        autocomplete="cc-exp"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        {{-- @if($selected_checkout_option->id == '2') --}}
                                        @foreach ($plans as $plan)
                                        <option value="{{ $plan->id }}" {{ $plan_id==$plan->id ? 'selected' : 'selected'
                                            }}> {{ $plan->plan }} </option>
                                        @endforeach

                                        {{-- @else
                                        @if($selected_plan->id == '1')
                                        <option value="1">basic</option>
                                        @elseif($selected_plan->id == '2')
                                        <option value="2">advanced</option>
                                        @else
                                        <option value="3">professional</option>
                                        @endif
                                        @endif --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-full">
                                <label for="expiration-date" class="block text-sm font-medium text-gray-700">Select your plan
                                    duration
                                </label>
                                <div class="mt-1">
                                    <select type="text" name="checkout_option" id="checkout_option" wire:model="checkout_option" autocomplete="cc-exp"
                                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        @foreach ($checkout_options as $item)
                                        <option value="{{ $item->id }}" {{ $selected_checkout_option->id==$item->id ? 'selected' : 'selected' }}> {{ $item->option }} </option>
                                        @endforeach
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
                                    <label
                                        class="relative bg-white border rounded-lg shadow-sm p-4 flex cursor-pointer focus:outline-none">
                                        <input type="radio" name="checkout_option" value="{{ $checkout_option->id }}"
                                            class="sr-only" aria-labelledby="delivery-method-0-label"
                                            aria-describedby="delivery-method-0-description-0 delivery-method-0-description-1">
                                        <div class="flex-1 flex">
                                            <div class="flex flex-col">
                                                <span id="delivery-method-0-label"
                                                    class="block text-sm font-medium text-gray-900">
                                                    {{ $checkout_option->option }}
                                                </span>
                                                <span id="delivery-method-0-description-0"
                                                    class="mt-1 flex items-center text-sm text-gray-500">
                                                    {{ $checkout_option->policy }}
                                                </span>
                                                <span id="delivery-method-0-description-1"
                                                    class="mt-6 text-sm font-medium text-gray-900">
                                                    ₱{{
                                                    number_format($selected_plan->price-($selected_plan->price*$checkout_option->discount),
                                                    2) }}/month
                                                </span>
                                            </div>
                                        </div>

                                        <svg class="h-5 w-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                clip-rule="evenodd" />
                                        </svg>

                                        <div class="absolute -inset-px rounded-lg border-2 pointer-events-none"
                                            aria-hidden="true"></div>
                                    </label>
                                    @endforeach
                                </div>
                            </fieldset>
                        </div> --}}


                        <button type="submit" wire:loading.remove wire:click="processPayment()"
                            class="w-full mt-6 bg-purple-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Pay
                            ₱{{
                            number_format($selected_plan->price-($selected_plan->price*$selected_checkout_option->discount),2)
                            }}</button>

                        <button type="submit" wire:loading wire:target="processPayment" disabled
                            class="w-full mt-6 bg-purple-600 border border-transparent rounded-md shadow-sm py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">Processing...</button>

                        <p class="flex justify-center text-sm font-medium text-gray-500 mt-6">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="w-5 h-5 text-gray-400 mr-1.5" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                            Payment details are encrypted.
                        </p>
                    </form>
                </div>
            </section>
        </main>
    </div>
</div>