<div>
    {{-- @include('layouts.notifications') --}}
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
                    href="/property/{{ Session::get('property_uuid') }}/tenant/{{ $contract->tenant_uuid }}/contract/{{ $contract->uuid }}/moveout/step-3/export">Moveout Clearance Form</a></label>
            </div>
        </div>


        <div class="relative flex items-start">
            <div class="flex h-6 items-center">
                <input id="comments" aria-describedby="comments-description" name="comments" type="checkbox" checked disabled
                    class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
            </div>
            <div class="ml-3 text-sm leading-6">
                <label for="comments" class="font-medium text-gray-900"><a target="_blank"
                        href="/property/{{ Session::get('property_uuid') }}/unit/{{ $contract->unit_uuid }}/inventory/{{ Str::random(8) }}/export">Unit Inventory
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
    <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid')}}/tenant/{{ $contract->tenant_uuid }}'">
        Finish
    </x-button>
</div>
</div>
