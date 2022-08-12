<div>
    @include('layouts.notifications')
    <div class="p-6 bg-white border-b border-gray-200">
       @include('forms.owner-edit')
    </div>
    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Representatives <i title="Representatives are the people who, in case of absence of the unit owner, act in behalf of the unit owner." class="fa-solid fa-circle-question"></i></h1>
        @include('tables.representatives')
        <div class="mt-5">
            {{ $representatives->links() }}
        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/representative/create'">
                    Add
                </x-button>

            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Banks <i title="Banks are the list of the unit owner's bank details for remittance purposes ." class="fa-solid fa-circle-question"></i></h1>
        @include('tables.banks')
        <div class="mt-5">
            {{ $banks->links() }}
        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/bank/create'">
                    Add
                </x-button>

            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Deed of Sales <i title="The Deed of Sale results in ownership over the property being transferred to the buyer upon its delivery." class="fa-solid fa-circle-question"></i></h1>
        @include('tables.deed_of_sales')
        <div class="mt-5">
            {{ $deed_of_sales->links() }}
        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/units'">
                    Add
                </x-button>
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner_details->uuid }}/deed_of_sales'">
                    See more
                </x-button>

            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Enrollees <i title="Enrollees/Leasing is an implied or written agreement specifying the conditions under which a lessor accepts to let out a property to be used by a lessee. You can enroll a unit to leasing by adding a deed of sale." class="fa-solid fa-circle-question"></i></h1>
        @include('tables.enrollees')
        <div class="mt-5">
            {{ $enrollees->links() }}
        </div>
        <div class="mt-5">
            <p class="text-right">
                {{-- <x-button
                    onclick="window.location.href='/owner/{{ $owner_details->uuid }}/enrollee/{{ Str::random(8) }}/create'">
                    Add to lease
                </x-button> --}}
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property')}}/owner/{{ $owner_details->uuid }}/enrollee/'">
                    See more
                </x-button>

            </p>
        </div>
    </div>
</div>