<div class="">
    @if($status_id || $is_enrolled || $category_id || $building_id || $floor_id || $rent || $occupancy ||
    $discount || $size)

    <span>
        <x-button class="text-black-600 cursor-pointer" wire:click="resetFilters"><i
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
                <b>Status</b>
                @forelse ($statuses as $status)
                <div class="form-check">
                    <x-input wire:model="status_id" type="checkbox" value="{{ $status->status_id }}" />
                    <label class="form-check-label inline-block text-gray-800" for="status_id">
                        {{ $status->status }} ({{ $status->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse

            </div>
            <div class="mt-5">
                <b>Leasing</b>
                @forelse ($enrollment_statuses as $enrollment_status)
                <div class="form-check">
                    <x-input wire:model="is_enrolled" type="checkbox" value="{{ $enrollment_status->is_enrolled }}"
                        id="flexCheckDefault" />
                    @if($enrollment_status->is_enrolled == 1)
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        enrolled ({{ $enrollment_status->count }})
                    </label>
                    @elseif($enrollment_status->is_enrolled == 2)
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        pulled out ({{ $enrollment_status->count }})
                    </label>
                    @else
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        unenrolled ({{ $enrollment_status->count }})
                    </label>
                    @endif

                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>

            <div class="mt-5">
                <b>Category</b>
                @forelse ($categories as $category)

                <div class="form-check">
                    <x-input wire:model="category_id" type="checkbox" value="{{ $category->category_id }}"
                        id="category_id" />
                    <label class="form-check-label inline-block text-gray-800" for="category_id">
                        {{ $category->category }} ({{ $category->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>
{{-- 
            <div class="mt-5">
                <b>Building</b>
                @forelse ($buildings as $building)
                <div class="form-check">
                    <x-input wire:model="building_id" type="checkbox" value="{{ $building->building_id }}"
                        id="building_id" />
                    <label class="form-check-label inline-block text-gray-800" for="building_id">
                        {{ $building->building }} ({{ $building->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div> --}}
            <div class="mt-5">
                <b>Floor</b>
                @forelse ($floors as $floor)

                <div class="form-check">
                    <x-input wire:model="floor_id" type="checkbox" value="{{ $floor->floor_id }}" id="floor_id" />
                    <label class="form-check-label inline-block text-gray-800" for="floor_id">
                        {{ $floor->floor }} ({{ $floor->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>

            <div class="mt-5">
                <b>Rent</b>
                @forelse ($rents as $rent)

                <div class="form-check">
                    <x-input wire:model="rent" type="checkbox" value="{{ $rent->rent }}" id="flexCheckDefault" />
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        {{ number_format($rent->rent, 2) }} ({{ $rent->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>

            <div class="mt-5">
                <b>Occupancy</b>
                @forelse ($occupancies as $occupancy)
            
                <div class="form-check">
                    <x-input wire:model="occupancy" type="checkbox" value="{{ $occupancy->occupancy }}" id="flexCheckDefault" />
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                       {{ $occupancy->occupancy }} pax ({{ $occupancy->count }}) 
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>

            <div class="mt-5">
                <b>Discount</b>
                @forelse ($discounts as $discount)
                <div class="form-check">
                    <x-input wire:model="discount" type="checkbox" value="{{ $discount->discount }}"
                        id="flexCheckDefault" />
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        {{ number_format($discount->discount, 2) }} ({{ $discount->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>
            <div class="mt-5">
                <b>Size</b>
                @forelse ($sizes as $size)
                <div class="form-check">
                    <x-input wire:model="size" type="checkbox" value="{{ $size->size }}" id="flexCheckDefault" />
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        {{ $size->size }} sqm ({{ $size->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
