<div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
<div class="">
    <x-search placeholder="search for reference no"></x-search>
</div>
<div class="mt-5">

</div>
<div class="mt-5 p-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">
        <div class="flex flex-row">
            <div class="basis-1/8">
                @include('utilities.show-bill-filters')
            </div>
            <div class="basis-3/4 ml-12">
                <p class="text-center">
                    @if($bills->count())
                    {{ $bills->links() }}
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