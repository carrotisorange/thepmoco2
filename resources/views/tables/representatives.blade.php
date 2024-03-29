@if($representatives->count())
<x-table-component>
  <x-table-head-component>
        <tr>
            <x-th>#</x-th>
            <x-th> NAME </x-th>
            <x-th>  RELATIONSHIP </x-th>
            <x-th>   MOBILE  </x-th>
            <x-th> EMAIL </x-th>
            <x-th> </x-th>
            <x-th></x-th>
        </tr>
    </x-table-head-component>
    <x-table-body-component>
        @foreach ($representatives as $index => $representative)
        <tr>
            <x-td> {{$index+1}}  </x-td>
            <x-td> {{ $representative->representative }}   </x-td>
            <x-td> {{ $representative->relationship->relationship }}   </x-td>
            <x-td>  {{ $representative->mobile_number }}  </x-td>
            <x-td> {{ $representative->email }}  </x-td>
            <x-td>
                @if($representative->valid_id)
                <a href="{{ asset('/storage/'.$representative->valid_id) }}" target="_blank"
                    class="text-purple-600 hover:text-purple-900">View
                    Valid ID</a>
                @else
                Valid ID is not available
                @endif
            </x-td>
            <x-td>
                <a href="#/" wire:click="removeRepresentative({{ $representative->id }})"
                    class="text-red-600 hover:text-red-900">
                    Remove</a>
            </x-td>
        </tr>
        @endforeach
    </x-table-body-component>
</x-table-component>
@else
<div class=" mt-10 text-center mb-10 ">
   <i class="fa-solid fa-circle-plus"></i>
    <h3 class="mt-2 text-sm font-medium text-gray-900">No representatives</h3>
    <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
    <div class="mt-6">
        <x-button
            onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/owner/{{ $owner_details->uuid }}/representative/create'">
            New representative
        </x-button>
    </div>
</div>
@endif
