<div>
    <div class="mt-10 mb-10">
        <legend class="text-base font-semibold leading-6 text-gray-900">Please click on the checklist to export</legend>
        <br>
<fieldset>
    <div class="space-y-5">
        <div class="relative flex items-start">
            <div class="flex h-6 items-center">
                <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" checked disabled
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
            </div>
            <div class="ml-3 text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900"><a target="_blank"
                    href="/property/{{ $property->uuid }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/moveout/step-3/export">Moveout Clearance Form</a></label>
            </div>
        </div>

      
        <div class="relative flex items-start">
            <div class="flex h-6 items-center">
                <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" checked disabled
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
            </div>
            <div class="ml-3 text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900"><a target="_blank"
                        href="/property/{{ $property->uuid }}/unit/{{ $contract->unit_uuid }}/inventory/{{ Str::random(8) }}/export">Unit Inventory
                    </a></label>
            </div>
        </div>

        <div class="relative flex items-start">
            <div class="flex h-6 items-center">
                <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" checked disabled
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
            </div>
            <div class="ml-3 text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900"><a target="_blank"
                       href="/property/{{ $contract->property_uuid }}/tenant/{{ $contract->tenant_uuid }}/bill/export">Statements of Account</a></label>
            </div>
        </div>

        <div class="relative flex items-start">
                <div class="flex h-6 items-center">
                    <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" checked disabled
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                </div>
                <div class="ml-3 text-sm leading-6">
                    @if($contract->contract)
                    <label for="comments" class="font-medium text-gray-900"><a target="_blank"
                                    href="{{ asset('/storage/'.$contract->contract) }}">Signed Contract</a></label>
                    @else
                        <label for="comments" class="font-medium text-gray-900"><a
                                        href="#/">No signed contract was uploaded</a></label>
                    @endif
          
                </div>
            </div>
       
    </div>
</fieldset>
    </div>
  <div class="mt-10 text-center mb-10">
    <button type="button" onclick="window.location.href='/property/{{ $property->uuid}}/tenant/{{ $contract->tenant_uuid }}'"
        class="inline-flex items-center rounded-md border border-transparent bg-purple-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">

        <svg wire:loading class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
            </path>
        </svg>
        Finish
    </button>
</div>
</div>