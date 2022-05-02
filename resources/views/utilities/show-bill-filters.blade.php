<div class="">
    @if($status || $end || $start || $particular_id || $created_at)
    <span>
        <x-button class="text-red-600 cursor-pointer" wire:click="resetFilters"><i
                class="fa-solid fa-circle-xmark"></i>&nbsp
            Clear filters</x-button>
    </span>
    @else
    <span class="font-bold">Apply Filters</span>
    @endif
</div>
<div class="">
    <div class="flex">
        <div>
            <div class="mt-5">
                <b>Date posted ({{ $bills->count() }})</b>
                <div class="form-check">
                    <x-input wire:model="created_at" type="date" value="" />
                    <label class="form-check-label inline-block text-gray-800" for="created_at">

                    </label>
                </div>
            </div>
            <div class="mt-5">
                <b>Status</b>
                @forelse ($statuses as $status)
                <div class="form-check">
                    <x-input wire:model="status" type="checkbox" value="{{ $status->status }}" />
                    <label class="form-check-label inline-block text-gray-800" for="status">
                        {{ $status->status }} ({{ $status->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse

            </div>

            <div class="mt-5">
                <b>Period Covered</b>
                <div class="mt-2">
                    <span>Start ({{ $bills->count() }})</span>
                    <div class="form-check">
                        <x-input wire:model="start" type="date" value="" />
                        <label class="form-check-label inline-block text-gray-800" for="start">

                        </label>
                    </div>
                </div>
                <div class="mt-2">
                    <span>End ({{ $bills->count() }})</span>
                    <div class="form-check">
                        <x-input wire:model="end" type="date" value="" />
                        <label class="form-check-label inline-block text-gray-800" for="start">

                        </label>
                    </div>
                </div>
            </div>


            <div class="mt-5">
                <b>Particular</b>
                @forelse ($particulars as $particular)

                <div class="form-check">
                    <x-input wire:model="particular_id" type="checkbox" value="{{ $particular->particular_id }}"
                        id="particular_id" />
                    <label class="form-check-label inline-block text-gray-800" for="particular_id">
                        {{ $particular->particular }} ({{ $particular->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>


        </div>
    </div>
</div>