<div class="overflow-hidden grid grid-cols-10 gap-1 md:grid:cols-1 sm:grid:cols-1">
    @foreach ($units as $unit)
    <div class="mt-5">
        @if(Session::get('tenant_uuid'))
        <x-button title="{{ $unit->unit }}"
            onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/tenant/{{ Session::get('tenant_uuid') }}/contract/{{ Str::random(8) }}/create'">

            <div>
                <div>
                    <img src="/storage/{{ $unit->thumbnail }}" />
                </div>
                <div>
                    <small> {{ $unit->unit }}</small>
                </div>
            </div>
        </x-button>
        @elseif(Session::get('owner_uuid'))
        <x-button title="{{ $unit->unit }}"
            onclick="window.location.href='/property/{{ Session::get('property') }}/unit/{{ $unit->uuid }}/owner/{{ Session::get('owner_uuid') }}/deed_of_sale/{{ Str::random(8) }}/create'">

            <div>
                <div>
                    <img src="/storage/{{ $unit->thumbnail }}" />
                </div>
                <div>
                    <small> {{ $unit->unit }}</small>
                </div>
            </div>
        </x-button>
        @else
        <x-button title="{{ $unit->unit }}" onclick="window.location.href='unit/{{ $unit->uuid }}'">
            {{-- --}}
            <div>
                <div>
                    <img src="/storage/{{ $unit->thumbnail }}" />
                </div>
                <div>
                    <small> {{ $unit->unit }}</small>
                </div>
            </div>
        </x-button>
        @endif

    </div>
    @endforeach
</div>