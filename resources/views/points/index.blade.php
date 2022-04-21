<x-app-layout>
    @section('title', '| Points')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="flex">
                <div class="h-3">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        <nav class="rounded-md">
                            <ol class="list-reset flex">
                                <li><a href="/property/{{ Session::get('property') }}"
                                        class="text-indigo-600 hover:text-indigo-700">{{
                                        Session::get('property_name') }}</a>
                                </li>
                                <li><span class="text-gray-500 mx-2">/</span></li>
                                <li class="text-gray-500">
                                    {{ Str::plural('Point', $points->count())}} ({{ $points->count() }})
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
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                @if (!$points->count())
                                <span class="text-center text-red">No points found!</span>
                                @else
                                <span class="text-center text-red">Total points: {{ $points->sum('point') }}</span>
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <?php $ctr =1; ?>
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    #</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Action</th>
                                                    
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Point</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Earned</th>
                                              
                                            </tr>
                                        </thead>
                                        @foreach ($points as $point)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $point->action }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{number_format($point->point, 2)}}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ Carbon\Carbon::parse($point->created_at)->format('M d, Y') }}
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
            </div>
        </div>
    </div>
</x-app-layout>