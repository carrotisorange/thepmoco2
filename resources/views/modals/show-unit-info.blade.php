<!-- Product info -->
<div
    class="max-w-2xl mx-auto pt-10 pb-16 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:pb-24 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
    <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 sm:text-3xl">{{
            $unit->building->building.' '.$unit->unit }}</h1>
    </div>

    <!-- Options -->
    <div class="mt-4 lg:mt-0 lg:row-span-3">
        <h2 class="sr-only">Product information</h2>
        <p class="text-3xl text-gray-900">Php {{ number_format($unit->rent,2) }}/month</p>

        <div class="mt-10">
            <h3 class="text-sm font-medium text-gray-900">Description</h3>

            <div class="mt-4">
                <ul role="list" class="pl-4 list-disc text-sm space-y-2">
                    <li class="text-gray-400"><span class="text-gray-600">Category: {{ $unit->category->category
                            }}</span></li>

                    <li class="text-gray-400"><span class="text-gray-600">Enrolled in Leasing:
                            @if($unit->is_enrolled === 1)
                            Enrolled
                            @else
                            Unenrolled
                            @endif</span></li>

                    <li class="text-gray-400"><span class="text-gray-600">Building: {{ $unit->building->building
                            }}</span>
                    </li>

                    <li class="text-gray-400"><span class="text-gray-600">Floor: {{ $unit->floor->floor
                            }}</span></li>

                    <li class="text-gray-400"><span class="text-gray-600">Status: {{ $unit->status->status
                            }}</span></li>
                    <li class="text-gray-400"><span class="text-gray-600">Size: {{ $unit->size }} sqm</span>
                    </li>

                </ul>
            </div>
        </div>

        {{-- <form class="mt-10">

            <button type="submit"
                class="mt-10 w-full bg-indigo-600 border border-transparent rounded-md py-3 px-8 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Add
                to bag</button>
        </form> --}}
    </div>

    <div class="py-10 p-12 lg:pt-6 lg:pb-16 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <!-- Description and details -->
        <div>
            <h3 class="sr-only">Description</h3>

            <div class="space-y-6">
                <div class="mt-6 max-w-full mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
                    <div class="hidden aspect-w-3 aspect-h-4 rounded-lg overflow-hidden lg:block">
                        <img src="/storage/{{ $unit->thumbnail }}"
                            alt="Two each of gray, white, and black shirts laying flat."
                            class="w-full h-full object-center object-cover">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>