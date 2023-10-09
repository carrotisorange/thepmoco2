<x-landing-page-template>
@section('title',env('APP_NAME').' | Jobs')
@section('description', 'A product to make easy the life of property managers and property owners. The property management system is a handy application to simplify operations in rental properties from tenant finding, lease contract management, billing and collection management, and concerns and maintenance requests for landlords, dormitories, apartment rentals, and other rentals.')
        <div class="flex justify-center items-center p-10 mt-12 sm:mt-16 lg:mt-0">
              <img class="w-full shadow-xl max-w-3xl"  src="{{ asset('/brands/landing/intern.jpg')}}" alt="intern flyer">
        </div>
</x-landing-page-template>
