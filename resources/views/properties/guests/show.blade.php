<x-new-layout>
    <div class="min-h-screen bg-no-repeat bg-cover" style="background-image: url('/brands/bg_tenant.png');">
        <div class="h-full w-full mb-20">
            <div class="max-w-full mx-auto sm:px-6">
                <div class="pt-6 sm:pb-5">
                    <nav aria-label="Breadcrumb" class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8">
                        <ol role="list" class="flex items-center space-x-4">
                            <li>
                                <div class="flex items-center">
                                    <a class="" href="/property/{{ $guest_details->property->uuid }}/guest">
                                        <img class="h-5 w-auto" src="{{ asset('/brands/back-button.png') }}">
                                    </a>
                                </div>
                            </li>
                        </ol>
                    </nav>
                    @livewire('guest-show-component', ['property'=> $property ,'guest_details' => $guest_details])
                </div>
            </div>
        </div>
    </div>
</x-new-layout>
