<x-index-layout>
    @section('title', '| Properties')
    <x-slot name="labels">
        Welcome &nbsp<b> {{ auth()->user()->username }}</b>!
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='/chatify'">
            Chat other users
        </x-button>
        @can('manager')
        <x-button onclick="window.location.href='/property/{{ Str::random(10) }}/create'">
            Create a property
        </x-button>

        @endcan
    </x-slot>
    <table class="min-w-full divide-y divide-gray-200">
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
                            <a href="/property/{{ $property->property->uuid }}">
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
                    <span class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-sm text-orange-800">
                        <i class="fa-solid fa-clock"></i> {{
                        $property->property->status }}
                    </span>
                    @endif
                </x-td>
                <x-td>{{
                    Carbon\Carbon::parse($property->property->created_at)->diffForHumans()
                    }}</x-td>
                <x-td>
                    <form action="/property/{{ $property->property->uuid }}/delete">
                        <x-delete-button title="remove this property"><i class="fa-solid fa-circle-xmark"></i>
                        </x-delete-button>
                    </form>
                </x-td>
                @empty
                <x-td>No properties found!</x-td>
                {{-- <x-td>
                    <button id="dropdownDividerButton"
                        data-dropdown-toggle="dropdownDivider.{{ $property->property->uuid }}"
                        class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                        type="button"><i class="fa-solid fa-list-check"></i>&nbspOptions
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>

                    <div id="dropdownDivider.{{ $property->property->uuid }}"
                        class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1" aria-labelledby="dropdownDividerButton">
                            <li>
                                <a href="/property/{{ $property->property->uuid }}/"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-eye"></i>&nbspShow
                                </a>
                            </li>
                            {{-- <li>
                                <a href="/property/{{ $property->property->uuid }}/edit"
                                    class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"><i
                                        class="fa-solid fa-pen-to-square"></i>&nbspEdit
                                </a>
                            </li>

                        </ul>

                    </div>
                </x-td> --}}

            </tr>

        </tbody>

        @endforelse
    </table>
</x-index-layout>