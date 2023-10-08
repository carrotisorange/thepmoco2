<div>
    @include('layouts.notifications')
        <div class="sm:flex sm:items-center justify-between pb-8">
            <div class="sm:flex-auto">
                <h1 class="text-xl font-semibold text-gray-900">Remittances</h1>
               <x-button type="button" data-modal-toggle="instructions-create-remittance-modal"
                    type="button">Create remittance
                </x-button>
            </div>
            <div class="flex justify-end">
               
                <p class="text-sm font-light">Filter by Month:</p>

                <x-form-select id="small" wire:model="created_at">
                    <option value="{{ $created_at }}">{{ Carbon\Carbon::parse($created_at)->format('M, Y') }}</option>  
                   @foreach ($dates as $date)
                    @if(Carbon\Carbon::parse($date->created_at)->format('M, Y') != Carbon\Carbon::parse($created_at)->format('M, Y'))
                        <option value="{{ $date->created_at }}">{{ Carbon\Carbon::parse($date->created_at)->format('M, Y') }}</option>
                    @endif
                   @endforeach
                </x-form-select>

            </div>
        </div>



        <div class="pb-16">
            <div class="outer-wrapper">
                <div class="table-wrapper">
                    @include('tables.remittances')
                </div>
            </div>
        </div>
        @include('modals.instructions.create-remittance-modal')
</div>
