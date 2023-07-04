@include('includes.proprent-head')

                   

    <div class=" p-6  flex items-center justify-center">
    <div class="mt-10 mx-auto">

    <div>
    <!-- <h2 class="ml-4 font-semibold text-xl text-gray-600">Task Name</h2> -->

      <div class="bg-white  p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
          <div class="text-gray-600">
            <p class="font-medium text-lg">Make a Reservation</p>
            <p>Please fill out all the fields.</p>
          </div>

          <div class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
              <div class="md:col-span-3">
                  <label for="project_name">Name</label> 
                  <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>
             
              <div class="md:col-span-3">
                  <label for="date">Email</label>
                  <input type="text" name="date" id="date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>

              <div class="md:col-span-3">
                <label for="scope_of_work">Phone Number</label>
                <input type="text" name="scope_of_work" id="scope_of_work" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>

              <div class="md:col-span-3">
                <label for="scope_of_work">Guests</label>
                <input type="text" name="scope_of_work" id="scope_of_work" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>

              <div class="md:col-span-3">
              <!-- calendar  -->
                  <label for="project_name">Start Date</label> 
                  <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>
             
              <div class="md:col-span-3">
              <!-- calendar  -->
                  <label for="date">End Date</label>
                  <input type="text" name="date" id="date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
              </div>
            </div>
                
              <div class="my-10 border border-t border-gray-200"></div>

              <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">

                <div class="text-gray-600">
                  <p class="font-medium text-sm">Security Deposit</p>
                </div>

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>

                <div class="text-gray-600">
                  <p class="font-medium text-sm">Advanced Rent</p>
                </div>

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>

                <div class="text-gray-600">
                  <p class="font-medium text-sm">Tax</p>
                </div>

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>

                <div class="text-gray-600">
                  <p class="font-medium text-sm">Service Fee</p>
                </div>

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>

                <div class="text-gray-600">
                  <p class="font-bold text-base">Total</p>
                </div>

                

                <div class="lg:col-span-2">
                  <div class="md:col-span-3">
                    <input type="text" name="project_name" id="project_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  </div>
                </div>
                
              </div>

              <div class="md:col-span-6 text-right mt-4">
                <div class="inline-flex items-end">
                  <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded">Reserve</button>
                </div>
              </div>

            
          </div>
        </div>
      </div>
    </div>

                    </body>
                    </html>