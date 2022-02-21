<x-app-layout>
    @section('title', '| Edit',)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <nav class="rounded-md w-full">
                <ol class="list-reset flex">
                    <li><a href="/property/{{ Session::get('property') }}" class="text-blue-600 hover:text-blue-700">{{
                            Session::get('property_name') }}</a>
                    </li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li><a href="/property/{{ Session::get('property') }}/rooms"
                            class="text-blue-600 hover:text-blue-700">Rooms</a>
                    </li>
                    <li><span class="text-gray-500 mx-2">/</span></li>
                    <li class="text-gray-500">Edit ({{ $rooms->count() }})</li>
                </ol>
            </nav>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- This example requires Tailwind CSS v2.0+ -->
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
                                                    Room</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Building</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Floor</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Category</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Price</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Status</th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    </th>

                                            </tr>
                                        </thead>
                                        <?php $ctr=1?>
                                        @foreach ($rooms as $room)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $room->room }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <select name="" id="">
                                                        <option value="{{ $room->building_id }}" selected>{{
                                                            $room->building }}</option>
                                                        @foreach ($buildings as $building)
                                                        <option value="{{ $building->id }}">{{ $building->building }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <select name="" id="">
                                                        <option value="{{ $room->building_id }}" selected>{{
                                                            $room->building }}</option>
                                                        @foreach ($floors as $floor)
                                                        <option value="{{ $floor->id }}">{{ $floor->floor }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <select name="" id="">
                                                        <option value="{{ $room->building_id }}" selected>{{
                                                            $room->building }}</option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->category }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <input type="number" step="0.001" name="price"
                                                        value="{{ $room->price }}">
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    @if($room->status === 'active')
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{ $room->status }} </span>
                                                    @else
                                                    <span
                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                        {{ $room->status }} </span>
                                                    @endif
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <form method="POST" action="/room/{{ $room->uuid }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="text-red-600 hover:text-red-900">Remove</button>
                                                    </form>
                                                   
                                                </td>

                                            </tr>

                                            <!-- More people... -->
                                        </tbody>
                                        @endforeach
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