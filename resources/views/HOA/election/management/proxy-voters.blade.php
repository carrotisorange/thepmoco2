<x-hoa-layout>
    @section('styles')
    <style>
        #footer {
            color: black;
        }
    </style>
    @endsection





<div class="pt-6 px-10 mx-auto">
        <div class="block lg:flex justify-between">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <div>
                <h3 class="mb-5 mt-10 text-center text-2xl font-bold leading-6 text-gray-900">Proxy Voters Masterlist</h3>
            </div>
            <div class="py-2 lg:py-0 flex justify-center items-center">
                <a href="" class="text-white bg-purple-500 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                                    Download Proxy Voters Masterlist</a>
            </div>
        </div>

        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="mb-5 mt-2 relative overflow-hidden">

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="bg-gray-50">
                            <tr>

                                <x-th>House #</x-th>
                                <x-th>Proxy Name</x-th>
                                <x-th>Contact Number</x-th>
                                <x-th>Email Address</x-th>
                                <x-th>Valid ID</x-th>

                            </tr>
                        </thead>
                        <tbody class="text-base bg-white divide-y divide-gray-200">

                            <tr>
                                <x-td>House 215</x-td>
                                <x-td>Juan Dela Cruz</x-td>
                                <x-td>0976548766</x-td>
                                <x-td>juan@gmail.com</x-td>
                                <x-td>VIEW</x-td>
                                
                            </tr>
                        
        
                            
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


</div>

</x-hoa-layout>