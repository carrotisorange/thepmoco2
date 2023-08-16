<x-new-layout>
    @section('title', $tenant_details->tenant. ' | '. Session::get('property'))
    <div class="min-h-screen bg-no-repeat bg-cover" style="">
        <div class="h-full w-full mb-20">
            <div class="max-w-full mx-auto sm:px-6">
                <div class="pt-6 sm:pb-5">
                    <nav aria-label="Breadcrumb" class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
                        <ol role="list" class="flex items-center space-x-4">
                            <li>
                                <div class="flex items-center">
                                    <a class="" href="/property/{{ Session::get('property_uuid')}}/tenant">
                                        <img class="h-5 w-auto" src="{{ asset('/brands/back-button.png') }}">
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    @livewire('tenant-show-component', ['property'=> $property ,'tenant_details' => $tenant_details])
                </div>
            </div>
        </div>
    </div>
</x-new-layout>