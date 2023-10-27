<x-new-layout>
    @section('title','Election | '. env('APP_NAME'))



    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            <div class="sm:flex-auto">
                <h1 class="pl-6 text-3xl font-bold text-gray-500">Bulletin</h1>
            </div>

            <div class="mx-auto">
                <div class="lg:mx-20 mx-auto grid grid-grid-cols-1 lg:grid-cols-2 gap-10">

                    <div class="col-span-1 mx-auto">
                        <div class="py-4 flex justify-between">
                            <h2 class=" text-lg">Board Resolution</h2>


                            <button class="text-white bg-purple-500 hover:bg-gray-700  font-medium rounded-full text-sm px-3 py-2.5 text-center" type="button" data-modal-toggle="default-modal">
                            View
                            </button>


                        </div>

                        <embed  src="{{ asset('/brands/board.pdf') }}" type="application/pdf"   height="500px" width="500">



                    </div>

                    <div class="col-span-1 mx-auto">
                        <div class="py-4 flex justify-between">
                            <h2 class=" text-lg">Minutes of General Assembly</h2>


                            <button class="text-white bg-purple-500 hover:bg-gray-700  font-medium rounded-full text-sm px-3 py-2.5 text-center" type="button" data-modal-toggle="default-modal">
                            View
                            </button>


                        </div>

                        <embed  src="{{ asset('/brands/board.pdf') }}" type="application/pdf"   height="500px" width="500">



                    </div>

                    <div class="col-span-1 mx-auto">
                        <div class="py-4 flex justify-between">
                            <h2 class=" text-lg">DHSUD Registration</h2>


                            <button class="text-white bg-purple-500 hover:bg-gray-700  font-medium rounded-full text-sm px-3 py-2.5 text-center" type="button" data-modal-toggle="default-modal">
                            View
                            </button>


                        </div>

                        <embed  src="{{ asset('/brands/board.pdf') }}" type="application/pdf"   height="500px" width="500">



                    </div>

                    <div class="col-span-1 mx-auto">
                        <div class="py-4 flex justify-between">
                            <h2 class=" text-lg">General Information Sheet</h2>


                            <button class="text-white bg-purple-500 hover:bg-gray-700  font-medium rounded-full text-sm px-3 py-2.5 text-center" type="button" data-modal-toggle="default-modal">
                            View
                            </button>


                        </div>

                        <embed  src="{{ asset('/brands/board.pdf') }}" type="application/pdf"   height="500px" width="500">



                    </div>

                    <div class="col-span-1 mx-auto">
                        <div class="py-4 flex justify-between">
                            <h2 class=" text-lg">BYLAWS</h2>


                            <button class="text-white bg-purple-500 hover:bg-gray-700  font-medium rounded-full text-sm px-3 py-2.5 text-center" type="button" data-modal-toggle="default-modal">
                            View
                            </button>


                        </div>

                        <embed  src="{{ asset('/brands/board.pdf') }}" type="application/pdf"   height="500px" width="500">



                    </div>

                    <div class="col-span-1 mx-auto">
                        <div class="py-4 flex justify-between">
                            <h2 class=" text-lg">House Rules and Regulation</h2>


                            <button class="text-white bg-purple-500 hover:bg-gray-700  font-medium rounded-full text-sm px-3 py-2.5 text-center" type="button" data-modal-toggle="default-modal">
                            View
                            </button>


                        </div>

                        <embed  src="{{ asset('/brands/board.pdf') }}" type="application/pdf"   height="500px" width="500">



                    </div>

                    <div class="col-span-1 mx-auto">
                        <div class="py-4 flex justify-between">
                            <h2 class=" text-lg">2023 Audited Financial Statement</h2>


                            <button class="text-white bg-purple-500 hover:bg-gray-700  font-medium rounded-full text-sm px-3 py-2.5 text-center" type="button" data-modal-toggle="default-modal">
                            View
                            </button>


                        </div>

                        <embed  src="{{ asset('/brands/board.pdf') }}" type="application/pdf"   height="500px" width="500">



                    </div>



                </div>



            </div>
        </div>
    </div>

    </x-new-layout>


