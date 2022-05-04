<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            <x-search placeholder="search for reference no"></x-search>

        </div>
        <div class="mt-5">
            @if($bills->count() < 10)
            <p class="text-center text-sm">Showing <b>{{ $bills->count() }}</b> bills...</p>
            @endif

            @if($selectedBills)
            <x-button onclick="confirmMessage()" wire:click="deleteBills()"><i class="fa-solid fa-trash"></i>&nbsp
                Remove ({{ count($selectedBills) }})
            </x-button>

            {{-- <x-button onclick="window.location.href='/bill/{{ $reference_no }}'"><i class="fa-solid fa-cash-register"></i>&nbsp
                Pay ({{ count($selectedBills) }})
            </x-button> --}}
            @endif
        </div>
        <div class="mt-5 p-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                            <div class="flex flex-row">
                                <div class="basis-1/8">
                                    @include('utilities.show-bill-filters')
                                </div>
                                <div class="basis-full ml-12">
                                    <p class="">
                                        @if($bills->count())
                                        {{ $bills->links() }}
                                        Total Unpaid Bills: <b> {{ number_format($bills->where('status',
                                            'unpaid')->sum('bill'),
                                            2)}}</b>
                                        ,
                                        Total Paid Bills: <b> {{ number_format($bills->where('status',
                                            'paid')->sum('bill'),
                                            2)}}</b>
                                        @else

                                    </p>
                                    @endif
                                    @include('utilities.show-bill-results')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@include('utilities.create-particular-modal');