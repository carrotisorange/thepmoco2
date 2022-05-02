<x-app-layout>
    @section('title', '| Reference | Create')
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
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $unit->unit }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">{{ $tenant->tenant }}</li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">References</li>

                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    @if($references->count())
                    <x-button
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/create'">
                        <i class="fa-solid fa-circle-check"></i>&nbspSave
                    </x-button>
                    @else
                    <x-button
                        onclick="window.location.href='/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/contract/{{ Str::random(8) }}/create'">
                        <i class="fa-solid fa-forward"></i>&nbspSkip
                    </x-button>
                    @endif
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-12 bg-white border-b border-gray-200">
                    @livewire('reference-component', ['unit' => $unit, 'tenant' => $tenant, 'references' =>
                    $references])
                    @if (!$references->count())

                    @else
                    <span>References ({{ $references->count() }}) </span>

                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>Full Name</x-th>
                                    <x-th>Email</x-th>
                                    <x-th>Mobile</x-th>
                                    <x-th>Relationship</x-th>
                                    <x-th></x-th>
                                </tr>
                            </thead>
                            <?php $ctr = 1; ?>
                            @foreach ($references as $item)
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <x-td>{{ $ctr++}}</x-td>
                                    <x-td>{{ $item->reference }}</x-td>
                                    <x-td>{{ $item->email }}</x-td>
                                    <x-td>{{ $item->mobile_number }}</x-td>
                                    <x-td>{{ $item->relationship->relationship }}</x-td>
                                    <x-td>
                                        <form method="POST" action="/reference/{{ $item->id }}/delete"
                                            id="delete-form">
                                            @csrf
                                            @method('delete')
                                            <x-button class=" " onclick="confirmMessage()"><i
                                                    class="fa-solid fa-trash-can"></i></x-button>
                                        </form>
                                    </x-td>
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