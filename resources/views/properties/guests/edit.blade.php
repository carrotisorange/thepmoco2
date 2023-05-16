<x-new-layout>
    @section('title','Guests | '. Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('booking-edit-component', ['property'=> $property ,'guest_details' => $guest_details, 'booking_details' => $booking_details])
        </div>
    </div>
</x-new-layout>