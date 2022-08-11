<div>

    <div class="flex flex-row">
        <div class="basis-1/2">
            @if(App\Models\Property::find(Session::get('property'))->units->count())
            <x-button wire:loading.remove wire:click="updateForm()">
                Save Units ({{ $units->count() }})
            </x-button>
            @endif
            <div wire:loading wire:target="updateForm">
                Processing...
            </div>
        </div>
        <div class="basis-1/2 ml-12 text-right">
            @if($selectedUnits)
            <x-button wire:loading.remove class="bg-red-800" onclick="confirmMessage()" wire:click="removeUnits()">
                Remove Units ({{ count($selectedUnits) }})
            </x-button>
            @endif
            <div wire:loading wire:target="removeUnits">
                Processing...
            </div>
        </div>
    </div>
    @include('forms.unit-bulk-edit')
    @include('layouts.notifications')
</div>