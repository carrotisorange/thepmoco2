<x-new-layout>
    @section('title','Bills | '. Session::get('property'))
    {{-- @can('accountreceivable') 
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-full flex-col bg-white lg:relative">
            <div class="flex flex-grow flex-col">
                <main class="flex flex-grow flex-col bg-white">
                    <div class="mx-auto flex w-full max-w-7xl flex-grow flex-col px-4 sm:px-6 lg:px-8">

                        <div class="my-auto flex-shrink-0 py-16 sm:py-8">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="inline-block w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-800 sm:text-3xl">Account
                                Receivable
                                Feature Locked</h1>
                            <p class="mt-2 text-base text-purple-500">Unlock this feature for only <span
                                    class="font-bold text-xl">₱600/month!</span></p>
                            <p class="mt-3 text-sm max-w-lg text-gray-600">The lifeblood of rental property business
                                lies in
                                an excellent billing and collection management. This is an important but repetitive and
                                tedious task that must be done on a monthly cycle. For bigger rental properties, this is
                                handled by a billing and collection department. For smaller rental properties, this is
                                part
                                of the tasks of the landlord or manager. Best practice is to have one due date for rent
                                for
                                easy monitoring of paid and unpaid accounts. Billing should be done ahead of due date.
                                Bill
                                repeatedly until account is paid. Prevent delinquencies by providing many payment
                                methods.
                            </p>

                            <ul class="mt-5 text-sm max-w-lg font-md">

                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    create bills and send directly to tenants' email
                                </li>



                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    has <span class="font-bold">bulk billing</span> feature to reduce billing time for
                                    hundreds of tenants
                                </li>

                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    has express bills for all tenants with the same amount of bills
                                </li>





                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    use together with <a href="tenant-portal-lock"
                                        class="font-bold text-purple-700">TENANT
                                        PORTAL</a> for easier collection management and keep track and monitor
                                    collection of
                                    aging accounts
                                </li>

                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    view collection records in the collection page and <a href="cashflow-lock"
                                        class="font-bold text-purple-700">CASHFLOW</a> from operating activities.
                                </li>
                            </ul>
                            <div class="mt-8">
                                <div>
                                    <button type="submit"
                                        onclick="window.location.href='/user/{{ auth()->user()->username }}/unlock'"
                                        class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-purple-700 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Unlock
                                        now</a></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
            <div class="hidden lg:absolute lg:inset-y-0 lg:right-0 lg:block lg:w-md">
                <img class="h-full w-full" src="{{ asset('/brands/bills-sample.png') }}" alt="contracts feature">
            </div>
        </div>
    </div>
    {{-- @else  --}}
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('bill-index-component', [
            'property' => $property,
            'active_contracts' => $active_contracts,
            'active_tenants' => $active_tenants,
            'batch_no' => $batch_no])
        </div>
    </div>
    {{-- @endif --}} 
    @include('modals.create-particular')
    @include('modals.create-express-bill')
</x-new-layout>