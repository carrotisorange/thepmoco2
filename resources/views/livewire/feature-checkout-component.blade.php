<div>

    <div class="flex h-full flex-col">

        <div class="bg-white">
            <!-- Background color split screen for large screens -->
            <div class="fixed top-0 left-0 hidden h-full w-1/2 bg-white lg:block" aria-hidden="true"></div>
            <div class="fixed top-0 right-0 hidden h-full w-1/2 bg-purple-900 lg:block" aria-hidden="true"></div>

            <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-x-16 lg:grid-cols-2 lg:px-8 lg:pt-16">
                <h1 class="sr-only">Checkout</h1>

                {{-- @if($selectedFeatures->count()) --}}
                <section aria-labelledby="summary-heading"
                    class="bg-purple-900 py-12 text-indigo-300 md:px-10 lg:col-start-2 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:bg-transparent lg:px-0 lg:pt-0 lg:pb-24">
                    <div class="mx-auto max-w-2xl px-4 lg:max-w-none lg:px-0">
                        <h2 id="summary-heading" class="sr-only">Order summary</h2>

                        <dl>
                            <dt class="text-sm font-medium">Total</dt>
                            <dd class="mt-1 text-3xl font-bold tracking-tight text-white">Php {{ number_format($total)
                                }}
                            </dd>
                        </dl>

                        <ul role="list" class="divide-y divide-white divide-opacity-10 text-sm font-medium">
                            @foreach ($selectedFeatures as $feature)
                            <li class="flex items-start space-x-4 py-6">
                                <div class="flex-auto space-y-1">
                                    <h3 class="text-white">{{ $feature->feature }}</h3>
                                </div>
                                <p class="flex-none text-base font-medium text-white">Php {{
                                    number_format($feature->price)
                                    }}</p>
                            </li>
                            @endforeach
                        </ul>

                        <dl class="space-y-6 border-t border-white border-opacity-10 pt-6 text-sm font-medium">
                            <div class="flex items-center justify-between">
                                <dt>Subtotal</dt>
                                <dd>Php {{ number_format($total) }}</dd>
                            </div>
                            <div class="flex items-center justify-between">
                                <dt>Fees</dt>
                                <dd>Php 0</dd>
                            </div>
                            {{-- <div
                                class="flex items-center justify-between border-t border-white border-opacity-10 pt-6 text-white">
                                <dt class="text-base">Total</dt>
                                <dd class="text-base">Php {{ number_format($total) }}</dd>
                            </div> --}}
                        </dl>
                    </div>
                </section>

                {{-- @endif --}}

                <section aria-labelledby="payment-and-shipping-heading"
                    class="py-16 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:w-full lg:max-w-lg lg:pt-0 lg:pb-24">
                    <h2 id="payment-and-shipping-heading" class="sr-only">Payment and shipping details</h2>
                    @include('forms.feature-create')
                </section>
            </div>
        </div>
    </div>
</div>