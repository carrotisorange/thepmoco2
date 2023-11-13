<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button data-modal-target="create-bulletin-modal" data-modal-toggle="create-bulletin-modal"> New
                    Bulletin
                </x-button>
            </div>
        </div>
        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    @if($bulletins->count())
                            <div class="mx-auto">
                                @foreach ($bulletins->take(1) as $bulletin)
                                <div class="lg:mx-20 mx-auto grid grid-grid-cols-1 lg:grid-cols-2 gap-10">

                                    <div class="col-span-2 mx-auto">
                                        <div class="py-4 flex justify-between">
                                            <h2 class=" text-lg">{{ $bulletin->title }}</h2>

                                            <a href="{{ asset('/storage/'.$bulletin->attachment) }}" target="_blank"
                                                class="text-white bg-purple-500 hover:bg-gray-700  font-medium rounded-full text-sm px-3 py-2.5 text-center">
                                                View
                                            </a>
                                        </div>

                                        <embed src="{{ asset('/storage/'.$bulletin->attachment) }}" type="application/pdf" height="500px" width="1200">
                                    </div>
                                </div>
                                @endforeach

                                <div class="mt-10">
                                    <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                                        Other Announcements
                                    </h1>
                                     @include('tables.bulletins')
                                </div>
                                        @else
                            <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8 mt-10 mb-10">
                                <div class="text-center mb-10">
                                    <sv class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            </sv        g>
                            <h3         class="mt-2 text-sm font-medium text-gray-900">No bulletins</h3>
                                    <p class="mt-1 text-sm text-gray-500">Get started by creating a new bulletin</p>
                                                <div class="mt-6">
                                                    <div class="group inline-block">
                                            <x-button 
                                                            data-modal-toggle="create-bulletin-modal"> New
                                                Bulletin
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
    @livewire('bulletin-create-component')
</div>
</div>
