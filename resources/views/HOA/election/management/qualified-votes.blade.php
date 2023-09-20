<x-hoa-layout>
    @section('styles')
    <style>
        #footer {
            color: black;
        }
    </style>
    @endsection





<div class="pt-6 px-10 mx-auto">
    <div>
        <h3 class="mb-10 mt-10 text-center text-2xl font-bold leading-6 text-gray-900">Qualified Votes Masterlist</h3>
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-x-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <x-th>TOTAL NUMBER OF QUALIFIED VOTES</x-th>
                       


                    </tr>
                </thead>
                <tbody class="text-base bg-white divide-y divide-gray-200">

                    <tr>
                        
                        <x-td>500</x-td>                   
                    </tr>
                
                </tbody>
            </table>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50">
                    <tr>

                        <x-th>#</x-th>
                        <x-th>House #</x-th>
                        <x-th>Name</x-th>
                        <x-th>Contact Number</x-th>
                        <x-th>Email Address</x-th>

                    </tr>
                </thead>
                <tbody class="text-base bg-white divide-y divide-gray-200">

                    <tr>
                        <x-td>1</x-td>
                        <x-td>House 215</x-td>
                        <x-td>Juan Dela Cruz</x-td>
                        <x-td>0976548766</x-td>
                        <x-td>juan@gmail.com</x-td>

                        
                    </tr>
                   
  
                    
                
                </tbody>
            </table>

</div>

</x-hoa-layout>