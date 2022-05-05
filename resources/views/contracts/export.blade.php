<!DOCTYPE html>

<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="py-6">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="">
                <div class="">
                    <div class="mt-5">
                        <div class="mt-6 flex flex-wrap mt-5 mx-3 mb-2">
                            <x-label for="tenant">
                                Tenant <span class="text-red-600">*</span>
                            </x-label>
                            <x-form-input wire:model="tenant" id="tenant" type="text" name="tenant"
                                value="{{ $tenant }}" />
                            <br>
                            <x-label for="tenant">
                                Unit <span class="text-red-600">*</span>
                            </x-label>
                            <x-form-input wire:model="tenant" id="tenant" type="text" name="tenant"
                                value="{{ $unit }}" />
                            <br>
                            <x-label for="tenant">
                                Duration <span class="text-red-600">*</span>
                            </x-label>

                            <x-form-input wire:model="tenant" id="tenant" type="text" name="tenant"
                                value="{{ Carbon\Carbon::parse($start)->format('M d, Y').'-'.Carbon\Carbon::parse($end)->format('M d, Y') }}" />
                            <br>
                            <x-label for="tenant">
                                Rent/month <span class="text-red-600">*</span>
                            </x-label>
                            <x-form-input wire:model="tenant" id="tenant" type="text" name="tenant" value="{{
                                number_format($rent, 2) }}" />
                            <br>
                            <x-label for="tenant">
                                Discount <span class="text-red-600">*</span>
                            </x-label>
                            <x-form-input wire:model="tenant" id="tenant" type="text" name="tenant"
                                value="{{number_format($discount, 2) }}" />
                            <br>
                            <x-label for="tenant">
                                Status <span class="text-red-600">*</span>
                            </x-label>
                            <x-form-input wire:model="tenant" id="tenant" type="text" name="tenant"
                                value="{{ $status }}" />
                            <br>
                            <x-label for="tenant">
                                Interaction <span class="text-red-600">*</span>
                            </x-label>
                            <x-form-input wire:model="tenant" id="tenant" type="text" name="tenant"
                                value="{{ $interaction->interaction }}" />
                            <br>
                            <x-label for="tenant">
                                Assisted by: <span class="text-red-600">*</span>
                            </x-label>
                            <x-form-input wire:model="tenant" id="tenant" type="text" name="tenant"
                                value="{{ $user }}" />
                            <br>

                            <b>Move-in Charges</b>
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <?php $ctr =1; ?>
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <x-th>#</x-th>
                                                        <x-th>Bill #</x-th>
                                                        <x-th>Particular</x-th>
                                                        <x-th>Period Covered</x-th>
                                                        <x-th>Amount</x-th>
                                                    </tr>
                                                </thead>
                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    @forelse ($bills as $bill)

                                                    <tr>
                                                        <x-td>{{ $ctr++ }}</x-td>
                                                        <x-td>{{ $bill->bill_no }}</x-td>
                                                        <x-td>{{ $bill->particular }}</x-td>
                                                        <x-td>
                                                            {{ Carbon\Carbon::parse($bill->start)->format('M d, Y').' -
                                                            '.Carbon\Carbon::parse($bill->end)->format('M d, Y') }}
                                                        </x-td>
                                                        <x-td>{{ number_format($bill->bill, 2) }}</x-td>
                                                    </tr>
                                                    @empty
                                                    <x-td>No data found!</x-td>
                                                    </tr>

                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>