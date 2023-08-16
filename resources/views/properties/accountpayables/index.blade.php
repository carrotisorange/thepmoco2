<x-new-layout>
    @section('title','Account Payables | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            {{-- @can('is_account_payable_read_allowed')
            @include('admin.restrictedpages.accountpayable')
            @else --}}
            @livewire('account-payable-index-component', ['property' => $property])
            {{-- @endcan --}}
        </div>
    </div>
</x-new-layout>