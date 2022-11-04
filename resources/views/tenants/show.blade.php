<x-new-layout>
   @section('title', $tenant_details->tenant. ' | '. Session::get('property_name'))
  @livewire('tenant-edit-component', ['tenant_details' => $tenant_details])
</x-new-layout>

{{-- 
<x-new-layout>
   
    <div class="mt-5">
        <main class="flex-1 pb-8 h-screen y-screen overflow-y-scroll">
            <div class="h-full w-full bg-no-repeat bg-cover" style="background-image: url('/brands/tenant_bg.png');">
                <div class="mx-auto px-4 sm:px-6 lg:px-8">

                    <div class="pt-6 sm:pb-5">

                        <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <ol role="list" class="flex items-center space-x-4">
                                <li>
                                    <div class="flex items-center">
                                        <a href="{{ url()->previous() }}"><img class="h-5 w-auto" src="{{ asset('/brands/back-button.png') }}"></a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                       
                    </div>
                </div>
            </div>
        </main>
    </div>
</x-new-layout> --}}