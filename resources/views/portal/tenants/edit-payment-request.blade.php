<x-tenant-portal-layout>
    @section('title', 'Payments')
    @foreach ($payment_request as $item)


    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <nav aria-label="Breadcrumb" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <ol role="list" class="flex items-center space-x-4">
                <li>
                    <div class="flex items-center">
                        <a
                            href="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/payments_request/{{ $item->batch_no }}/destroy">
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


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">



            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">

                <div class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                    <!-- Selected row actions, only show when rows are selected. -->
                    <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                    </div>

                </div>

                <div>
                    <div class="flex justify-center mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                        <div class="mt-5 md:mt-0 md:col-span-6">

                            <form
                                action="/{{auth()->user()->role_id}}/tenant/{{ auth()->user()->username }}/payments_request/{{ $item->batch_no }}/update"
                                enctype="multipart/form-data" method="POST">
                                @method('patch')
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-4 gap-6">


                                            <div class="sm:col-span-6">
                                                <label class="block text-sm font-medium text-gray-700"> Upload a proof of payment
                                                </label>
                                                <div
                                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                                    <div class="space-y-1 text-center">
                                                        <svg class="mx-auto h-12 w-12 text-gray-400"
                                                            stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                                            aria-hidden="true">
                                                            <path
                                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>
                                                        <div class="flex text-sm text-gray-600">
                                                            <label for="file-upload"
                                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                                <span>Upload a proof of payment</span>
                                                                <input id="file-upload" name="proof_of_payment" type="file" required
                                                                    class="sr-only">
                                                            </label>
                                                            <p class="pl-1">or drag and drop</p>
                                                        </div>
                                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 text-right sm:px-6">
                                            <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Confirm
                                                Payment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @endforeach
</x-tenant-portal-layout>