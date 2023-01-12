<x-new-layout>
    @section('title','Account Payables | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @can('accountpayable')
            @include('admin.restrictedpages.accountpayable')
            @else
            @livewire('account-payable-index-component')
            @endcan
        </div>
    </div>
</x-new-layout>