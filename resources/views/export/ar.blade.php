<html>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
<head>

    <style>
        body{
            font-family:'Poppins';
        }
        @page {
            margin: 100px 25px;
            font-size: 13px;
        }

        p,
        {
        margin-right: 5px;
        margin-left: 5px;
        }

        table,
        th,
        td {
            margin-right: 30px;
            /* margin-left: 30px; */
            border: 1px black;
        }

        th,
        td {
            padding: 5px";

        }

        ,
        .center {
            /* margin: auto; */
            width: 90%;

            padding: 5px;
        }

        /* .watermark{
        height:500px;
        width:500px;
        display:flex;
        align-items:center;
        justify-content:center;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 80;
        right: 0;
        z-index: -1;
        opacity: 0.2;
        } */
    </style>


</head>

<body>

    <header>
        <div class="mx-auto max-w-4xl px-6">
            
            <div class="text-xl font-semibold">
                <img class="w-20 mt-5" src="{{ asset('/brands/prop-small.png') }}">
            </div>
            <div class="-mt-8 flex justify-end text-sm font-medium ">
                <div class="bg-gray-200 inline-flex py-2 px-12">
                    <img width="20" height="20" src="https://img.icons8.com/metro/26/737373/geography.png" alt="geography"/>
                    <p class="ml-2 text-gray-500 text-xs font-light">propsuite.net</p>
                </div>
            </div>
    
            <h1 class="py-8 text-center text-xl font-bold text-gray-800 border-b tracking-wide">Acknowledgement Receipt</h1>
        </div>
   
       
    </header>



  
    

    <main class="mx-auto max-w-4xl px-6">
        
        <div class="flex justify-between text-base pt-12">
            <div>
                <p class="font-light">Tenant: <span class="font-semibold tracking-wider">Juan Dela Cruz</span></p>
            </div>
            <div>
                <p>AR number: <span class="font-semibold tracking-wider">1234345</span></p>
            </div>
        </div>

        <div class="block text-base pt-8">
            <p class="font-light border-b py-1 text-sm">Payment Made: <span class="ml-2 font-semibold tracking-widest">October 23, 2023</span></p>
            <p class="font-light border-b py-1 text-sm">Amount Paid: <span class="ml-2 font-semibold tracking-widestd=">12, 000</span></p>
            <p class="font-light border-b py-1 text-sm">Mode of Payment: <span class="ml-2 font-semibold tracking-widest">Bank</span></p>
            <p class="font-light border-b py-1 text-sm">Bank Number: <span class="ml-2 font-semibold tracking-widest">1234567865</span></p>
            <p class="font-light border-b py-1 text-sm">Date Deposited: <span class="ml-2 font-semibold tracking-widest">10-23-23 Cruz</span></p>
            <p class="flex justify-end font-light py-6 text-sm">Unpaid Bills: <span class="ml-2 font-semibold tracking-widest ml-1"> 18,987</span></p>
        </div>

        <div class="block text-base pt-2">
            <div class="px-3 pb-6">
                <h1 class="text-base font-semibold text-gray-900">Payments Breakdown</h1>
            </div>
            <div class="flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">#</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Bill #</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date Posted</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Unit</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Particular</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Period Covered</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr class="even:bg-gray-50">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">1</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">123456</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">10-23-23</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">3</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">rent</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">October-November</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">12,000</td>
                                
                                </tr>

                            </tbody>
                        </table>
                        <p class="flex justify-end font-light py-6 text-sm">Printed by: <span class="font-semibold ml-1"> Demo</span></p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="mx-auto max-w-4xl bg-purple-800">

            <div class="pt-4 mx-auto flex justify-center items-center grid grid-cols-3">
                <div class="inline-flex justify-center items-center col-span-1">
                    <img width="20" height="20" src="https://img.icons8.com/metro/26/FFFFFF/phone.png" alt="phone"/>
                    <p class="w-32 p-2 text-white text-xs"> Property Number</p>
                </div>
                <div class="inline-flex justify-center items-center col-span-1">
                    <img width="20" height="20" src="https://img.icons8.com/metro/26/FFFFFF/filled-message.png" alt="filled-message"/>
                    <p class="w-32 p-2 text-white text-xs"> Property Email</p>
                </div>
            
                <div class="inline-flex justify-center items-center col-span-1">
                    <img width="20" height="20" src="https://img.icons8.com/metro/26/FFFFFF/marker.png" alt="marker"/>
                    <p class="w-32 p-2 text-white text-xs"> Property Address 12332423524</p>
                </div>
            
            
            </div>
            <p class="pt-2 text-center text-xs leading-5 text-gray-100">Powered by: PropSuite</p>
      
    </footer>





</body>

</html>