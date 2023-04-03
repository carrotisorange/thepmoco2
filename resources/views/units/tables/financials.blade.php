<div class="text-sm">

    <div class="grid lg:grid-cols-2 md:grid-cols-2 gap-8 w-full max-w-screen-lg">
        <div class="lg:col-span-1">

            <div class="bg-white">
          
                <div class="flex items-center px-8 py-5 border-b">
                    <div class="w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900">Purchase Price
                            </p>
                            <p class="mt-1 text-2xl font-semibold text-gray-500">
                                {{
                                    App\Http\Controllers\CollectionController::shortNumber($unit_details->price)
                                    }}
                                    </p>              
                    </div>
                </div>


                <div class="flex items-center px-8 py-5 border-b">
                    <div class="w-0 flex-1 pt-0.5">
                        <p class="text-sm font-medium text-gray-900">Remaining Amount to get the ROI
                            </p>
                            <p class="mt-1 text-2xl font-semibold text-gray-500">
                        {{
                            App\Http\Controllers\CollectionController::shortNumber($unit_details->price
                            -
                            $total_collected_bills)
                            }}
                            </p>                     
                    </div>
                </div>
                    
  

              <div class="">
                  <div class="flex items-center px-8 py-5">
                      <p class="text-sm font-medium">Monthly Financial Report</p>
                  </div>
                  <div class="grid grid-cols-2 gap-4 px-8 pb-8">
                      <div class="">
                          <label class="text-xs font-semibold" for="cardNumber">Long Term Rent</label>
                          <input class="flex items-center h-10 border mt-1 rounded px-4 w-full text-sm" type="text">	
                      </div>
                      <div class="">
                          <label class="text-xs font-semibold" for="cardNumber">Daily Rent</label>
                          <input class="flex items-center h-10 border mt-1 rounded px-4 w-full text-sm" type="text">	
                      </div>
                      <div class="cols-2">
                          <label class="text-xs font-semibold" for="cardNumber">Rent Revenue</label>
                      </div>
                      <input class="flex items-center h-10 border mt-1 rounded px-4 w-full text-sm" type="text">	
                  </div>
              </div>

                <div class="border-t">
                            <div class="flex items-center px-8 py-5">
                                <p class="text-sm font-medium">Operating Expense</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4 px-8 pb-8">
                                
                                <div class="col-span-2">
                                    <label class="text-xs font-semibold" for="cardNumber">Billed to Owner</label>
                                </div>

                    <div class="col-span-2">
                                    <label class="text-xs font-semibold" for="cardNumber">1.</label>
                                </div>
                        
                    <div class="cols-2">
                                    <label class="text-xs font-semibold" for="cardNumber">Total Operation Expense</label>
                                </div>
                    <input class="flex items-center h-10 border mt-1 rounded px-4 w-full text-sm" type="text">	
                    <div class="cols-2">
                                    <label class="text-xs font-semibold" for="cardNumber">Net Profit</label>
                                </div>
                    <input class="flex items-center h-10 border mt-1 rounded px-4 w-full text-sm" type="text">	
                </div>
            </div>

        </div>
    </div>


        <div class="bg-white">

            <div class="flex items-center px-8 py-5 border-b">
                <div class="w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">Potential Gross Revenue per month
                    (Occupancy * Rent/month/tenant)
                    </p>
                      <p class="mt-1 text-xl font-semibold text-gray-500">
                    {{
                        App\Http\Controllers\CollectionController::shortNumber($unit_details->rent
                        *
                        $unit_details->occupancy)
                      }}
                      </p>                        
                </div>
            </div>

            <div class="flex items-center px-8 py-5 border-b">
                <div class="w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900">Total Bills for Collection
                </p>
                    <p class="mt-1 text-xl font-semibold text-gray-500">
                {{
                    App\Http\Controllers\CollectionController::shortNumber($total_uncollected_bills
                    + $total_collected_bills)
                    }}
                    </p>                
                </div>
            </div>
  
            <div class="flex items-center px-8 py-5 border-b">
                <div class="w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900">Collected Amount
                </p>
                    <p class="mt-1 text-xl font-semibold text-gray-500">
                {{
                    App\Http\Controllers\CollectionController::shortNumber($total_collected_bills)
                    }}
                    </p>
                                
                </div>
            </div>

            <div class="flex items-center px-8 py-5 border-b">
                <div class="w-0 flex-1 pt-0.5">
                <p class="text-sm font-medium text-gray-900">Total Unpaid Collection:
                </p>
                    <p class="mt-1 text-xl font-semibold text-gray-500">
                {{
                    App\Http\Controllers\CollectionController::shortNumber($total_uncollected_bills)
                                }}
                    </p>
                </div>
            </div>
        </div>


</div>

