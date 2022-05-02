<x-app-layout>
    @section('title', 'Points')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                
                                <li class="text-gray-500">
                                   <span class="text-center text-red">Total Redeemable Points: {{ $points->sum('point') }}</span>
                                </li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    {{-- <div class="rounded">
                        <x-input type="text" class=" py-2 w-80" placeholder="Enter name, email, mobile, or unit." />
                        <x-button class="px-4 text-white bg-gray-600 border-l ">
                            <i class="fa-solid fa-magnifying-glass"></i>&nbsp; Search
                        </x-button>
                    </div> --}}
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <x-th>#</x-th>
                                                <x-th>Property</x-th>
                                                <x-th>Action</x-th>
                                                <x-th>Point</x-th>
                                                <x-th>Earned on</x-th>
                                            </tr>
                                        </thead>
                                        @forelse ($points as $item)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <x-td>{{ $ctr++ }}</x-td>
                                                <x-td>
                                                    <div class="flex items-center">

                                                        <div class="">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                <b>{{
                                                                    $item->property->property }}</b>
                                                            </div>
                                                            <div class="text-sm text-gray-500">{{
                                                                $item->property->type->type
                                                                }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </x-td>
                                                <x-td>{{ $item->action->action }}</x-td>
                                                <x-td>{{$item->point}} points</x-td>
                                                <x-td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                                                </x-td>

                                                @empty

                                                <x-td>No data found!</x-td>

                                            </tr>
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
</x-app-layout>