@section('title', '| Owners')
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
                                {{ Str::plural('Owner', $owners->count())}}
                            </li>
                        </ol>
                    </nav>
                </h2>
            </div>
            <h5 class="flex-1 text-right">

            </h5>
        </div>
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            <x-search placeholder="Search for name, mobile, or email"></x-search>
        </div>
        <div class="mt-5">
            {{ $owners->links() }}
        </div>
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
                                            <x-th>Name</x-th>
                                          
                                            <x-th>Occupation</x-th>
                                            <x-th>Contact</x-th>
                                            <x-th>Address</x-th>

                                    </thead>
                                    @forelse ($owners as $owner)
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr>
                                            <x-td>{{ $ctr++ }}</x-td>
                                            <x-td>
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 h-10 w-10">
                                                        <a href="/owner/{{ $owner->uuid }}/edit"><img
                                                                class="h-10 w-10 rounded-full"
                                                                src="/storage/{{ $owner->photo_id }}" alt=""></a>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900"><b>{{
                                                                $owner->owner }}</b>
                                                        </div>
                                                        <div class="text-sm text-gray-500">{{ $owner->type }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </x-td>
                                          
                                            <x-td>{{ $owner->occupation?$owner->occupation:'NA' }}</x-td>
                                            <x-td>
                                                <div class="text-sm text-gray-900">{{ $owner->email }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{ $owner->mobile_number }}
                                                </div>
                                            </x-td>
                                            <x-td>
                                                <div class="text-sm text-gray-900">{{ $owner->province->province.',
                                                    '.$owner->city->city.', '.$owner->barangay }}
                                                </div>
                                                <div class="text-sm text-gray-500">{{
                                                    $owner->country->country }}
                                                </div>
                                            </x-td>
                                            @empty
                                            <x-td>
                                                No data found!
                                            </x-td>
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