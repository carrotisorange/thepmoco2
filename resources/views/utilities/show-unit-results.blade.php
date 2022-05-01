<div class="grid grid-cols-6 gap-1 md:grid:cols-1 sm:grid:cols-1">
    @foreach ($units as $unit)
    <div class="mt-5">
        <x-button title="{{ $unit->unit }}" onclick="window.location.href='/unit/{{ $unit->uuid }}/edit'">
            <div>
                <div>
                    <img src="/storage/{{ $unit->thumbnail }}" />
                </div>
                <div>
                    <small> {{ $unit->unit }}</small>
                </div>
            </div>
        </x-button>
    </div>
    @endforeach
</div>