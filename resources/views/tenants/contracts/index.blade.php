<x-index-layout>
    @section('title', '| Contracts')
    <x-slot name="labels">
        <li class="text-gray-500">{{ $tenant->tenant }}</li>
        <li><span class="text-gray-500 mx-2">/</span></li>
        <li class="text-gray-500">Contracts</li>
    </x-slot>

    <x-slot name="options">
        <x-button onclick="window.location.href='/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}'">
            Go back to tenant
        </x-button>

        <x-button onclick="window.location.href='units'">
            Add a new contract
        </x-button>

    </x-slot>
    @if(!App\Models\UserProperty::where('property_uuid',Session::get('property'))->where('user_id', '!=', auth()->user()->id)->count())
    <nav aria-label="Progress">
        <ol role="list" class="divide-y divide-gray-300 rounded-md border border-gray-300 md:flex md:divide-y-0">
            <li class="relative md:flex md:flex-1">
                <!-- Completed Step -->
                <a href="#" class="group flex w-full items-center">
                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                        <span
                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                            <!-- Heroicon name: solid/check -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="ml-4 text-sm font-medium text-gray-900">Create a property</span>
                    </span>
                </a>
    
                <!-- Arrow separator for lg screens and up -->
                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </li>
    
            <li class="relative md:flex md:flex-1">
                <!-- Current Step -->
                <a href="#" class="group flex w-full items-center">
                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                        <span
                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                            <!-- Heroicon name: solid/check -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="ml-4 text-sm font-medium text-gray-900">Add units to your property</span>
                    </span>
                </a>
    
                <!-- Arrow separator for lg screens and up -->
                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </li>
    
    
    
            <li class="relative md:flex md:flex-1">
                <!-- Current Step -->
                <a href="#" class="group flex w-full items-center">
                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                        <span
                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full bg-indigo-600 group-hover:bg-indigo-800">
                            <!-- Heroicon name: solid/check -->
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <span class="ml-4 text-sm font-medium text-gray-900">Add tenants to your property</span>
                    </span>
                </a>
    
                <!-- Arrow separator for lg screens and up -->
                <div class="absolute top-0 right-0 hidden h-full w-5 md:block" aria-hidden="true">
                    <svg class="h-full w-full text-gray-300" viewBox="0 0 22 80" fill="none" preserveAspectRatio="none">
                        <path d="M0 -2L20 40L0 82" vector-effect="non-scaling-stroke" stroke="currentcolor"
                            stroke-linejoin="round" />
                    </svg>
                </div>
            </li>
    
    
            <li class="relative md:flex md:flex-1">
                <!-- Upcoming Step -->
                <a href="#" class="group flex items-center">
                    <span class="flex items-center px-6 py-4 text-sm font-medium">
                        <span
                            class="flex h-10 w-10 flex-shrink-0 items-center justify-center rounded-full border-2 border-gray-300 group-hover:border-gray-400">
                            <span class="text-gray-500 group-hover:text-gray-900">04</span>
                        </span>
                        <span class="ml-4 text-sm font-medium text-gray-500 group-hover:text-gray-900">Add employees to help
                            you
                            manage your property.</span>
                    </span>
                </a>
            </li>
    
        </ol>
    </nav>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="mt-10 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No employees</h3>
        <p class="mt-1 text-sm text-gray-500">You're almost there!</p>
        <div class="mt-6">
            <button type="button" onclick="window.location.href='/property/{{ Session::get('property') }}/user/{{ Str::random(8) }}/create'"
                class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <!-- Heroicon name: mini/plus -->
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    aria-hidden="true">
                    <path
                        d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
               Add your first employee
            </button>
        </div>
    </div>
    @else
    @include('admin.tables.contracts')
    @endif
</x-index-layout>
@include('tenants.contracts.create')
@include('modals.popup-error-modal')