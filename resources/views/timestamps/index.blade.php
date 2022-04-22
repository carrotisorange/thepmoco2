<x-app-layout>
    @section('title', '| Timestamps')
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
                                    {{-- {{ Str::plural('Point', $timestamps->count())}} ({{ $timestamps->count() }})
                                    --}}
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
                                {{-- @if (!$timestamps->count())
                                <span class="text-center text-red">No timestamps found!</span>
                                @else --}}
                                {{-- <span class="text-center text-red">Total points: {{ $timestamps->sum('point')
                                    }}</span> --}}
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
                                                    Name</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Role</th>


                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Time in</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Time out</th>

                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Ip Address</th>

                                            </tr>
                                        </thead>
                                        @foreach ($timestamps as $timestamp)
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $ctr++ }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $timestamp->user->name }}
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $timestamp->user->role->role }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{
                                                    Carbon\Carbon::parse($timestamp->created_at)->timezone('Asia/Manila')->format('M
                                                    d, Y @ H:i') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{
                                                    Carbon\Carbon::parse($timestamp->updated_at)->timezone('Asia/Manila')->format('M
                                                    d, Y @ H:i') }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $timestamp->ip_address }}
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>

                                </div>
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>