<div class="py-2">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-5">
            <div class="flex flex-row">
                <div class="basis-1/2">
                    @if($selectedBills)
                    <x-button wire:loading.remove wire:click="updateForm()">Post Bills ({{ count($selectedBills) }})
                    </x-button>

                    <div wire:loading wire:target="updateForm">
                        Processing...
                    </div>
                    @endif
                </div>
                <div class="basis-1/2 ml-12 text-right">
                    @if($selectedBills)
                    <x-button wire:loading.remove onclick="confirmMessage()" wire:click="removeBills()">
                        Remove Bills ({{ count($selectedBills) }})
                    </x-button>
                    <div wire:loading wire:target="removeBills">
                        Processing...
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-gray-200">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <x-th>
                                                <div class="flex items-center">
                                                    <x-input id="" wire:model="selectAll" type="checkbox" />
                                                </div>
                                            </x-th>
                                            <x-th>#</x-th>
                                            <x-th>Tenant</x-th>
                                            <x-th>Unit</x-th>
                                            {{-- <x-th>Date Posted</x-th> --}}
                                            <x-th>Start</x-th>
                                            <x-th>End</x-th>
                                            <x-th>Particular</x-th>
                                            <x-th>Amount</x-th>
                                        </tr>
                                    </thead>

                                    <form wire:submit.prevent="updateForm()">
                                        <tbody>
                                            @forelse ($bills as $index => $bill)
                                            <div wire:key="bill-field-{{ $bill->id }}">
                                                <tr>
                                                    <x-td>
                                                        <div class="flex items-center">
                                                            <x-input type="checkbox"
                                                                wire:model="selectedBills.{{ $bill->id }}" />
                                                        </div>
                                                    </x-td>
                                                    <x-td>{{ $bill->bill_no }}</x-td>
                                                    <?php
                                                    $tenant = App\Models\Tenant::find($bill->tenant_uuid)->tenant;
                                                    $unit = App\Models\Unit::find($bill->unit_uuid)->unit
                                            ?>
                                                    <x-td><a href="/tenant/{{ $bill->tenant_uuid }}/bills"><b
                                                                class="text-blue-600">{{ $tenant }}</b></a></x-td>
                                                    {{-- <x-td>
                                                        <x-table-input form="edit-form" type="date"
                                                            wire:model="bills.{{ $index }}.created_at" />
                                                        @error('bills.{{ $index }}.created_at')
                                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </x-td> --}}
                                                    <x-td><a href="/unit/{{ $bill->unit_uuid }}/bills"><b
                                                                class="text-blue-600">{{ $unit }}</b></a></x-td>
                                                    <x-td>
                                                        <x-table-input form="edit-form" type="date"
                                                            wire:model="bills.{{ $index }}.start" />
                                                        @error('bills.{{ $index }}.start')
                                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </x-td>
                                                    <x-td>
                                                        <x-table-input form="edit-form" type="date"
                                                            wire:model="bills.{{ $index }}.end" />
                                                        @error('bills.{{ $index }}.end')
                                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </x-td>
                                                    <x-td>
                                                        <x-table-select form="edit-form">
                                                            <option value="{{ $bill->particular_id }}" {{
                                                                old('particular_id')==$bill->particular_id ? 'selected'
                                                                :
                                                                'Select one' }} selected>{{
                                                                $bill->particular->particular }}
                                                            </option>
                                                        </x-table-select>
                                                    </x-td>
                                                    <x-td>
                                                        <x-table-input form="edit-form" type="number"
                                                            wire:model="bills.{{ $index }}.bill" />
                                                        @error('bills.{{ $index }}.bill')
                                                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                        @enderror
                                                    </x-td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <x-td>No data found.</x-td>
                                                </tr>

                                                @endforelse
                                        </tbody>
                                    </form>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('layouts.notifications')
</div>