<x-new-layout>
  @section('title','Help '. env('APP_NAME'))

  <div class="max-full mx-auto sm:px-6">


    <!-- gray section -->

    <div class="py-20 mt-0 sm:mt-0 lg:-mt-56  min-h-full  lg:gap-8 lg:px-8 bg-gray-600">

      <div class="flex justify-center items-center text-center lg:m-0">
        <div class="pb-5 px-5 sm:px-20 md:px-20 lg:px-0 sm:max-w-xl  lg:max-w-none  flex items-center justify-center">
          <span class="text-2xl font-medium text-white">Looking for support? Contact Us.</span>

        </div>

      </div>
      <div class="flex justify-center items-center">
        <span class="max-w-md text-base font-light text-white">If you're looking for more information, or have questions
          about your account, please contact us below.</span>
      </div>
    </div>

    <!-- gray section -->

    <!-- video list -->

    <div class="mt-0 sm:mt-20 min-h-full lg:grid pb-10 lg:grid-cols-2 lg:gap-8 lg:px-8 bg-white">

      <div class="sg:m-0 ">
        <div class="pt-10 pb-5 px-5 sm:px-20 md:px-20 lg:px-0 sm:max-w-xl  lg:max-w-none">
          <span class="text-2xl font-medium text-gray-700">Help Videos</span>
        </div>



        <div class="container py-3 flex justify-center">
          <div class="w-full h-56">
            <div class="w-full overflow-auto shadow bg-white">

              <table class="w-full">
                <tbody class="">

                  <tr class="relative transform scale-100
                                          text-xs py-1 border-b-2 border-gray-300 cursor-default">
                    <td class="px-2 py-5 whitespace-no-wrap">
                      <a href="calendar-demo" class="leading-5 text-gray-900 text-base underline font-medium">How to Use
                        the Booking Calendar
                      </a>

                    </td>
                  </tr>

                  <tr class="relative transform scale-100
                                            text-xs py-1 border-b-2 border-gray-300 cursor-default">
                    <td class="px-2 py-5 whitespace-no-wrap">
                      <a href="guest-demo" class="leading-5 text-gray-900 text-base underline font-medium">How to Manage
                        Guests and Additional Guests
                      </a>

                    </td>
                  </tr>

                  <tr class="relative transform scale-100
                                            text-xs py-1 border-b-2 border-gray-300 cursor-default">
                    <td class="px-2 py-5 whitespace-no-wrap">
                      <a href="utilities-demo" class="leading-5 text-gray-900 text-base underline font-medium">How to
                        Create Utilities Meter Reading and Billing
                      </a>

                    </td>
                  </tr>



                  <tr class="relative transform scale-100
                                            text-xs py-1 border-b-2 border-gray-300 cursor-default">


                    <td class="px-2 py-5 whitespace-no-wrap">
                      <a href="personnel-demo" class="leading-5 text-gray-900 text-base underline font-medium">How to
                        Add Additional Personnels
                      </a>

                    </td>

                  </tr>

                  <tr class="relative transform scale-100
                                            text-xs py-1 border-b-2 border-gray-300 cursor-default">


                    <td class="px-2 py-5 whitespace-no-wrap">
                      <a href="bill-delete-demo" class="leading-5 text-gray-900 text-base underline font-medium">How to
                        Delete Tenant Bill
                      </a>

                    </td>

                  </tr>

                </tbody>
              </table>

            </div>

          </div>
        </div>

      </div>

      <div class="sm:pl-20 px-5 sm:px-20 md:px-20 lg:px-20 lg:py-10 sm:mt-0  lg:col-start-2">
        <div class="flex justify-center items-center">
          <p class="pb-5 text-xl font-medium text-gray-700">
            Do you have any requests?
          </p>
        </div>

        <div class="flex justify-center items-center">
          <img src="{{ asset('/brands/help.png') }}" class="w-full">
        </div>
        <div class="flex justify-center items-center space-x-2">
          <button><a href="https://thepropertymanager.online/about#contactus"
              class="bg-purple-100 hover:bg-purple-300 w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">I
              need help in Managing Properties</a></button>
          <button><a href="https://thepropertymanager.online/tech-support"
              class="bg-purple-100 hover:bg-purple-300 w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">I
              need Tech Support</a></button>

        </div>
      </div>


    </div>
    <!-- end video list  -->

    <!-- contact section -->

    <div class="pb-10 mt-0 sm:mt-0 min-h-full lg:grid  lg:grid-cols-2 lg:gap-8 lg:px-8 bg-purple-100">

      <div class="">
        <div class="py-5 px-5  lg:px-0  lg:max-w-none  flex items-center justify-center">
          <img
            src="https://images.pexels.com/photos/6962998/pexels-photo-6962998.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
            class="w-full">
        </div>
      </div>

      <div class="sm:pl-20 px-5 sm:px-20 md:px-20 lg:px-20 lg:py-10 sm:mt-0  lg:col-start-2">

        <div class="flex justify-center items-center">
          <p class="pb-10 text-2xl font-light text-gray-700">
            Are you still <span class="font-bold text-purple-900">having trouble in using the system</span> and in need
            of <span class="font-bold text-purple-900">our assistance?</span>
          </p>

        </div>
        <p class="text-sm font-light">Unlike manual processes, we provide a full-suite solution that allows business
          owners to run their operations seamlessly and harmoniously with their tenants.</p>
        <div class="py-5 flex justify-center sm:justify-center items-center lg:justify-between">
          <button> <a href="https://thepropertymanager.online/about#contactus"
              class="w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-purple-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Request
              a Demo</a></button>

        </div>


      </div>

      <!-- contact section -->





    </div>














</x-new-layout>