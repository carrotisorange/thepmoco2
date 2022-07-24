<div class="">
    <x-search placeholder="Enter name, email, and mobile..."></x-search>
    <div class="mt-2 mb-2">
        {{ $tenants->links() }}
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Name</x-th>
                    <x-th>Unpaid Bills</x-th>
                    <x-th>Contact</x-th>
                    <x-th>Address</x-th>
                    <x-th>Reference #</x-th>
                </tr>
            </thead>
            @forelse ($tenants as $index => $tenant)
            <tbody class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <tr>
                    <x-td>{{ $index + $tenants->firstItem() }}</x-td>
                    <x-td>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <a href="tenant/{{ $tenant->uuid }}">
                                    <img class="h-10 w-10 rounded-full" src="/storage/{{ $tenant->photo_id }}" alt="">
                                </a>
                            </div>
                            <?php
                                                                        $unpaid_bills = App\Models\Tenant::find($tenant->uuid)->bills->where('status', '!=', 'paid');
                                                                        $contract_status = App\Models\Tenant::find($tenant->uuid)->bills->where('status', '!=', 'paid')
                                                                        ->where('description','movein charges');
                                                                    ?>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900"><b>{{
                                        $tenant->tenant }} </b>
                                    @if($contract_status->count()<=0) <span title="active"
                                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        <i class="fa-solid fa-circle-check"></i>
                                        </span>
                                        @else
                                        <span title="pending"
                                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                                            <i class="fa-solid fa-clock"></i>
                                        </span>
                                        @endif
                                </div>
                                <div class="text-sm text-gray-500">{{
                                    $tenant->type }}
                                </div>
                            </div>
                        </div>
                    </x-td>
                    <x-td>
                        @if($unpaid_bills->count()<=0) <span title="updated"
                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fa-solid fa-circle-check"></i> Updated
                            </span>
                            @else
                            {{
                            number_format($unpaid_bills->sum('bill')-$unpaid_bills->sum('initial_payment'),
                            2) }} ({{ $unpaid_bills->count() }})
                            @endif
                    </x-td>
                    <x-td>
                        <div class="text-sm text-gray-900">{{ $tenant->email }}
                        </div>
                        <div class="text-sm text-gray-500">{{
                            $tenant->mobile_number }}
                        </div>
                    </x-td>
                    <x-td>
                        <div class="text-sm text-gray-900">{{ $tenant->province->province.',
                            '.$tenant->city->city.', '.$tenant->barangay }}
                        </div>
                        <div class="text-sm text-gray-500">{{
                            $tenant->country->country }}
                        </div>
                    </x-td>
                    <x-td>{{ $tenant->bill_reference_no }}</x-td>
                    @empty
                    <x-td>No data found!</x-td>
                </tr>
            </tbody>
            @endforelse
        </table>
    </div>
</div>