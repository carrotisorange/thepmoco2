<x-new-layout>
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $contract_details->tenant->tenant }} /
                        Renew Contract</h1>
                </div>

                <x-button  onclick="window.location.href='{{ url()->previous() }}'">
                    Go back to tenant
                    </a></x-button>
            </div>
            @livewire('renew-contract-component', ['contract_details' => $contract_details])
        </div>
</x-new-layout>
