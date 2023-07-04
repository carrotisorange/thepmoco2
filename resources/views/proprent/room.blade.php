@include('includes.proprent-head')



    <main>
      

<div class="bg-white md:pr-96">
  <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
  <div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 lg:max-w-7xl lg:px-8">
   

    <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-1 lg:grid-cols-1 xl:grid-cols-1 xl:gap-x-8">


    <div class="cols-span-4 group">
        <div class="aspect-w-1  w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-w-7 ">


 <!-- Image gallery -->
 <div class="h-96 lg:col-span-7 lg:col-start-1 lg:row-span-3 lg:row-start-1 lg:mt-0">
          <h2 class="sr-only">Images</h2>

          <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
                  alt="image" />
              </div>
              <div class="swiper-slide">
                <img class="object-cover w-full h-96" src="{{ asset('/brands/proprent/room-sample.jpg') }}"
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

                        </div>
      <div class="mt-10">
      <h2 class="text-xl font-bold">Name of Place/Unit</h2>  
      <p class="font-light text-sm py-2"> <span><span class="font-medium">6</span> rooms</span> <span><span class="font-medium">6</span> toilets</span> <span><span class="font-medium">10</span> max guests</span> </p>

      <div class="mt-6 border border-t border-gray-200"></div>
      <!-- description -->
      <div class="font-light text-base py-4">
      Come and stay in this beautifully designed beach-front villa in a peaceful beach setting in one of the most iconic residential beach areas in all of DA NANG CITY. Whether you’re in town for a business trip, a family vacation, or a weekend getaway with good friends, this is a perfect spot for your group. 
      </div>

      <div class="mt-6 border border-t border-gray-200"></div>
      
      <h2 class="text-lg font-bold pt-4 pb-7">Room Details</h2> 
      <div class="grid grid-cols-2">
        

          <!-- amenities -->
          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/exterior.png" alt="exterior"/>
          <span class="font-light text-sm">Apartment</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/bed.png" alt="bed"/>
          <span class="font-light text-sm">2 Bedrooms</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/calendar--v1.png" alt="calendar--v1"/>
          <span class="font-light text-sm">0 months minimum stay</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/tv.png" alt="tv"/>
          <span class="font-light text-sm">Furnished</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/wi-fi-good.png" alt="wi-fi-good"/>
          <span class="font-light text-sm">Wifi</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/shower-and-tub.png" alt="shower-and-tub"/>
          <span class="font-light text-sm">1 Bathroom</span>
          </h1>

          <h1 class="mb-10 inline-flex">
          <img width="26" height="26" src="https://img.icons8.com/fluency-systems-regular/48/parking.png" alt="parking"/>
          <span class="font-light text-sm">Parking</span>
          </h1>
        </div>

        <button class="border border-gray-200 p-3">Show more Amenities</button>
      </div>

      <div class="mt-6 border border-t border-gray-200"></div>

      <h2 class="text-lg font-bold pt-4 pb-7">No reviews yet</h2> 

      <div class="mt-6 border border-t border-gray-200"></div>

      <h2 class="text-lg font-bold pt-4 pb-4">Where you'll be</h2> 
      <div class="">
        <img class="w-full" src="https://snazzy-maps-cdn.azureedge.net/assets/232526-sample-map-style.png?v=20180925120645" alt="shower-and-tub"/> 
      </div>
    </div>

  
</div>
  </div>
</div>

<!-- Static sidebar for desktop -->
<div class="pb-10 md:pt-10 lg:pt-0 md:fixed md:inset-y-0 right-0 md:flex md:w-96 md:flex-col ">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="ml-5 lg:-ml-10 mx-6 flex flex-grow flex-col overflow-y-auto bg-white pt-5">
            <div class="py-0 sm:py-2 lg:py-20 mt-5 flex flex-1 flex-col">
    
                <div class="py-8 px-7 mx-auto border border-gray-400 rounded-md">
      
                    
                    <div>
                            <p class="py-6 font-bold text-md text-2xl"><span>₱</span> 1000 <span class="text-base font-light">Unit Price</span></p>
                            
                        </div>
                 
            
                    <p class="py-1 font-light text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vitae mattis massa, in convallis ligula. Aliquam erat volutpat.</p>
    
                    <div class="w-full mt-6">
                    <!-- change to message button once reserved -->
                    <a href="/proprent/reservation"><button class="w-full text-white bg-yellow-300 p-2 rounded-lg text-sm">Reserve</button></a>
                    </div>

                    <p class="py-2 text-center font-light text-xs">You won't be charged yet.</p>
                </div>
            
            </div>
        </div>
    </div>
    </main>

   

  </div>

  
</div>

</body>



</html>