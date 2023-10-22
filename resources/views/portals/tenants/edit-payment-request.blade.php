<x-tenant-portal-layout>
    @foreach ($payment_request as $item)
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <a href="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/payments/pending">
                            <img class="h-5 w-auto" src="{{ asset('/brands/back-button.png') }}">
                        </a>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                {{-- <h1 class="text-sm font-semibold text-gray-500">Pay Bills</h1> --}}
                <h1 class="ml-5 mt-5 text-3xl font-bold text-gray-700">Reference # {{ $item->batch_no }}</h1>
            </div>
            <div class="mt-2 sm:mt-0 sm:ml-16 sm:flex-none">

            </div>
        </div>



        <div class="mt-2 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <form>

                    <div class="relative w-full mb-5">



                    </div>
            </div>

            </form>

            <div class="sm:col-span-2">
                <form>

                    <div class="relative w-full mb-5">
                        <div class="flex absolute justify-end inset-y-0 left-0 items-center pl-3 pointer-events-none">

                        </div>




                    </div>


            </div>



            </form>






        </div>


        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">



            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                </div>

                <div>
                    <div class="flex justify-center mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                        <div class="mt-5 md:mt-0 md:col-span-6">

                            @include('forms.tenants.paymentrequest-edit')
                            @endforeach
</x-tenant-portal-layout>