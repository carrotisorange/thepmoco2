<x-landing-page-template>
@section('title', env('APP_NAME').' | Property Owners Corner')
@section('description', '')

<style>
.topnav {
    width: 100%;
    background-size: cover;
    background: #4A386C;
    height: 80px;
    min-width: 400px;
}

.navbar {
    width: 100%;
    position: fixed;
    top: 0px;
    transition: 0.5s;
    background: #4A386C;
    height: 80px;
    min-width: 400px;
}
</style>

        <div class="mx-auto max-w-7xl p-10 mt-12 sm:mt-16 lg:mt-0">
                <h2 class="font-semibold text-xl text-center">Property Owner Enrollment Form</h2>
                  <!-- Contact form -->
                  <div class="py-10 px-6 sm:px-10">

                    <form action="https://formsubmit.co/pamelatecson@thepmo.co" method="POST" class="mt-6 gap-y-6 grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 sm:gap-x-8">

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

                        <div class="font-medium py-8 col-span-3">
                            <h2>Property Address</h2>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="unit-street-number" class="block text-sm font-medium text-gray-900">Unit/Street Number</label>
                            <div class="mt-1">
                                <input type="text" name="unit-street-number" id="unit-street-number" required autocomplete="unit-street-number" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="bld-street-name" class="block text-sm font-medium text-gray-900">Bld/Street Name</label>
                            <div class="mt-1">
                                <input type="text" name="bld-street-name" id="bld-street-name" required autocomplete="bld-street-name" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="village-subdivision" class="block text-sm font-medium text-gray-900">Village Subdivision</label>
                            <div class="mt-1">
                                <input type="text" name="village-subdivision" id="village-subdivision" required autocomplete="village-subdivision" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="barangay" class="block text-sm font-medium text-gray-900">Barangay</label>
                            <div class="mt-1">
                                <input type="text" name="barangay" id="barangay" required autocomplete="barangay" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="city-municipality" class="block text-sm font-medium text-gray-900">City/Municipality</label>
                            <div class="mt-1">
                                <input type="text" name="city-municipality" id="city-municipality" required autocomplete="city-municipality" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                            <label for="province" class="block text-sm font-medium text-gray-900">Province</label>
                            <div class="mt-1">
                                <input type="text" name="province" id="province" required autocomplete="province" class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                        </div>

                        <div class="col-span-3 sm:col-span-3 lg:col-span-1">
                          <label for="property-status" class="block text-sm font-medium text-gray-900">Property is currently:</label>
                          <select name="property-status" id="property-status" required class="bg-gray-100 block w-full rounded-md border-gray-300 py-3 px-4 text-sm text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                          <option value="select">Select</option>
                          <option value="vacant">Vacant</option>
                          <option value="tenanted">Tenanted</option>
                          </select>
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

                        <div class="col-span-3 mt-5 text-base font-medium">
                              <ul><input type="checkbox" id="interested" required>
                              I have read and understood the <a href="terms" class="underline text-purple-900">Terms and Conditions</a> and <a href="privacy" class="underline text-purple-900">Privacy Policy.</a>
                              </ul>
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
                        
                    </form>
                  </div>

                </div>

        </div>
</x-landing-page-template>
