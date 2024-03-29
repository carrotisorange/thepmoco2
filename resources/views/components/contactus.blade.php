<!-- Contact form -->
                  <div class="py-10 px-6 sm:px-10 col-span-1  lg:col-span-2 xl:p-12">
                    
                    <form action="https://formsubmit.co/admin@propsuite.net" method="POST" class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                      
                        <div class="col-span-2 lg:col-span-1">
                          <label for="first-name" class="block text-sm font-medium text-gray-900">First name</label>
                          <div class="mt-1">
                            <input type="text" name="first-name" id="first-name" required autocomplete="given-name" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                          </div>
                        </div>
                     
                        <div class="col-span-2 lg:col-span-1">
                          <label for="last-name" class="block text-sm font-medium text-gray-900">Last name</label>
                          <div class="mt-1">
                            <input type="text" name="last-name" id="last-name" required autocomplete="family-name" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                          </div>
                        </div>
                      
                        <div class="col-span-2 lg:col-span-1">
                          <label for="sex" class="block text-sm font-medium text-gray-900">Sex</label>
                            <div class="mt-1">
                              <select name="sex" id="sex" required class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                              </select>
                            </div>
                        </div>
                      
                        <div class="col-span-2 lg:col-span-1">
                        <label for="email" class="block text-sm font-medium text-gray-900">Email</label>
                        <div class="mt-1">
                          <input id="email" name="email" type="email" required autocomplete="email" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        </div>

                        <div class="col-span-2 lg:col-span-1">    
                         <label for="mobile-number" class="block text-sm font-medium text-gray-900">Mobile Number</label>
                            <div class="mt-1">
                              <input id="mobile-number" name="mobile-number" type="mobile-number" required autocomplete="Mobile" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-2">
                        <div class="flex justify-between">
                          <label for="message" class="block text-sm font-medium text-gray-900">Message</label>
                          <span id="message-max" class="text-sm text-gray-500">Max. 500 characters</span>
                        </div>
                        <div class="mt-1">
                          <textarea id="message" name="message" required rows="1" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" aria-describedby="message-max"></textarea>
                        </div>
                        </div>

                      <div class="col-span-2 lg:col-span-1">
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

                        <div class="col-span-3 sm:flex sm:justify-end">
                          <button type="submit" class="mt-2 inline-flex w-full items-center justify-center rounded-full border border-transparent bg-purple-500 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Submit</button>
                        </div>

                        <div class="col-span-3 bg-gray-100 py-4 lg:py-0">
                            <div
                                class="mx-auto max-w-4xl  px-4 sm:px-6 py-8 lg:flex lg:max-w-7xl lg:items-center lg:justify-between lg:px-8">
                                <h2 class="text-lg font-bold tracking-tight text-gray-900 sm:text-2xl">
                                    <span class="block">Includes Site Seal</span>
                                    <span
                                        class="max-w-lg py-5 -mb-1 block  bg-clip-text pb-1 text-gray-700 text-base font-light">Your data security and privacy is important to us. With Comodo SSL, communication exchanged between our servers and our users are encrypted. This effectively protects against data theft and bolsters overall trust and security in our website.</span>
                                </h2>
                                <div class="">
                                <img class="mx-auto w-96"
                                                                src="{{ asset('/brands/landing/comodo-logo.png') }}"
                                                                alt="comodo logo">
                                    

                                </div>
                            </div>
                        </div>

                      </div>                     
                    </form>

                    
                  </div>

                </div>
              </div>
            </div>
          </div>

          
<!-- end contact us section -->