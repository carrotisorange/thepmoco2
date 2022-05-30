<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            <x-search placeholder="search for reference no"></x-search>
        </div>
        <div class="mt-5">
            Total Collections: <b> {{ number_format($collections->sum('amount'),
                2)}}</b>
        </div>
        <div class="mt-5 p-3 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden sm:rounded-lg">
                            <div class="flex flex-row">
                                <div class="basis-1/7">
                                    @include('utilities.show-collection-filters')
                                </div>
                                <div class="basis-full ml-12">
                                    @if($collections->count())
                                    @include('utilities.show-collection-results')
                                    <p class="text-center">
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