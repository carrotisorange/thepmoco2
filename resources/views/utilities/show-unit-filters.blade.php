<div class="">
    @if($status_id || $is_enrolled || $category_id || $building_id || $floor_id || $rent ||
    $discount || $size)

    <span> <a class="text-red-600 cursor-pointer" wire:click="resetFilters"><i class="fa-solid fa-circle-xmark"></i>
            Reset
            filters</a></span>

    @else
    <span class="font-bold">Filters</span>



    @endif
</div>
<div class="">
    <div class="flex">
        <div>
            <div class="mt-5">
                <span>Status</span>
                @forelse ($statuses as $status)
                <div class="form-check">
                    <input wire:model="status_id"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="radio" value="{{ $status->status_id }}">
                    <label class="form-check-label inline-block text-gray-800" for="status_id">
                        {{ $status->status }} ({{ $status->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse

            </div>

            <div class="mt-5">
                <span>Enrollment Status</span>
                @forelse ($enrollment_statuses as $enrollment_status)

                <div class="form-check">
                    <input wire:model="is_enrolled"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="radio" value="{{ $enrollment_status->is_enrolled }}" id="flexCheckDefault">
                    @if($enrollment_status->is_enrolled == 1)
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        enrolled ({{ $enrollment_status->count }})
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
                <span>Category</span>
                @forelse ($categories as $category)

                <div class="form-check">
                    <input wire:model="category_id"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="radio" value="{{ $category->category_id }}" id="category_id">
                    <label class="form-check-label inline-block text-gray-800" for="category_id">
                        {{ $category->category }} ({{ $category->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>

            <div class="mt-5">
                <span>Building</span>
                @forelse ($buildings as $building)

                <div class="form-check">
                    <input wire:model="building_id"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="radio" value="{{ $building->building_id }}" id="building_id">
                    <label class="form-check-label inline-block text-gray-800" for="building_id">
                        {{ $building->building }} ({{ $building->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>

            <div class="mt-5">
                <span>Floor</span>
                @forelse ($floors as $floor)

                <div class="form-check">
                    <input wire:model="floor_id"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="radio" value="{{ $floor->floor_id }}" id="floor_id">
                    <label class="form-check-label inline-block text-gray-800" for="floor_id">
                        {{ $floor->floor }} ({{ $floor->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>

            <div class="mt-5">
                <span>Rent</span>
                @forelse ($rents as $rent)

                <div class="form-check">
                    <input wire:model="rent"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="radio" value="{{ $rent->rent }}" id="flexCheckDefault">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        ₱ {{ number_format($rent->rent, 2) }} ({{ $rent->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>
            <div class="mt-5">
                <span>Discount</span>
                @forelse ($discounts as $discount)

                <div class="form-check">
                    <input wire:model="discount"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="radio" value="{{ $discount->discount }}" id="flexCheckDefault">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        ₱ {{ number_format($discount->discount, 2) }} ({{ $discount->count }})
                    </label>
                </div>
                @empty
                <p>NA</p>
                @endforelse
            </div>
            <div class="mt-5">
                <span>Size</span>
                @forelse ($sizes as $size)

                <div class="form-check">
                    <input wire:model="size"
                        class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                        type="radio" value="{{ $size->size }}" id="flexCheckDefault">
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