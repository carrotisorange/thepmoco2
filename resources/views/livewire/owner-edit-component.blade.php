<div>
    @include('layouts.notifications')
    <div class="mt-8 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8">
        <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
            <div class="lg:col-start-5 lg:col-span-9">
                <div class="flex justify-between">
                    <h1 class="text-3xl font-bold text-white">{{ $owner_details->owner }}</h1>
                    @can('ownerportal')
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/owner/unlock'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Send access to owner portal
                    </button>
                    @else
                    @if(!App\Models\User::where('email', $owner_details->email)->count())
                    <button type="submit" wire:click="sendCredentials"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                        <svg wire:loading wire:target="sendCredentials"
                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Send access to owner portal
                    </button>
                    @else
                    <button type="submit" wire:click="removeCredentials"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                        <svg wire:loading wire:target="removeCredentials"
                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Remove access to owner portal
                    </button>

                    @endif
                    @endcan
                </div>
            </div>

            <!-- Image gallery -->
            <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-4  lg:row-span-3">
                <h2 class="sr-only">Images</h2>

                <div class="flex items-center justify-center mr-5">
                    <img src="{{ asset('/brands/user.png') }}" alt="door"
                        class="h-56 lg:col-span-2 md:row-span-2 rounded-md">
                </div>
                {{-- <a href="#"
                    class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Change
                    username </a>
                <a href="#"
                    class="mt-10 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">Change
                    password</a> --}}
            </div>
            <div class="mt-2 lg:col-span-9">
                @include('forms.owner-edit')
            </div>
            <section class="mb-10">
                <h1 class="mt-10 text-xl font-bold text-black">Units</h1>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <!-- Selected row actions, only show when rows are selected. -->
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
                            </div>
                            @include('admin.tables.enrollees')
                        </div>
                        <div class="mt-8 flex justify-end">
                            @can('ownerportal')
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/contract'"
                                class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                New Unit
                            </button>
                            @else
                            <button type="button"
                                onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/units'"
                                class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">New
                                Unit</button>
                            @endif
                        </div>
            </section>

            <section class="mb-10">
                <h1 class="text-xl font-bold text-black">Bank Accounts</h1>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
                            </div>
                            @include('admin.tables.banks')
                        </div>
            </section>

            <section class="mb-10">
                <h1 class="text-xl font-bold text-black">Authorized Representatives</h1>
                <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div
                            class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                            <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">
                            </div>
                            @include('admin.tables.representatives')
                        </div>
            </section>

        </div>
    </div>
<<<<<<< Updated upstream


    <section class="mb-10">
        <h1 class="mt-10 text-xl font-bold text-black">enrollees</h1>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                    <table class="min-w-full table-fixed">

                        <thead class="bg-white">
                            <tr>
                                <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8 ">

                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    UNIT</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    BUILDING</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    DURATION</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    RENT/MO</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    STATUS</th>

                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                </th>
                            </tr>
                        </thead>

                        @foreach ($enrollees as $item)
                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <!-- Selected: "bg-gray-50" -->
                            <tr>
                                <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                    <!-- Selected row marker, only show when row is selected. -->

                                    {{-- <input type="checkbox"
                                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                    --}}
                                </td>
                                <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->

                                <td
                                    class="whitespace-nowrap px-3 py-4 text-sm text-blue-500 text-decoration-line: underline">
                                    <a href="/property/{{ $item->property_uuid }}/unit/{{ $item->unit->uuid }}">{{
                                        $item->unit->unit
                                        }}</a>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{$item->unit->building->building }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ Carbon\Carbon::parse($item->start)->format('M d, Y').' -
                                    '.Carbon\Carbon::parse($item->end)->format('M d, Y') }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{number_format($item->rent, 2)}}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if($item->status === 'active')
                                    <span
                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fa-solid fa-circle-check"></i> {{ $item->status }}
                                    </span>
                                    @else

                                    <span
                                        class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                                                bg-orange-100 text-orange-800">
                                        <i class="fa-solid fa-clock"></i> {{
                                        $item->status }}
                                    </span>
                                    @endif
                                    @if($item->end <= Carbon\Carbon::now()->addMonth() && $item->status
                                        == 'active')
                                        <span
                                            class="px-2 text-sm leading-5 font-semibold rounded-full
                                                                                                                                                        bg-orange-100 text-orange-800">
                                            <i class="fa-solid fa-clock"></i> expiring
                                        </span>
                                        @endif
                                </td>

                                <td class="whitespace-nowrap px-3 pr-4 text-sm font-medium sm:pr-6">
                                    @if($item->contract)
                                    <a href="{{ asset('/storage/'.$item->contract) }}" target="_blank"
                                        class="text-indigo-600 hover:text-indigo-900">View Attachment</a>
                                    @endif
                                </td>
                                <td class="whitespace-nowrap px-3 pr-4 text-sm font-medium sm:pr-6">
                                    <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/renew"
                                        class="text-indigo-600 hover:text-indigo-900">Renew</a>
                                </td>
                                <td class="whitespace-nowrap px-3 pr-4 text-sm font-medium sm:pr-6">
                                    @if($item->status == 'active')
                                    <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->tenant_uuid }}/contract/{{ $item->uuid }}/moveout"
                                        class="text-indigo-600 hover:text-indigo-900">Moveout</a>
                                    @endif
                                </td>

                            </tr>
                            <!-- More people... -->
                        </tbody>

                        @endforeach


                    </table>

                </div>

                <div class="mt-8 flex justify-end">
                    @can('tenantportal')
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/contract'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        New Contract
                    </button>
                    @else
                    <button type="button"
                        onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/units'"
                        class="inline-flex items-center px-3.5 py-2 border border-transparent text-sm leading-4 font-medium rounded-full shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">New
                        Contract</button>
                    @endif
                </div>
    </section>

    <section class="mb-10">
        <h1 class="text-xl font-bold text-black">banks</h1>
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                    <table class="min-w-full table-fixed">

                        <thead class="bg-white">
                            <tr>
                                <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8 ">

                                </th>
                                <th scope="col"
                                    class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                                    NAME
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    RELATIONSHIP
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    MOBILE
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    EMAIL
                                </th>
                            </tr>
                        </thead>

                        @forelse ($banks as $bank)


                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <!-- Selected: "bg-gray-50" -->
                            <tr>
                                <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                                    <!-- Selected row marker, only show when row is selected. -->

                                    {{-- <input type="checkbox"
                                        class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                                    --}}
                                </td>
                                <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $bank->bank }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $bank->relationship->relationship }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $bank->mobile_number }}
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $bank->email }}
                                </td>


                            </tr>

                        </tbody>

                        @empty
                        <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                            <tr>
                                <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                                    No banks found.
                                </td>
                            </tr>
                        </tbody>

                        @endforelse

                    </table>

                </div>
    </section>
  
=======
 
>>>>>>> Stashed changes
</div>