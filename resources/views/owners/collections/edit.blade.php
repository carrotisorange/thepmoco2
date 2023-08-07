<x-new-layout>
    @section('title', $owner->owner.' | '.Session::get('property_name'))
    <div class="mt-8">
        <div class="max-full mx-auto md:px-6">
            @livewire('collection-owner-edit-component', ['collections' => $collections,'owner' => $owner,'batch_no'=> $batch_no])
        </div>
    </div>
</x-new-layout>