<div>
    @include('layouts.notifications')
    <div class="p-6 bg-white border-b border-gray-200">
       @include('forms.owner-edit')
    </div>
    <div class="mt-5 p-6 bg-white border-b border-gray-200">
        <h1 class="font-bold">Representatives</h1>
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
        <h1 class="font-bold">Banks</h1>
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
        <h1 class="font-bold">Deed of Sales</h1>
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
        <h1 class="font-bold">Enrollees</h1>
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