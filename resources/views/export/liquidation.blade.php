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
            <div class="-mt-10 flex justify-end text-sm font-medium border-b">
                <div class="py-2">
                    <p class="ml-2 text-gray-800 text-xl font-bold">The PropSuite Residences</p>
                </div>
            </div>
    
            <h1 class="py-8 text-center text-lg font-bold text-gray-800 tracking-wide">Liquidation</h1>
        </div>
   
       
    </header>



  
    

    <main class="mx-auto max-w-4xl px-6">
        
        <div class="flex justify-between text-base pt-6">
            <div>
                <p class="font-light">Batch Number: <span class="font-semibold tracking-wider">123325324</span></p>
            </div>
            <div>
                <p>Created On: <span class="ml-2 font-semibold tracking-wider">Ocotber 23, 2023</span></p>
            </div>
        </div>

        <div class="block text-base pt-8">
            <p class="font-light border-b py-1 text-sm">Requested by: <span class="ml-2 font-semibold tracking-widest">Admin</span></p>
            <p class="font-light border-b py-1 text-sm">Name: <span class="ml-2 font-semibold tracking-widest">Juan Dela Cruz</span></p>
            <p class="font-light border-b py-1 text-sm">Department/Section: <span class="ml-2 font-semibold tracking-widest">Admin</span></p>
            <p class="font-light border-b py-1 text-sm">First Approver: <span class="ml-2 font-semibold tracking-widest">Lily Cruz</span></p>
            <p class="font-light border-b py-1 text-sm">Second Approver: <span class="ml-2 font-semibold tracking-widest">Kevin Moon</span></p>
        </div>

        <div class="block text-base pt-2">
            <div class="flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <p class="py-6">Liquidations</p>
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">#</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Unit</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Vendor</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">OR #</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Item</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Quantity</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Amount</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Expense Type</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr class="even:bg-gray-50">

                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">1</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Unit 3</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">SM</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">43546474</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Sofa</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">3</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">12,345</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">Expense type</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">12,345</td>
                                
                                </tr>

                            </tbody>
                        </table>

                        <div class="block text-base pt-8">
                            <p class="font-light py-1 text-sm">Total: <span class="ml-2 font-semibold tracking-wide">12,345</span></p>
                            <p class="font-light py-1 text-sm">Cash Advance: <span class="ml-2 font-semibold tracking-wide">4,500</span></p>
                            <p class="font-light py-1 text-sm">Total Return: <span class="ml-2 font-semibold tracking-wide">2,300</span></p>
                        </div>

                        <p class="flex justify-end font-light py-6 text-sm">Printed by: <span class="font-semibold ml-1"> Demo</span></p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="mx-auto max-w-4xl bg-purple-800">

            <p class="pt-2 text-center text-xs leading-5 text-gray-100">Powered by: PropSuite</p>
      
    </footer>





</body>

</html>