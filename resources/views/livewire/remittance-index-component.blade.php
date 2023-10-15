<div>
    {{-- @include('layouts.notifications') --}}
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-700">
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>

          <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

            <x-button data-modal-toggle="instructions-create-remittance-modal" type="button">Create
                remittance
            </x-button>


                    <x-form-select id="small" wire:model="created_at">
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

        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">

                    @if($remittances->count())

                    @include('tables.remittances')
                    @else
                    <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                        <div class="text-center mb-10">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No remittances</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new remittance</p>
                            <div class="mt-6">
                                <div class="group inline-block">
                                    <x-button data-modal-toggle="instructions-create-remittance-modal"
                                        type="button">Create remittance
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
    @include('modals.instructions.create-remittance-modal')
</div>
