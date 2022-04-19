<div class="grid grid-cols-6 gap-1 text-center sm:grid-cols-1 gap-1">
    @foreach ($units as $unit)

    <div class="mt-5">
        <x-button title="{{ $unit->unit }}" style="width: 85px; height: 60px;"
            href="/unit/{{ $unit->uuid }}" class="text-indigo-600">
            <i class="fas fa-home fa-2x"></i>
            
            <small> {{ $unit->unit }}</small>
        </x-button>
       
  
    </div>

    @endforeach
</div>


{{-- @if($units->count())
<span class="font-bold">Results ({{ $units->count() }})...</span>
@else
<p class="text-center text-red-600">No units found!</p>
@endif
@foreach($units as $unit)
<a href="/unit/{{ $unit->uuid }}"><img src="/storage/{{ $unit->thumbnail }}"
        class="p-2 bg-white border rounded max-w-md mt-5 mx-5 ml-5 mr-5 hover:bg-purple-600" alt="..." /></a>
@endforeach --}}