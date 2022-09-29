<form>
    <div class="px-10 mt-10">
        <h3 class="text-lg font-medium text-gray-900">Select and Unlock Features:</h3>
        <p class="mt-3 text-sm "><span class="font-bold text-sm text-red-900">note:</span> You can
            <span class="font-semibold">cancel</span> subscription to this feature <span
                class="font-semibold">anytime!</span>

            Cancellation will only be applied on <span class="font-semibold">next billing
                date.</span>
        </p>

        <div class="px-5 mt-6">
            @foreach ($features as $index => $feature)
            <div class="mt-5 flex items-center justify-between" wire:key="feature-field-{{ $feature->id }}">
               
                    <dt>
                        <input type="checkbox" wire:model="selectedFeature" value="{{ $feature->id }}" class="mr-3">
                        <a href="/property/{{ Session::get('property') }}/contract" target="_blank"
                            class="text-purple-700"> {{ $feature->feature }}
                        </a>
                    </dt>
                    <dd>{{ number_format($feature->price, 2) }}</dd>
                </div>
           
            @endforeach
        </div>
    </div>

    <div class="mt-10 flex justify-end border-t border-indigo-200 pt-6">
        @if($selectedFeature)
        <button type="submit" wire:click="submitForm()"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

            <svg wire:loading wire:target="submitForm" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                </circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            Buy Now
        </button>
        @endif
    </div>
    </div>
</form>