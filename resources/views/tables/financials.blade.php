<x-table-component>
  <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th>DATE</x-th>
            <x-th>DESCRIPTION</x-th>
            <x-th>CASHIN FLOW</x-th>
            <x-th>CASHOUT FLOW</x-th>
            <x-th>REVENUE</x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($accountpayables->union($collections) as $index => $cashflow)
        <tr>
            <x-td>{{ $index+1 }}</x-td>
            <x-td>{{ $cashflow->date }}</x-td>
            <x-td>{{ $cashflow->label }}</x-td>
            <x-td>
                @if($cashflow->label == 'INCOME')
                {{ number_format($cashflow->amount, 2) }}
                @endif
            </x-td>
            <x-td>
                @if($cashflow->label == 'EXPENSE')
                {{ number_format($cashflow->amount, 2) }}
                @endif
            </x-td>
            <x-td></x-td>

        </tr>
        @endforeach
    </x-table-body-component>
    <x-table-body-component>
        <tr>
            <x-td><b>Total</b></x-td>
            <x-td></x-td>
            <x-td></x-td>
            <x-td><b>{{ number_format($cashflows->where('label', 'INCOME')->sum('amount'), 2) }}</b></x-td>
            <x-td><b>{{ number_format($cashflows->where('label', 'EXPENSE')->sum('amount'), 2) }}</b></x-td>
            @php
                $income = $cashflows->where('label', 'INCOME')->sum('amount');
                $expense = $cashflows->where('label', 'EXPENSE')->sum('amount')
            @endphp

            <x-td><b>{{ number_format($income-$expense, 2) }}</b></x-td>
        </tr>
    </x-table-body-component>
</x-table-component>
