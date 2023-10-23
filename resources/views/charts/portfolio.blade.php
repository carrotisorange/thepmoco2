<x-new-layout-base>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <x-button onclick="window.location.href='/property/'">
                    Back
                </x-button>

            </div>
        </div>
    </div>
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="mt-10 px-4 sm:px-6 lg:px-8">
               <div class="container px-4 mx-auto">
                    <div class="p-6 m-20 bg-white rounded shadow">
                        {!! $chart->container() !!}
                    </div>
                </div>
                <script src="{{ $chart->cdn() }}"></script>
                {{ $chart->script() }}
            </div>
        </div>
    </div>
    </div>
</x-new-layout>
