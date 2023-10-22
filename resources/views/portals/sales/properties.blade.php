<x-sale-portal-layout>
    <div class=" mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-10 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700" wire:ignore>
                        {{ucfirst(Route::current()->getName())}}
                    </h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">


                </div>
            </div>

            <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">



                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    {{-- {{ $signups->links() }} --}}
                    <div
                        class="mb-5 mt-2 relative overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <!-- Selected row actions, only show when rows are selected. -->
                        <div class="absolute top-0 left-12 flex h-12 items-center space-x-3 bg-gray-50 sm:left-16">

                        </div>

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="bg-gray-50">
                                <tr>
                                    <x-th>#</x-th>
                                    <x-th>Property</x-th>
                                    <x-th># of Personnels</x-th>
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
                                    <?php $users = App\Models\UserProperty::where('property_uuid', $property->property->uuid)->count();?>
                                    <x-td>{{ $users }}</x-td>
                                    <x-td>{{ $property->property->units->count()}}</x-td>
                                    <x-td>{{ $property->property->tenants->count() }}</x-td>
                                    <x-td>{{
                                        $property->property->country->country.','.$property->property->province->province.','.$property->property->city->city.','.$property->property->barangay
                                        }}</x-td>
                                    <x-td>{{Carbon\Carbon::parse($property->property->created_at)->diffForHumans()}}
                                    </x-td>

                                </tr>
                            </tbody>
                            @endforeach
                        </table>

                    </div>

                </div>
            </div>
        </div>


    </div>
</x-sale-portal-layout>
{{--