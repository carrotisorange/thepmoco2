<x-new-layout>
   @section('title', $tenant->tenant.' | '.Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto md:px-6">
            @livewire('collection-tenant-edit-component', ['collections' => $collections,'tenant' => $tenant,'batch_no' => $batch_no])
        </div>
    </div>
</x-new-layout>

{{-- <x-new-layout>

    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $tenant->tenant }} /
                        Confirm Payments</h1>
                </div>

            </div>

           

</x-new-layout> --}}