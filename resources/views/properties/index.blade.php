<x-main-layout>
    @section('title', 'The Property Manager')
    <div class="mx-auto px-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-10">
        <div class="space-y-12">
            <div class="pb-1 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
                <div>
                    <?php $name = explode(" ", auth()->user()->name); ?>
                    <h2 class="text-xl text-purple-600 font-bold tracking-tight sm:text-4xl">Welcome back,
                        {{ $name[0] }}</h2>
                    <p class="mt-4 text-xl text-base text-white-900">
                        Select your property.
                    </p>
                </div>
                <div class="mt-3 sm:mt-0 sm:ml-4">
                    @if($properties->count())
                    <button type="button" onclick="window.location.href='/property/{{ Str::random(8) }}/create'"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Create new property
                    </button>
                    @endif
                </div>
            </div>
            <ul role="list"
                class="space-y-12 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:px-32 gap-x-8">
                @foreach ($properties as $property)
                <li>
                    <div class="space-y-4">
                        <div class="aspect-w-3 aspect-h-2">
                            <a href="/property/{{ $property->property->uuid }}">
                                <img class="object-cover shadow-lg rounded-lg"
                                    src="{{ asset('/brands/property_page.png') }}" alt="property picture">
                            </a>
                        </div>


                        <div class="space-y-2">
                            <div class="text-lg leading-6 font-medium space-y-1">
                                <h3>{{ $property->property->property }}</h3>
                                <p class="text-indigo-600">{{ $property->property->type->type }}</p>
                            </div>
                            <ul role="list" class="flex space-x-5">
                                <li>
                                    <a title="edit" href="/property/{{ $property->property->uuid }}/edit"
                                        class="text-gray-400 hover:text-gray-500">
                                        <span class="sr-only"></span>
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @if(!$properties->count())
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No properties</h3>
                <p class="mt-1 text-sm text-gray-500">
                    Get started by creating a new property.
                </p>
                <div class="mt-6">
                    <button type="button" onclick="window.location.href='/property/{{ Str::random(8) }}/create'"
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <!-- Heroicon name: solid/plus -->
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        New Property
                    </button>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-main-layout>