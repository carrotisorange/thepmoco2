<x-new-layout>
    @section('title','Account Payables | '. Session::get('property_name'))
    @can('accountpayable')
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
                            <h1 class="mt-2 text-4xl font-bold tracking-tight text-gray-800 sm:text-3xl">Account Payable
                                Feature Locked</h1>
                            <p class="mt-2 text-base text-purple-500">Unlock this feature for only <span
                                    class="font-bold text-xl">₱300/month!</span></p>
                            <p class="mt-3 text-sm max-w-lg text-gray-600">Recording monthly payments of utilities,
                                salaries
                                & wages, other operating expenses is best practice for rental properties. Keeping track
                                that
                                operating expenses do not go beyond budget. Graphing operating expenses will show
                                fluctuations in operations. </p>

                            <ul class="mt-5 text-sm max-w-lg font-md">

                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                    request for purchases and payments go through approval flow before cash is released
                                    for
                                    payment.
                                </li>



                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    not only for record keeping but to implement account payable policies and approval
                                    flows.
                                </li>







                                <li class=" mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="text-green-800 w-5 h-5 inline-block">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    use together with <a href="receivable-bills-lock"
                                        class="font-bold text-purple-900">ACCOUNTS RECEIVABLE MANAGEMENT</a> for
                                    complete
                                    reports in <a href="cashflow-lock" class="font-bold text-purple-900">CASHFLOW</a>
                                    from
                                    operating activities.
                                </li>




                            </ul>
                            <div class="mt-8">
                                <div>
                                    <button type="submit"
                                        class="w-48 flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-purple-700 hover:bg-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"><a
                                            href="check-page">Unlock now</a></button>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>

            </div>
            <div class="hidden lg:absolute lg:inset-y-0 lg:right-0 lg:block lg:w-md">
                <img class="mt-20 h-80 w-fit" src="{{ asset('/brands/accounts.png') }}" alt="contracts feature">
            </div>
        </div>
    </div>
    @else
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">Accounts Payables</h1>
                </div>
                {{--
                <div class="sm:col-span-2">
                    <select id="small" wire:model="status"
                        class="text-left bg-white block p-1 w-full text-sm h-8 text-gray-90 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="">Filter account payable status</option>
                        {{-- @foreach ($statuses as $item)
                        <option value="{{ $item->status_id }}">{{ $item->status }}</option>
                        @endforeach -
                    </select>

                </div> --}}

                <button type="button"
                    class="ml-5 inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto"><a
                        href="/property/{{ Session::get('property') }}/accountpayable/{{ Str::random(8) }}/create">Create
                        New Request</a></button>
            </div>



            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        <table class="min-w-full table-fixed">
                            @include('admin.tables.accountpayables')

                    </div>

                </div>
            </div>
        </div>
    </div>
    @endcan
</x-new-layout>