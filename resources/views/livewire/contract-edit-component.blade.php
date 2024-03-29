<div>

    <div class="mt-8">

        <div class="max-full mx-auto sm:px-6">
            <div class="mx-5 sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700">{{ $contract_info->tenant->tenant }} / {{
                        $contract_info->unit->unit }}</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                </div>
            </div>
            @include('forms.contracts.contract-edit')
        </div>
    </div>
</div>