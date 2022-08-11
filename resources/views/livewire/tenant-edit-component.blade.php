<div>
    @include('layouts.notifications')
    <div class="p-6 bg-white border-b border-gray-200">
        @include('forms.tenant-edit')
    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Guardians</h1>
    <div>
        @include('tables.guardians')
        <div class="mt-5">
            {{ $guardians->links() }}
        </div>
    </div>
</div>
<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">References</h1>
    <div>
        @include('tables.references')
        <div class="mt-5">
            {{ $references->links() }}
        </div>
    </div>
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
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid }}/units/'">
                Add
            </x-button>
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/contracts'">
                See more

            </x-button>
        </p>
    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Bills</h1>
    <div>
        @include('tables.bills')
    </div>
    <div class="mt-5">
        {{ $bills->links() }}
    </div>
    <div class="mt-5">

        <p class="text-right">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/bills'">
                See more
            </x-button>
        </p>
    </div>
</div>

<div class="mt-5 p-6 bg-white border-b border-gray-200">
    <h1 class="font-bold">Payments</h1>
    <div>
        @include('tables.collections')
    </div>
    <div class="mt-5">
        {{ $collections->links() }}
    </div>
    <div class="mt-5">

        <p class="text-right">
            <x-button
                onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant_details->uuid}}/collections'">
                See more

            </x-button>
        </p>
    </div>
</div>

</div>