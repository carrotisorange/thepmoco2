<div>
    @include('layouts.notifications')
    <div class="p-6 bg-white border-b border-gray-200">
        @include('forms.unit-edit')
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Contracts</h1>
        @include('tables.contracts')
        <div class="mt-5">
            {{ $contracts->links() }}
        </div>
        <div class="mt-5">
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/tenant/{{ Str::random(8) }}/create'">
                    Add
                </x-button>
                @if($contracts->count())
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/contracts/'">
                    See more
                </x-button>
                @endif
            </p>
        </div>
    </div>


    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Deed of sales <i
                title="The Deed of Sale results in ownership over the property being transferred to the buyer upon its delivery."
                class="fa-solid fa-circle-question"></i></h1>
        @include('tables.deed_of_sales')
        <div class="mt-5">
            {{ $deed_of_sales->links() }}
            <p class="text-right">
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/owner/{{ Str::random(8) }}/create'">
                    Add
                </x-button>
                @if($deed_of_sales->count())
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/deed_of_sales/'">
                    See more
                </x-button>
                @endif
            </p>
        </div>
    </div>



    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Enrollees <i
                title="Enrollees/Leasing is an implied or written agreement specifying the conditions under which a lessor accepts to let out a property to be used by a lessee.."
                class="fa-solid fa-circle-question"></i></h1>
        @include('tables.enrollees')
        <div class="mt-5">
            {{ $enrollees->links() }}
            <p class="text-right">
                {{-- <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/{{ $unit_details->uuid }}/enrollee/'">
                    Add
                </x-button> --}}
                @if($enrollees->count())
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/enrollee/'">
                    See more
                </x-button>
                @endif
            </p>
        </div>
    </div>

    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Bills</h1>
        @include('tables.bills')
        <div class="mt-5">
            {{ $bills->links() }}
        </div>
        <div class="mt-5">
            <p class="text-right">
                @if($bills->count())
                <x-button
                    onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit_details->uuid }}/bills/'">
                    See more
                </x-button>
                @endif
            </p>
        </div>
    </div>
    @include('modals.create-building-modal')

</div>