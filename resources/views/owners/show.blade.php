<x-new-layout>
    @section('title', $owner_details->owner. ' | '. Session::get('property_name'))
    @livewire('owner-edit-component', ['owner_details' => $owner_details])
</x-new-layout>