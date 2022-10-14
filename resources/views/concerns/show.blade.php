<x-new-layout>
    @section('title','Concerns | '. Session::get('property_name'))

    @livewire('concern-respond-component', ['concern' => $concern])
</x-new-layout>