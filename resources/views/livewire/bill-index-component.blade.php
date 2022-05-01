<div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
    <div class="">
        <x-search placeholder="search for reference no"></x-search>
    </div>
    <div class="mt-5">
        @if($selectedBills)
        <x-button onclick="myFunction()" wire:click="deleteUnits()"><i class="fa-solid fa-trash"></i>&nbsp
            Remove ({{ count($selectedBills) }})
        </x-button>
        @endif
    </div>
    <div class="mt-5 p-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="flex flex-row">
                <div class="basis-1/8">
                    @include('utilities.show-bill-filters')
                </div>
                <div class="basis-full ml-12">
                    <p class="">
                        @if($bills->count())
                        {{-- {{ $bills->links() }} --}}
                        Total Unpaid Bills: <b> {{ number_format($bills->where('status', 'unpaid')->sum('bill'),
                            2)}}</b>
                        <br>
                        Total Paid Bills: <b> {{ number_format($bills->where('status', 'paid')->sum('bill'), 2)}}</b>
                        @else
                        No bills found!
                    </p>
                    @endif
                    @include('utilities.show-bill-results')
                </div>
            </div>
        </div>
    </div>
</div>