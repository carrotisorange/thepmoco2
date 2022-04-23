<div class="grid grid-cols-6 gap-1 md:grid:cols-1 sm:grid:cols-1">
    @foreach ($units as $unit)
    <div class="mt-5">
        <x-button title="{{ $unit->unit }}" onclick="window.location.href='/unit/{{ $unit->uuid }}'">
            <i class="fas fa-home fa-2x"></i> &nbsp
            <small> {{ $unit->unit }}</small>
        </x-button>

        {{-- <x-button class="lg:hidden" title="{{ $unit->unit }}" onclick="window.location.href='/unit/{{ $unit->uuid }}'">
            
            <small> {{ $unit->unit }}</small>
        </x-button> --}}

    </div>
    @endforeach
</div>