











<!-- start -->

<div class="bg-white">
  <div class="pt-6">

    <!-- back button -->
    <nav aria-label="Breadcrumb" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex items-center">
        <a href="/dashboard">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
          </svg>
        </a>
      </div>
    </nav>

    <div class="mx-auto mt-8 max-w-2xl px-4 sm:px-6 lg:max-w-7xl lg:px-8">
      <div class="lg:grid lg:auto-rows-min lg:grid-cols-12 lg:gap-x-8">
        <div class="lg:col-span-5 lg:col-start-8">
          <div class="flex justify-between">
            <h1 class="text-xl font-medium text-gray-900">{{ $house_design->design_name }} 
              @if($house_design->user_id === auth()->user()->id)
              <a href="/house-design/{{ $house_design->design_name_no }}/edit"><i class="fa-solid fa-pen-to-square"></i></a>
              @endif
            </h1>

            @can('home_owner')
            <div class="flex">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#7FD105" class="w-6 h-6">
                <path
                  d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                <path
                  d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
              </svg>

              <button type="button" data-modal-toggle="review-modal" class="mt-1 text-sm">Write a review</button>

            </div>
            @endcan
          </div>

          <h1 class="text-md font-light text-gray-900">{{ $house_design->user->name }}</h1>


          <!-- Reviews -->

          <div class="mt-1">
            @if(!$house_design->house_design_reviews->count())
            <h2 class="">No available rating</h2>
            @else
            <h2 class="">Rating</h2>
            <div class="flex items-center">
              <p class="text-sm text-gray-700">
                <?php 
                      $rating = number_format($house_design->house_design_reviews->average('score'), 1);
                      $shaded_star_rating = ceil($rating);
                      $unshaded_star_rating = 5-$shaded_star_rating;
                  ;?>
                {{ $rating }} <span class="">/5.0</span>
              </p>

              <div class="ml-1 flex items-center">
                <!-- Active: "text-yellow-400", Inactive: "text-gray-200" -->
                @for ($i = 1; $i<=$shaded_star_rating; $i++) <svg class="text-yellow-400 h-5 w-5 flex-shrink-0"
                  viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd"
                    d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                    clip-rule="evenodd" />
                  </svg>
                  @endfor
                  @for ($i = 1; $i<=$unshaded_star_rating; $i++) <svg class="text-gray-200 h-5 w-5 flex-shrink-0"
                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="false">
                    <path fill-rule="evenodd"
                      d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                      clip-rule="evenodd" />
                    </svg>
                    @endfor


              </div>

            </div>
            @endif

          </div>

          <div class="mt-2 flex justify-between">
            <h2 class="mt-5 text-base font-semibold text-blue-700">₱ {{ number_format($house_design->estimated_price, 2)
              }}</h2>

            <!-- review button -- will only show if project status = completed -->
            <div class="flex">
              <h2 class="mt-5 text-base font-medium text-gray-900">{{ $house_design->house_type->type }}</h2>
            </div>



          </div>

        </div>



        <!-- Image gallery -->
        <div class="mt-8 lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
          <h2 class="sr-only">Images</h2>

          <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/storage/'.$house_design->image_1) }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/storage/'.$house_design->image_2) }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/storage/'.$house_design->image_3) }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/storage/'.$house_design->image_4) }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/storage/'.$house_design->image_5) }}"
                  alt="image" />
              </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>

          <!-- Swiper JS -->
          <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
          <script>
            var swiper = new Swiper('.mySwiper', {
                            navigation: {
                              nextEl: '.swiper-button-next',
                              prevEl: '.swiper-button-prev',
                            },
                          });
          </script>
        </div>


        <div class="mt-5 lg:col-span-5">

          <div class="mt-3">
            <h2 class="text-sm font-medium text-gray-900">Description</h2>
            <div class="prose prose-sm mt-4 text-gray-500">
              <p>{{ $house_design->description }}.</p>
            </div>
          </div>


          <form>

            <div class="mt-8">
              <div class="flex items-center justify-between">
                <h2 class="text-sm font-medium text-gray-900">Number of Rooms</h2>
              </div>

              <section class="container mx-auto p-6">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                  <div class="w-full overflow-x-auto">
                    <table class="w-full">
                      <thead>
                        <tr
                          class="text-md font-semibold tracking-wide text-left text-gray-900  uppercase border border-gray-600">
                          <!-- <th class="px-4 py-3"></th>
                                      <th class="px-4 py-3"></th> -->
                        </tr>
                      </thead>
                      <tbody class="bg-white">
                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold text-black">Bathroom</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 text-ms font-semibold border">{{ $house_design->bathroom }}</td>


                        </tr>
                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold text-black">Kitchen</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 text-md font-semibold border">{{ $house_design->kitchen }}</td>

                        </tr>
                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold">Bedroom</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 text-md font-semibold border">{{ $house_design->bedroom }}</td>

                        </tr>
                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold">Living Room</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 border text-md font-semibold">{{ $house_design->living_room }}</td>

                        </tr>

                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold">Parking</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 border text-md font-semibold">{{ $house_design->parking }}</td>

                        </tr>


                      </tbody>
                    </table>
                  </div>
                </div>
              </section>

              <div>
                <h3 class="text-base font-semibold leading-6 text-gray-900">House Features</h3>
              </div>

              <section class="container mx-auto p-6">
                <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                  <div class="w-full overflow-x-auto">
                    <table class="w-full">
                      <thead>
                        <tr
                          class="text-md font-semibold tracking-wide text-left text-gray-900  uppercase border border-gray-600">
                          <!-- <th class="px-4 py-3"></th>
                                      <th class="px-4 py-3"></th> -->
                        </tr>
                      </thead>
                      <tbody class="bg-white">
                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold text-black">Pool</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 text-md font-semibold border">
                            <input type="checkbox" @if($house_design->hasPool) checked @endif disabled/>
                          </td>
                        </tr>
                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold text-black">Parking</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 text-md font-semibold border">
                            <input type="checkbox" @if($house_design->hasParking) checked @endif disabled />
                          </td>
                        </tr>
                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold">Backyard</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 text-md font-semibold border">
                            <input type="checkbox" @if($house_design->hasBackyard) checked @endif disabled />
                          </td>
                        </tr>

                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold">Kids Room</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 text-md font-semibold border">
                            <input type="checkbox" @if($house_design->hasKidsRoom) checked @endif disabled/>
                          </td>

                        </tr>

                        <tr class="text-gray-700">
                          <td class="px-4 py-3 border">
                            <div class="flex items-center text-sm">

                              <div>
                                <p class="font-semibold">Basement</p>
                              </div>
                            </div>
                          </td>
                          <td class="px-4 py-3 text-md font-semibold border">
                            <input type="checkbox" @if($house_design->hasBasement) checked @endif disabled/>
                          </td>

                        </tr>



                      </tbody>
                    </table>
                  </div>
                </div>

              </section>
            </div>

            @can('home_owner')
        <a href="/message/{{ $house_design->user_id }}" target="_blank"
          class="flex w-full items-center justify-center rounded-md border border-transparent bg-yellow-500 py-3 px-8 text-base font-medium text-white hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">Message
          Designer Builder</a>
            @endcan

          </form>





          <!-- Product details -->


          <!-- 'Customer Reviews' panel, show/hide based on tab state -->
          <div id="tab-panel-reviews" class="mt-10 mb-3" aria-labelledby="tab-reviews" role="tabpanel" tabindex="0">
            @if(!$house_design->house_design_reviews->count())
            <h2 class="">No available reviews</h2>
            @else
            <h3 class="my-4">Reviews by other home owners:</h3>
            @foreach($house_design->house_design_reviews as $house_design_review)
            <div class="flex space-x-4 text-sm text-gray-500">
              <div class="py-10">

                <h3 class="font-medium text-gray-900"></h3>

                <div class="text-center">
                  <span class="flex">
<svg class="text-yellow-400 h-5 w-5 flex-shrink-0"
                      viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd"
                        d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                        clip-rule="evenodd" />
                      </svg>
 <svg
                        class="text-gray-200 h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor"
                        aria-hidden="false">
                        <path fill-rule="evenodd"
                          d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z"
                          clip-rule="evenodd" />
                        </svg>
  

                  </span>
                </div>

                <p><time datetime="2021-07-16"></time></p>
                <p class="sr-only">5 out of 5 stars</p>
                <div class="prose prose-sm mt-4 max-w-none text-gray-500">
                  <p></p>
                </div>
              </div>
            </div>

            <!-- More reviews... -->
          </div>
        </div>
      </div>



    </div>
  </div>

<!-- end -->