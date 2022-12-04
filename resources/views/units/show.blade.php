<x-new-layout>
    @section('title', $unit_details->unit. ' | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-w-full mx-auto sm:px-6">
            <div class="pt-6 sm:pb-5">
                <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <ol role="list" class="flex items-center space-x-4">
                        <li>
                            <div class="flex items-center">
                                <a href="{{ url()->previous() }}">
                                    <img class="h-5 w-auto" src="{{ asset('/brands/back-button.png') }}">
                                </a>
                            </div>
                        </li>
                    </ol>
                </nav>
                @livewire('unit-edit-component', ['unit_details' => $unit_details])
            </div>
        </div>
    </div>
</x-new-layout>