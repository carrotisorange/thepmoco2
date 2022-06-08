<div class="mb-3 w-1/4">
    <x-search placeholder="search for reference no"></x-search>
</div>

<div class="flex flex-row">
    {{-- <div class="basis-full">
        <b>Search</b>
        <div class="basis-full mt-1">
            <x-search class="w-1/4" placeholder="search for reference no"></x-search>
        </div>

    </div> --}}

    <div class="basis-full">

        <b>Particular</b>
        <div class="mt-1">
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
    <div class="basis-full">

        <b>Status</b>
        <div class="mt-1">
            @forelse ($statuses as $status)
            <div class="form-check">
                <x-input wire:model="status" type="checkbox" value="{{ $status->status }}" />
                <label class="form-check-label inline-block text-gray-800" for="{{ $status->status }}">
                    {{ $status->status }} ({{ $status->count }})
                </label>
            </div>
            @empty
            <p>NA</p>
            @endforelse
        </div>
    </div>
    <div class="basis-full">
        <div class="mt-1">
            <b>Date posted </b>
            <div class="mt-3">
                <div class="form-check">
                    <x-input wire:model="created_at" type="date" value="" />
                    <label class="form-check-label inline-block text-gray-800" for="created_at">

                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="basis-full">
        <div class="mt-1">
            <b>Period Covered</b>
            <div class="mt-4">

                <div class="form-check">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        Start
                    </label>
                    <x-input wire:model="start" type="date" value="" />

                </div>
                <div class="form-check">
                    <label class="form-check-label inline-block text-gray-800" for="flexCheckDefault">
                        End
                    </label>
                    <x-input wire:model="end" type="date" value="" />
                </div>
            </div>
        </div>
    </div>
</div>