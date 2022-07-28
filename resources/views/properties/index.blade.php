<x-index-layout>
    @section('title', 'My Property')
    <x-slot name="labels">
        Welcome &nbsp<b> {{ auth()->user()->username }}</b>!
    </x-slot>
    <x-slot name="options">
        <x-button id="dropdownButton" data-dropdown-toggle="propertiesOptionsDropdown" type="button">Actions<svg
                class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                </path>
            </svg></x-button>

        <div id="propertiesOptionsDropdown"
            class="text-left hidden z-10 w-30 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1" aria-labelledby="propertiesOptionsDropdown">
                <li>
                    <a href="/property/{{ Str::random(10) }}/create/"
                        class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        Create another property
                    </a>
                </li>
                <li>
                    <a href="/chatify"
                        class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        Chat other users
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        class=" block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        Logout
                    </a>
                </li>



            </ul>
        </div>

    </x-slot>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="bg-gray-50">
            <tr>
                <x-th>#</x-th>
                <x-th>Property</x-th>
                <x-th># of Employees</x-th>
                <x-th># of Units</x-th>
                <x-th># of Tenants</x-th>
                <x-th>Status</x-th>
                <x-th>Created</x-th>
                <x-th></x-th>
            </tr>
        </thead>
        <?php $ctr = 1 ?>
        @forelse ($properties as $property)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <x-td>{{ $ctr++ }}</x-td>
                <x-td>
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            <a href="#/">
                                <img class="h-10 w-10 rounded-full" src="/storage/{{ $property->property->thumbnail }}">
                            </a>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                                <b>{{
                                    $property->property->property }}</b>
                            </div>
                            <div class="text-sm text-gray-500">{{
                                $property->property->type->type
                                }}
                            </div>
                        </div>
                    </div>
                </x-td>
                <?php
                    $users = App\Models\UserProperty::where('property_uuid', $property->property->uuid)->count();
                ?>
                <x-td>{{ $users }}</x-td>
                <x-td>{{ $property->property->units->count()}}</x-td>
                <x-td>{{ $property->property->tenants->count() }}</x-td>
                <x-td>
                    @if($property->property->status === 'active')
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-sm text-green-800">
                        <i class="fa-solid fa-circle-check"></i> {{
                        $property->property->status }}
                    </span>
                    @else
                    <span
                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-sm text-orange-800">
                        <i class="fa-solid fa-clock"></i> {{
                        $property->property->status }}
                    </span>
                    @endif
                </x-td>
                <x-td>{{
                    Carbon\Carbon::parse($property->property->created_at)->diffForHumans()
                    }}</x-td>
                <x-td>
                    <x-button onclick="window.location.href='/property/{{ $property->property->uuid }}'">
                        Go to property
                    </x-button>
                </x-td>
                @empty
                <x-td>No properties found!</x-td>
            </tr>
        </tbody>
        @endforelse
    </table>
</x-index-layout>