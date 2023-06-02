<form wire:submit.prevent="submitForm()" method="POST">
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
                    <a href="/property/{{ Session::get('property') }}/contract" target="_blank" class="text-purple-700">
                        {{ $feature->feature }}
                    </a>
                </dt>
                <dd>{{ number_format($feature->price, 2) }}</dd>
            </div>

            @endforeach
        </div>
    </div>

    <div class="mt-10 flex justify-end border-t border-indigo-200 pt-6">
        @if($selectedFeature)
        <button type="submit"
            class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">


            Buy Now
        </button>
        @endif
    </div>
    </div>
</form>