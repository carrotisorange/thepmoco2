<x-new-layout>
    @section('title','Contracts | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('contract-show-component', ['contract' => $contract])
        </div>
    </div>
</x-new-layout>