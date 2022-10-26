<x-new-layout>
    @section('title','Concerns | '. Session::get('property_name'))

    @livewire('concern-respond-component', ['concern_details' => $concern])
</x-new-layout>