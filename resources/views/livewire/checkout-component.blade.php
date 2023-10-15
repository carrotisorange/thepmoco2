<div>
    {{-- @include('layouts.notifications') --}}
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
                                        <p class="text-gray-500">Limited to {{ $selected_plan->description }} units</p>

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
                                <dd class="text-gray-900">₱{{
                                    number_format($selected_plan->price*$selected_checkout_option->policy, 2) }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="flex">
                                    Discount
                                    <span
                                        class="ml-2 rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 tracking-wide">{{
                                        $selected_discount_code->discount_code }}</span>
                                </dt>
                                <dd class="text-gray-900">₱{{
                                    number_format(($selected_plan->price*$selected_checkout_option->discount)*$selected_checkout_option->policy,2)
                                    }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt>Taxes</dt>
                                <dd class="text-gray-900">₱0</dd>
                            </div>

                            <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                                <dt class="text-base">Total</dt>
                                <dd class="text-base">₱{{
                                    number_format(($selected_plan->price-($selected_plan->price*$selected_checkout_option->discount))*$selected_checkout_option->policy,2)
                                    }}</dd>
                            </div>

                            @if($selected_plan->id != 4)

                            <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                                <dt class="text-base">Billing starts on {{ Carbon\Carbon::now()->addMonth()->format('M
                                    d, Y') }}</dt>
                                <dd class="text-base">Cancel Anytime</dd>
                            </div>

                            @endif
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
                                <p class="text-gray-500">Limited to {{ $selected_plan->description }} units</p>
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
                            <dd class="text-gray-900">₱{{
                                number_format($selected_plan->price*$selected_checkout_option->policy, 2) }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt class="flex">
                                Discount
                                <span
                                    class="ml-2 rounded-full bg-gray-200 text-xs text-gray-600 py-0.5 px-2 tracking-wide">{{
                                    $selected_discount_code->discount_code }}</span>
                            </dt>
                            <dd class="text-gray-900">₱{{
                                number_format(($selected_plan->price*$selected_checkout_option->discount)*$selected_checkout_option->policy,2)
                                }}</dd>
                        </div>
                        <div class="flex justify-between">
                            <dt>Taxes</dt>
                            <dd class="text-gray-900">₱0</dd>
                        </div>

                        <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                            <dt class="text-base">Total</dt>
                            <dd class="text-base">₱{{
                                number_format(($selected_plan->price-($selected_plan->price*$selected_checkout_option->discount))*$selected_checkout_option->policy,2)
                                }}</dd>
                        </div>

                        @if($selected_plan->id != 4)

                        <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                            <dt class="text-base">Billing starts on {{ Carbon\Carbon::now()->addMonth()->format('M
                                d,
                                Y') }}</dt>
                            <dd class="text-base">Cancel Anytime</dd>
                        </div>

                        @endif
                    </dl>
                </ul>
            </section>

            <!-- Checkout form -->
            <section aria-labelledby="payment-heading"
                class="flex-auto overflow-y-auto px-4 pt-12 pb-16 sm:px-6 sm:pt-16 lg:px-8 lg:pt-0 lg:pb-24">
                <div class="max-w-lg mx-auto">
                    @include('forms.checkout-create')
                </div>
            </section>
        </main>
    </div>
</div>