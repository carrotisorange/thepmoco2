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
        <h3 class="mb-10 mt-10 text-center text-2xl font-bold leading-6 text-gray-900">HOA Property Documents</h3>
    </div>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50">
                    <tr>

                        <x-th>DOCUMENT</x-th>
                        <x-th>ACTION</x-th>

                    </tr>
                </thead>
                <tbody class="text-base bg-white divide-y divide-gray-200">

                    <tr>
                        
  
                        <x-td>DHSUD Registration</x-td>
                        <x-td>view/edit</x-td>

                    
                    </tr>

                    <tr>
                        <x-td>GIS</x-td>
                        <x-td>view/edit</x-td>
                    </tr>

                    <tr>
                        <x-td>BYLAWS</x-td>
                        <x-td>view/edit</x-td>
                    </tr>

                    <tr>
                        <x-td>HOUSE RULES AND REGULATION</x-td>
                        <x-td>view/edit</x-td>
                    </tr>

                    <tr>
                        <x-td>2023 AUDITED FINANCIAL STATEMENT</x-td>
                        <x-td>view/edit</x-td>
                    </tr>

                    <tr>
                        <x-td>BOARD RESOLUTION</x-td>
                        <x-td>view/edit</x-td>
                    </tr>

                    <tr>
                        <x-td>MIN GEN ASSEMBLY</x-td>
                        <x-td>view/edit</x-td>
                    </tr>

                    
                
                </tbody>
            </table>

</div>

</x-hoa-layout>