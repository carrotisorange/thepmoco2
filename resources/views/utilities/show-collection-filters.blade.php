<div class="">
    <div class="flex">
        <div>
            
            <div class="mt-5">
                <b>Date collected</b>
                <div class="">
                    <span>From ({{ $collections->count() }})</span>
                    <div class="form-check">
                        <x-input wire:model="start" type="date" value="" />
                        <label class="form-check-label inline-block text-gray-800" for="start">

                        </label>
                    </div>
                </div>
                <div class="">
                    <span>To ({{ $collections->count() }})</span>
                    <div class="form-check">
                        <x-input wire:model="end" type="date" value="" />
                        <label class="form-check-label inline-block text-gray-800" for="start">

                        </label>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>