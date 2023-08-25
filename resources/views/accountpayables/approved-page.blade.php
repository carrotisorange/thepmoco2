<x-new-layout>
    @section('title','Approved | '. Session::get('property'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
        
            <h1 class="py-12 font-light text-gray-800 text-2xl text-center">This step has been approved.</h1>
            <div class="flex justify-center items-center">
                <img src="{{ asset('/brands/approved.png') }}" class="w-48">
            </div>

            <div class="mx-auto py-12 flex justify-center space-x-7 items-center">
                <a  href="" class="px-3 py-2 border border-gray-300 rounded-full text-base">
                    Go Back
                </a>

                {{-- <button class="px-3 py-2 bg-purple-500 rounded-full text-base text-white">
                    Send Another Email
                </button> --}}

            </div>
        </div>
</x-new-layout>