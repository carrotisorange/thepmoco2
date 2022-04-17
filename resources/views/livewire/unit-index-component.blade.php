@section('title', '| Units')
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
                            <li class="text-gray-500">
                                {{ Str::plural('Unit', $units->count())}}
                            </li>
                        </ol>
                    </nav>

                </h2>
            </div>
            <h5 class="flex-1 text-right">

                @can('manager')
                <x-button onclick="window.location.href='/unit/{{ Str::random(10) }}/create'">Create Unit
                </x-button>
                @endcan
            </h5>
        </div>
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">

        <div class="rounded">
            <x-input wire:model="search" type="text" class=" py-2 w-full" placeholder="Enter unit..." />
        </div>


        <div class="mt-5">
            {{ $units->links() }}
        </div>

        <div class="mt-5 p-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 bg-white border-b border-gray-200">
                {{-- @if (!$units->count())
                <span class="text-center text-red">No units found! <a class="text-blue-600"
                        href="/property/{{ Session::get('property') }}/units">Reset filters</a> </span>
                @else --}}
                <div class="flex flex-row">
                    <div class="basis-1/4 ml-5">
                        <span class="font-bold">Filters</span>

                        @if($status_id || $is_enrolled || $category_id || $building_id || $floor_id ||  $rent || $discount || $size)
                        <div class="mt-5">
                            <span> <a class="text-red-600" href="/property/{{ Session::get('property') }}/units"><i class="fa-solid fa-circle-xmark"></i> Reset
                                filters</a></span>
                
                        </div>
                        @endif
                        <div class="">
                            <div class="flex">
                                <div>
                                    <div class="mt-5">
                                        <span>Status</span>
                                        @forelse ($statuses as $status)
                                        <div class="form-check">
                                            <input wire:model="status_id"
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" value="{{ $status->status_id }}">
                                            <label class="form-check-label inline-block text-gray-800" for="status_id">
                                                {{ $status->status }} ({{ $status->count }})
                                            </label>
                                        </div>
                                        @empty
                                        <p>NA</p>
                                        @endforelse

                                    </div>

                                    <div class="mt-5">
                                        <span>Enrollment Status</span>
                                        @forelse ($enrollment_statuses as $enrollment_status)

                                        <div class="form-check">
                                            <input wire:model="is_enrolled"
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" value="{{ $enrollment_status->is_enrolled }}"
                                                id="flexCheckDefault">
                                            @if($enrollment_status->is_enrolled == 1)
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="flexCheckDefault">
                                                enrolled ({{ $enrollment_status->count }})
                                            </label>
                                            @else
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="flexCheckDefault">
                                                unenrolled ({{ $enrollment_status->count }})
                                            </label>
                                            @endif

                                        </div>
                                        @empty
                                        <p>NA</p>
                                        @endforelse
                                    </div>

                                    <div class="mt-5">
                                        <span>Category</span>
                                        @forelse ($categories as $category)

                                        <div class="form-check">
                                            <input wire:model="category_id"
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" value="{{ $category->category_id }}" id="category_id">
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="category_id">
                                                {{ $category->category }} ({{ $category->count }})
                                            </label>
                                        </div>
                                        @empty
                                        <p>NA</p>
                                        @endforelse
                                    </div>

                                    <div class="mt-5">
                                        <span>Building</span>
                                        @forelse ($buildings as $building)

                                        <div class="form-check">
                                            <input wire:model="building_id"
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" value="{{ $building->building_id }}" id="building_id">
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="building_id">
                                                {{ $building->building }} ({{ $building->count }})
                                            </label>
                                        </div>
                                        @empty
                                        <p>NA</p>
                                        @endforelse
                                    </div>

                                    <div class="mt-5">
                                        <span>Floor</span>
                                        @forelse ($floors as $floor)

                                        <div class="form-check">
                                            <input wire:model="floor_id"
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" value="{{ $floor->floor_id }}" id="floor_id">
                                            <label class="form-check-label inline-block text-gray-800" for="floor_id">
                                                {{ $floor->floor }} ({{ $floor->count }})
                                            </label>
                                        </div>
                                        @empty
                                        <p>NA</p>
                                        @endforelse
                                    </div>

                                    <div class="mt-5">
                                        <span>Rent</span>
                                        @forelse ($rents as $rent)

                                        <div class="form-check">
                                            <input wire:model="rent"
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" value="{{ $rent->rent }}" id="flexCheckDefault">
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="flexCheckDefault">
                                                ₱ {{ number_format($rent->rent, 2) }} ({{ $rent->count }})
                                            </label>
                                        </div>
                                        @empty
                                        <p>NA</p>
                                        @endforelse
                                    </div>
                                    <div class="mt-5">
                                        <span>Discount</span>
                                        @forelse ($discounts as $discount)

                                        <div class="form-check">
                                            <input wire:model="discount"
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" value="{{ $discount->discount }}" id="flexCheckDefault">
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="flexCheckDefault">
                                                ₱ {{ number_format($discount->discount, 2) }} ({{ $discount->count }})
                                            </label>
                                        </div>
                                        @empty
                                        <p>NA</p>
                                        @endforelse
                                    </div>
                                    <div class="mt-5">
                                        <span>Size</span>
                                        @forelse ($sizes as $size)

                                        <div class="form-check">
                                            <input wire:model="size"
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="radio" value="{{ $size->size }}" id="flexCheckDefault">
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="flexCheckDefault">
                                                {{ $size->size }} sqm ({{ $size->count }})
                                            </label>
                                        </div>
                                        @empty
                                        <p>NA</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="basis-1/4">
                        @if($units->count())
                        <span class="font-bold">Results ({{ $units->count() }})...</span>
                        @else
                        <p class="text-center text-red-600">No units found!</p>
                        @endif
                        @foreach($units as $unit)
                        <a href="/unit/{{ $unit->uuid }}"><img src="/storage/{{ $unit->thumbnail }}"
                                class="p-2 bg-white border rounded max-w-md mt-5 mx-5 ml-5 mr-5 hover:bg-purple-600"
                                alt="..." /></a>
                        @endforeach
                    </div>
                    <div class="basis-1/2 ml-16">
                        @if($units->count())
                        <span class="font-bold">Details</span>
                        @endif
                        <p class="text-left">
                            @foreach($units as $info)
                        <div class="mt-8">
                            <table class="w-3/4 divide-y divide-gray-200">
                                <tbody>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Unit:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">{{ $info->unit }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                                            $info->category->category }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Enrolled in leasing:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">
                                            @if($info->is_enrolled === 1)
                                            Enrolled
                                            @else
                                            Unenrolled
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Building:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                                            $info->building->building }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Floor:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">{{ $info->floor->floor
                                            }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Status:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                                            $info->status->status }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Rent:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">₱{{
                                            number_format($info->rent, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Discount:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">₱{{
                                            number_format($info->discount, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Size:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                                            number_format($info->suze, 2) }} sqm</td>
                                    </tr>
                                    <tr>
                                        <th scope="col"
                                            class="px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Created:</th>
                                        <td class="px-6 whitespace-nowrap text-md text-gray-500">{{
                                            $info->created_at->diffForHumans() }}
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                        <div class="mt-8">
                            <hr>
                        </div>
                        @endforeach
                        </p>
                    </div>
                </div>
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>