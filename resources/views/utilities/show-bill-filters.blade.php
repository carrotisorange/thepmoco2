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
            <b>Date posted</b>
            <div class="mt-3 p-2">
                <x-form-select wire:model="created_at">
                    <option value="">Select one</option>
                    @foreach ($dates_posted as $created_at)
                    <option value="{{ $created_at->created_at }}" {{ $created_at==$created_at->created_at ? 'selected':
                        ''}}>{{ Carbon\Carbon::parse($created_at->created_at)->format('M d, Y') }}</option>
                    @endforeach
                </x-form-select>
            </div>
        </div>
    </div>
    <div class="basis-full">
        <div class="mt-1">
            <b>Period Covered</b>
            <div class="mt-3 p-2">
                <x-form-select wire:model="start">
                    <option value="">Select one</option>
                    @foreach ($period_covered_starts as $period_covered_start)
                    <option value="{{ $period_covered_start->start }}" {{ $start==$period_covered_start->start ?
                        'selected':
                        ''}}>{{ Carbon\Carbon::parse($period_covered_start->start)->format('M d, Y') }}</option>
                    @endforeach
                </x-form-select>

                <x-form-select wire:model="end">
                    <option value="">Select one</option>
                    @foreach ($period_covered_ends as $period_covered_end)
                    <option value="{{ $period_covered_end->end }}" {{ $end==$period_covered_end->end ?
                        'selected':
                        ''}}>{{ Carbon\Carbon::parse($period_covered_end->end)->format('M d, Y') }}</option>
                    @endforeach
                </x-form-select>
            </div>
        </div>
    </div>
    {{-- <div class="basis-full">
        <div class="mt-1">
            <b></b>
            <div class="mt-3 p-2">

            </div>
        </div>
    </div> --}}
</div>