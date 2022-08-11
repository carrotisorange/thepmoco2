<div>
    @include('layouts.notifications')
    <div class="mt-5 p-6 bg-white border-b border-gray-200">
    @include('forms.bank-create')
    </div>

    @if($banks->count())
    <div class="mt-5 p-6 bg-white border-b border-gray-200">

        <table class="text-sm min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Account Name</x-th>
                    <x-th>Bank</x-th>
                    <x-th>Account Number</x-th>
                    <x-th></x-th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($banks as $index => $bank)
                <tr>
                    <x-td></x-td>
                    <x-td>{{ $bank->account_name }}</x-td>
                    <x-td>{{ $bank->bank_name }}</x-td>
                    <x-td>{{ $bank->account_number }}</x-td>
                    <x-td>

                        <x-button wire:click="removeBank({{ $bank->id }})" onclick="confirmMessage()">Remove
                        </x-button>

                    </x-td>
                </tr>
                @empty
                <tr>
                    <x-td>No data found.</x-td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endif
</div>