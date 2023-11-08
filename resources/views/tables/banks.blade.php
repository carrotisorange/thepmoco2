@if($banks->count())
<x-table-component>
  <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>Account Name</x-th>
            <x-th>Bank</x-th>
            <x-th>Account Number</x-th>
            <x-th></x-th>
        </tr>
    </x-table-head-component>
    @foreach ($banks as $index => $bank)
    <x-table-body-component>
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $bank->account_name }}</x-td>
            <x-td>{{ $bank->bank_name }}</x-td>
            <x-td>{{ $bank->account_number }}</x-td>
            <x-td>
                <x-button data-modal-toggle="bank-edit-modal-{{$bank->id}}">
                    Edit
                </x-button>
            </x-td>
        </tr>
        @livewire('bank-edit-component', ['bank' => $bank], key(Carbon\Carbon::now()->timestamp.''.$bank->id))
    </x-table-body-component>
    @endforeach
</x-table-component>
@else
<div class=" mt-10 text-center mb-10 ">
   <i class="fa-solid fa-circle-plus"></i>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No banks</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <x-button data-modal-toggle="bank-create-modal">
            New bank
        </x-button>
    </div>
</div>
@endif
