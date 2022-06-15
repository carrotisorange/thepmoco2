@if(App\Models\Property::find(Session::get('property'))->units->count())
<div class="border-b pb-5 border-gray-200">
    <x-search placeholder="Search for units..."></x-search>
    <div class="mt-2">
        {{ $units->links() }}
    </div>
    <div class="p-6 mt-3 overflow-x-auto bg-white border rounded shadow">
        <div class="flex flex-row">
            <div class="basis-1/4 mt-10 ml-10">
                @include('utilities.show-unit-filters')
            </div>
            <div class="basis-full">
                @include('utilities.show-unit-results')
            </div>
        </div>
    </div>
</div>
@else
<p class="text-left">No data found.</p>
@endif