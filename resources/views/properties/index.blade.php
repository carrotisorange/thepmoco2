<x-property-base>
    <x-slot name="header">
        <header class="bg-white shadow">
            <div class="max-w-12xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex">
                    <div class="h-3">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            <nav class="rounded-md">
                                <ol class="list-reset flex">
                                    <li>
                                        <?php $name = explode(" ",auth()->user()->name) ?>
                                        Welcome <b>{{ $name[0] }}</b>!
                                        {{-- {{ Str::plural('Property', $properties->count())}} ({{ $properties->count()
                                        }}) --}}
                                    </li>
                                </ol>
                            </nav>
                        </h2>
                    </div>
                    <h5 class="flex-1 text-right">
                        <x-button data-modal-toggle="role-access-modal"><i class="fa-solid fa-universal-access"></i>
                            &nbsp; {{ auth()->user()->role->role }} access</x-button>

                        {{-- <x-button onclick="window.location.href='/documentation/'">Documentation
                        </x-button> --}}
                        @can('manager')
                        <x-button onclick="window.location.href='/property/{{ Str::random(10) }}/create'">
                            <i class="fa-solid fa-circle-plus"></i>&nbspProperty
                        </x-button>

                        @endcan
                    </h5>
                </div>
            </div>
        </header>
    </x-slot>
    <x-slot name="body">
        <div class="py-12">
            <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
                <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="bg-white border-b border-gray-200">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        #</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Property</th>

                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        # of Units</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        # of Tenants</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Status</th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Created</th>

                                                    <th colspan="3" scope="col" class="relative px-6 py-3">
                                                        <span class="sr-only"></span>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php $ctr = 1 ?>
                                            @forelse ($properties as $property)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <b>{{ $ctr++ }}</b>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0 h-10 w-10">

                                                                <img class="h-10 w-10 rounded-full"
                                                                    src="/storage/{{ $property->property->thumbnail }}">
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
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                        $property->property->units->count()}}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                        $property->property->tenants->count() }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if($property->property->status === 'active')
                                                        <span
                                                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            <i class="fa-solid fa-circle-check"></i> {{
                                                            $property->property->status }}
                                                        </span>
                                                        @else
                                                        <span
                                                            class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                            <i class="fa-solid fa-circle-xmark"></i> {{
                                                            $property->property->status }}
                                                        </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                                        Carbon\Carbon::parse($property->property->created_at)->diffForHumans()
                                                        }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <button id="dropdownDividerButton"
                                                            data-dropdown-toggle="dropdownDivider.{{ $property->property->uuid }}"
                                                            class="text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800"
                                                            type="button"><i
                                                                class="fa-solid fa-list-check"></i>&nbspOptions
                                                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M19 9l-7 7-7-7"></path>
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

                                                            </ul>

                                                        </div>
                                                    </td>
                                                    {{-- <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                        <a title="view" href="/property/{{ $property->property->uuid }}"
                                                            class="text-indigo-600 hover:text-indigo-900"><i
                                                                class="fa-solid fa-2x fa-eye"></i></a>&nbsp;&nbsp;&nbsp;

                                                        @can('manager')
                                                        {{-- <a title="edit"
                                                            href="/property/{{ $property->property->uuid }}/edit"
                                                            class="text-indigo-600 hover:text-indigo-900"><i
                                                                class="fa-solid fa-2x fa-pen-to-square"></i></a>&nbsp;&nbsp;&nbsp;

                                                        <a title="remove"
                                                            href="/property/{{ $property->property->uuid }}/delete"
                                                            class="text-red-600 hover:text-indigo-900"><i
                                                                class="fa-solid fa-2x fa-trash-can"></i></a>

                                                        @endcannot

                                                    </td> --}}
                                                </tr>
                                                @empty
                                                <span>No properties found!</span>
                                            </tbody>

                                            @endforelse
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-property-base>