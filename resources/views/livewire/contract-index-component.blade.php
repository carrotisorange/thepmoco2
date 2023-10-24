<div>

    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>

            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">

                <x-button onclick="window.location.href='{{ asset('/brands/docs/Contract of Lease TEMPLATE.docx') }}'">
                    Sample Lease Contract</x-button>

                <x-button data-modal-toggle="instructions-create-contract-modal"> New Contract</x-button>

            </div>
        </div>


        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">


            <div class="sm:col-span-6">
                <x-form-select name="status" wire:model="status">
                    <option value="" selected>Filter status</option>
                    @foreach ($statuses as $status)
                    <option value="{{ $status->status }}">{{ $status->status }}</option>
                    @endforeach
                </x-form-select>

            </div>

        </div>

        <div class="mt-3">
            {{ $contracts->links() }}
        </div>
        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden ">
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>
                    @if($statuses->count())
                    @include('tables.contracts')
                    @else
                    <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                        <div class="text-center mb-10">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" aria-hidden="true">
                                <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No contracts</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new contract</p>
                            <div class="mt-6">
                                <x-button data-modal-toggle="instructions-create-contract-modal">

                                    New Contract
                                </x-button>
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
    @include('modals.instructions.create-contract-modal')
</div>
