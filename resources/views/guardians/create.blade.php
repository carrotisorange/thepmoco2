<x-app-layout>
    @section('title', '| Guardian | Create')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-blue-600 hover:text-blue-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $unit->unit }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $tenant->tenant }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">Guardians</li>

                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    @if ($guardians->count())
                    <x-button wire:submit.prevent="submitForm"
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/reference/{{ Str::random(8) }}/create'">
                        <i class="fa-solid fa-circle-check"></i>&nbspSave</x-button>
                    @else
                    <x-button wire:submit.prevent="submitForm"
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/reference/{{ Str::random(8) }}/create'">
                        <i class="fa-solid fa-forward"></i>&nbspSkip</x-button>
                    @endif
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    @livewire('guardian-component', ['unit' => $unit, 'tenant' => $tenant, 'guardians' => $guardians])

                    @if (!$guardians->count())

                    @else
                    <span>Guardians ({{ $guardians->count() }}) </span>

                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        #</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Guardian</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Mobile</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Relationship</th>


                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <?php $ctr = 1; ?>
                            @foreach ($guardians as $guardian)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $ctr++}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $guardian->guardian }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $guardian->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $guardian->mobile_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{
                                        $guardian->relationship->relationship }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form method="POST" action="/guardian/{{ $guardian->id }}/delete"
                                            id="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button title="Remove" class="text-red-600 hover:text-red-900"
                                                form="delete-form"><i class="fa-solid fa-2x fa-trash-can"></i></button>
                                        </form>

                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>