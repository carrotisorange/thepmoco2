<div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-12 bg-white border-b border-gray-200">
                <p class="text-right">
                    <x-button onclick="window.location.href='{{ url()->previous() }}'"><i class="fas fa-arrow-alt-circle-left"></i>&nbsp
                        Back
                    </x-button>
                    <x-button onclick="window.location.href='/tenant_sheet/export'"><i class="fa-solid fa-download"></i>&nbsp
                        Tenant Sheet
                    </x-button>
                </p>
                <div>
                    @include('utilities.create-old-tenant-form')
                </div>
            </div>
        </div>
    </div>
</div>