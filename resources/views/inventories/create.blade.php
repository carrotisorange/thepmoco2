<x-new-layout>
    @section('title', $unit->unit.' | '. env('APP_NAME'))

    <div class="mx-auto px-4 sm:px-6 lg:px-8">

        <div class="pt-6 sm:pb-5">

            @livewire('unit-inventory-component', ['unitDetails' => $unit, 'batch_no' => $batch_no, 'ismovein' =>
            $ismovein])

        </div>
    </div>
</x-new-layout>