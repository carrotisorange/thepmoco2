<x-index-layout>
    @section('title', 'Dashboard')
    <x-slot name="labels">
        Sales / Properties / {{ $user->name }}
    </x-slot>
    <x-slot name="options">
        <x-button onclick="window.location.href='{{ url()->previous() }}'"> Go back to main
        </x-button>
    </x-slot>

    <div class="">
        {{-- <x-search placeholder="Enter name, email, and mobile..."></x-search>
        <div class="mt-2 mb-2">
            {{ $tenants->links() }}
        </div>--}}
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50">
                    <tr>
                        <x-th>#</x-th>
                        <x-th>Property</x-th>
                        <x-th># of Employees</x-th>
                        <x-th># of Units</x-th>
                        <x-th># of Tenants</x-th>
                        <x-th>Address</x-th>
                        <x-th>Created</x-th>

                    </tr>
                </thead>
                @foreach ($properties as $property)
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <x-td>{{ $property->id }}</x-td>
                        <x-td>
                            <div class="text-sm font-medium text-gray-900">
                                <b>{{
                                    $property->property->property }}</b>
                            </div>
                            <div class="text-sm text-gray-500">{{
                                $property->property->type->type
                                }}
                            </div>
                        </x-td>
                        <?php
                                                                            $users = App\Models\UserProperty::where('property_uuid', $property->property->uuid)->count();
                                                                        ?>
                        <x-td>{{ $users }}</x-td>
                        <x-td>{{ $property->property->units->count()}}</x-td>
                        <x-td>{{ $property->property->tenants->count() }}</x-td>
                        <x-td>{{ $property->property->country->country.','.$property->property->province->province.','.$property->property->city->city.','.$property->property->barangay }}</x-td>

                        <x-td>{{
                            Carbon\Carbon::parse($property->property->created_at)->diffForHumans()
                            }}</x-td>

                    </tr>
                </tbody>
                @endforeach
            </table>
        </div>
    </div>

</x-index-layout>