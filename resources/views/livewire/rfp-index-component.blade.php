<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            @if($propertyRfpCount)
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/rfp/{{ 'purchase' }}/{{ Str::random(3) }}/store'">
                    New Request
                </x-button>
            </div>
            @endif
        </div>
        @if($propertyRfpCount)
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <x-label for="">Filter status</x-label>
                <x-form-select id="status" name="status" wire:model="status" class="">
                    <option value="">Show all</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->status }}" {{ $status->status===$status? 'selected' : 'Select one' }}>
                        {{ $status->status }}
                    </option>
                    @endforeach
                </x-form-select>
            </div>
            <div class="sm:col-span-3">
                <x-label for="">Filter date requested</x-label>
                <x-form-select id="created_at" name="created_at" wire:model="created_at" class="">
                    <option value="">Select date</option>
                    <option value="{{ $created_at }}">{{ Carbon\Carbon::parse($created_at)->format('M, Y') }}</option>
                    @foreach ($dates as $date)
                    @if(Carbon\Carbon::parse($date->created_at)->format('M, Y') !=
                    Carbon\Carbon::parse($created_at)->format('M, Y'))
                    <option value="{{ $date->created_at }}">{{ Carbon\Carbon::parse($date->created_at)->format('M, Y')
                        }}</option>
                    @endif
                    @endforeach
                </x-form-select>
            </div>
        </div>
        @endif
        <div class="overflow-auto -my-2 -mx-4 sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2  shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    @if($accountpayables->count())
                        @include('tables.accountpayables')
                    @else
                    <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                        <div class="text-center mb-10">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No pending requests found</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new request</p>
                            <div class="mt-6">
                                <div class="group inline-block">
                                    <x-button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/rfp/{{ 'purchase' }}/{{ Str::random(3) }}/store'">
                                        <span class="pr-1 font-semibold flex-1">New Request</span>
                                    </x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
