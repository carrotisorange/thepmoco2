<x-landing-page-template>
@section('title','The PMO — Property Owners Corner')
@section('description', '')
        <div class="max-w-7xl p-10 mt-12 sm:mt-16 lg:mt-0">
                <h2 class="font-semibold text-xl text-center">Technical Support Form</h2>
                  <!-- Contact form -->
                  <div class="py-10 px-6 sm:px-10">
                    
                    <form action="https://formsubmit.co/patrickdilag@thepmo.co" method="POST" class="mt-6 gap-y-6 grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 sm:gap-x-8">
                      
                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="first-name" class="block text-sm font-medium text-gray-900">First name</label>
                            <div class="mt-1">
                                <input type="text" name="first-name" id="first-name" required autocomplete="first-name" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="last-name" class="block text-sm font-medium text-gray-900">Last name</label>
                            <div class="mt-1">
                                <input type="text" name="last-name" id="last-name" required autocomplete="last-name" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

        
                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                          <label for="gender" class="block text-sm font-medium text-gray-900">Gender</label>
                          <select name="gender" id="gender" required class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                          <option value="select">Select</option>
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                          <option value="others">Prefer not to say</option>
                          </select>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                            <div class="mt-1">
                                <input type="text" name="email" id="email" required autocomplete="email" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="mobile" class="block text-sm font-medium text-gray-900">Mobile</label>
                            <div class="mt-1">
                                <input type="text" name="mobile" id="mobile" required autocomplete="mobile" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                          <label for="property-type" class="block text-sm font-medium text-gray-900">Property Type:</label>
                          <select name="property-type" id="property-type" required class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                          <option value="select">Select</option>
                          <option value="Condominium association">Condominium Association</option>
                          <option value="Condominium units">Condominium Units</option>
                          <option value="Student accomodation">Student Accomodation</option>
                          <option value="HOA">HOA</option>
                          <option value="Dormitory">Dormitory</option>
                          <option value="Commerical">Commercial</option>
                          <option value="Self Storage">Self Storage</option>
                          <option value="Senior Living">Senior Living</option>
                          <option value="Residential Apartments">Residential Apartments</option>
                          <option value="Bed and Breakfast">Bed and breakfast</option>
                          <option value="Transient">Transient</option>
                          </select>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-3">
                            <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                            <div class="mt-1">
                                <input type="text" name="message" id="message" required autocomplete="message" class="bg-gray-100 block h-20 text-sm w-full rounded-md border-gray-300 py-1 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>
                        
                    
                      <div class="col-span-3 sm:flex sm:justify-end">
                        <button type="submit" class="mt-2 inline-flex w-full items-center justify-center rounded-full border border-transparent bg-purple-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Submit</button>
                       
                      </div>
                    </form>
                  </div>

                </div>
          
        </div>
</x-landing-page-template>
