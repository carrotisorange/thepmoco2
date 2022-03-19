<x-app-layout>
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
                                    {{ Str::plural('Unit', $units->count())}} ({{ $units->count() }})
                                </li>
                            </ol>
                        </nav>
                    </h2>
                </div>
                <h5 class="flex-1 text-right">
                    <x-button onclick="window.location.href='/unit/{{ Str::random(10) }}/create'">Create Unit</x-button>
                </h5>

            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (!$units->count())
                    <span class="text-center text-red">No units found!</span>
                    @else
                    <div class="flex flex-row">
                        <div class="basis-1/4 ml-5">
                            <span class="font-bold">Filters ({{ $units->count() }})</span>
                            <div class="mt-5">
                                <div class="flex">
                                    <div>
                                        <span>Category</span>
                                        @foreach ($categories as $category)
                                        <div class="form-check">
                                            <input
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox" value="{{ $category->id }}" id="flexCheckDefault">
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="flexCheckDefault">
                                                {{ $category->category }}
                                            </label>
                                        </div>
                                        @endforeach

                                        <div class="mt-5">
                                            <span>Building</span>
                                            @foreach ($buildings as $building)
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                    type="checkbox" value="{{ $building->id }}" id="flexCheckDefault">
                                                <label class="form-check-label inline-block text-gray-800"
                                                    for="flexCheckDefault">
                                                    {{ $building->building }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-5">
                                            <span>Floor</span>
                                            @foreach ($floors as $floor)
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                    type="checkbox" value="{{ $floor->id }}" id="flexCheckDefault">
                                                <label class="form-check-label inline-block text-gray-800"
                                                    for="flexCheckDefault">
                                                    {{ $floor->floor }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-5">
                                            <span>Rent</span>
                                            @foreach ($rents as $rent)
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                    type="checkbox" value="{{ $rent->rent }}" id="flexCheckDefault">
                                                <label class="form-check-label inline-block text-gray-800"
                                                    for="flexCheckDefault">
                                                    ₱ {{ number_format($rent->rent, 2) }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-5">
                                            <span>Discount</span>
                                            @foreach ($discounts as $discount)
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                    type="checkbox" value="{{ $discount->discount }}"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label inline-block text-gray-800"
                                                    for="flexCheckDefault">
                                                    ₱ {{ number_format($discount->discount, 2) }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="mt-5">
                                            <span>Dimension</span>
                                            @foreach ($dimensions as $dimension)
                                            <div class="form-check">
                                                <input
                                                    class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                    type="checkbox" value="{{ $dimension->dimensions }}"
                                                    id="flexCheckDefault">
                                                <label class="form-check-label inline-block text-gray-800"
                                                    for="flexCheckDefault">
                                                    {{ $dimension->dimensions }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        {{-- <div class="form-check">
                                            <input
                                                class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                                                type="checkbox" value="" id="flexCheckChecked" checked>
                                            <label class="form-check-label inline-block text-gray-800"
                                                for="flexCheckChecked">
                                                Checked checkbox
                                            </label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="basis-1/2">
                            <span class="font-bold">Unit</span>
                            @foreach($units as $unit)
                            <a href="/unit/{{ $unit->uuid }}"><img src="/storage/{{ $unit->thumbnail }}"
                                    class="p-2 bg-white border rounded max-w-md mt-5 mx-5 ml-5 mr-5 hover:bg-purple-600"
                                    alt="..." /></a>
                            @endforeach

                        </div>
                        <div class="basis-1/4">
                            <span class="font-bold">Details</span>
                            <p class="text-left">
                                @foreach($units as $info)
                            <div class="mt-14">
                                <p>Unit: {{ $info->unit }}</p>
                                <p>Building: {{ $info->building?$info->building:'NA' }}</p>
                                <p>Floor: {{ $info->floor?$info->floor:'NA' }}</p>
                                <p>Status: {{ $info->status }}</p>
                                <p>Rent: {{ number_format($info->rent, 2) }}</p>
                                <p>Discount: {{ number_format($info->discount, 2) }}</p>
                                <p>Dimensions: {{ $info->dimensions }}</p>
                                <p>Created: {{ $info->created_at->diffForHumans() }}</p>
                            </div>

                            <div class="mt-20">
                                <hr>
                            </div>

                            @endforeach
                            </p>
                        </div>
                    </div>
                    <hr>
                    @endif

                    <div class="mt-3">
                        {{ $units->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>