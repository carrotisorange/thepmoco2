<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            <x-search placeholder="search for reference no"></x-search>

        </div>
        <div class="mt-5">
            
            Total Unpaid Bills: <b> {{ number_format($bills->where('status',
                'unpaid')->sum('bill'),
                2)}}</b>,
            Total Paid Bills: <b> {{ number_format($bills->where('status',
                'paid')->sum('bill'),
                2)}}</b>
            @if($bills->count())
            <p class="text-center text-sm">Showing <b>{{ $bills->count() }}</b> bills...</p>
            @endif

            @if($selectedBills)
            <x-button onclick="confirmMessage()" wire:click="deleteBills()"><i class="fa-solid fa-trash"></i>&nbsp
                Remove ({{ count($selectedBills) }})
            </x-button>

            @if($total_count)
            <x-button onclick="confirmMessage()" wire:click="unpayBills()"><i class="fa-solid fa-rotate-right"></i>&nbsp
                Mark as Unpaid ({{ $total_count }})
            </x-button>
            @endif

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
                                    @if($bills->count())
                                    @include('utilities.show-bill-results')
                                    <p class="text-center">

                                        {{-- {{ $bills->links() }} --}}
                                        @else
                                    <div class="text-center mt-12">
                                        <span>No results found!</span>
                                        <img class="" src="{{ asset('/brands/no_results.png') }}" />

                                    </div>
                                    </p>
                                    @endif

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