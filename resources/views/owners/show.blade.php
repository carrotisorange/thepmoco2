<x-new-layout>
    @section('title', $owner_details->owner. ' | '. Session::get('property_name'))
    <div class="h-full w-full bg-no-repeat bg-cover" style="background-image: url('/brands/tenant_bg.png');">
        <div class="mt-8">
            <div class="max-w-full mx-auto sm:px-6">
                <div class="pt-6 sm:pb-5">
                    <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <ol role="list" class="flex items-center space-x-4">
                            <li>
                                <div class="flex items-center">
                                    <a href="/property/{{ Session::get('property')}}/tenant">
                                        <img class="h-5 w-auto" src="{{ asset('/brands/back-button.png') }}">
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    @livewire('owner-edit-component', ['owner_details' => $owner_details])
                </div>
            </div>
        </div>
    </div>
</x-new-layout>