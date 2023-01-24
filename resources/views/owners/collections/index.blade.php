<x-new-layout>
    @section('title', $owner->owner.' | '.Session::get('property_name'))
    <div class="mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-5 px-4 sm:px-6 lg:px-8">
            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">{{ $owner->owner }} /
                        Collections</h1>
                </div>
                <button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner->uuid }}/bills'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    Go back to bills
                    </a></button>


            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="bg-gray-50">
                    <tr>

                        <x-th>
                            AR #
                        </x-th>
                        {{-- <x-th>
                            OWNER
                        </x-th> --}}
                        <x-th>
                            DATE APPLIED
                        </x-th>
                        <x-th>
                            DATE DEPOSITED
                        </x-th>
                        <x-th>
                            MODE OF PAYMENT
                        </x-th>
                        <x-th>
                            CHEQUE NO
                        </x-th>
                        <x-th>
                            BANK
                        </x-th>
                        <x-th>
                            AMOUNT PAID
                        </x-th>
                        <x-th></x-th>
                        <x-th></x-th>
                        <x-th></x-th>
                        <x-th></x-th>


                    </tr>
                </thead>
                @foreach($collections as $item)
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Selected: "bg-gray-50" -->
                    <tr>

                        <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                        <x-td>{{ $item->ar_no }}</x-td>

                        {{-- <x-td>
                            <a class="text-indigo-500 text-decoration-line: underline"
                                href="/property/{{ Session::get('property') }}/owner/{{ $item->owner->uuid }}/collections">
                                {{ $item->owner->owner}}
                            </a>
                        </x-td> --}}
                        <x-td>
                            {{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}
                        </x-td>
                        <x-td>
                            @if($item->date_deposited)
                            {{ Carbon\Carbon::parse($item->date_deposited)->format('M d, Y') }}
                            @else
                            NA
                            @endif
                        </x-td>
                        <x-td>
                            {{ $item->mode_of_payment }}
                        </x-td>
                        <x-td>
                            @if($item->cheque_no)
                            {{ $item->cheque_no }}
                            @else
                            NA
                            @endif
                        </x-td>
                        <x-td>
                            @if($item->bank)
                            {{ $item->bank }}
                            @else
                            NA
                            @endif
                        </x-td>
                        <?php
                            $collections_count = App\Models\Collection::where('batch_no', $item->collection_batch_no)->count();
                        ?>
                        <x-td>
                            {{ number_format($item->amount,2) }} ({{ $collections_count }})
                        </x-td>
                        <x-td>
                            <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner->uuid }}/ar/{{ $item->id }}/view"
                                class="text-indigo-500 text-decoration-line: underline" target="_blank">View</a>
                        </x-td>

                        <x-td>
                            <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner->uuid }}/ar/{{ $item->id }}/export"
                                class="text-indigo-500 text-decoration-line: underline">Export</a>
                        </x-td>

                        <x-td>

                            @if(!$item->attachment == null)
                            <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner->uuid }}/ar/{{ $item->id }}/attachment"
                                target="_blank" class="text-indigo-500 text-decoration-line: underline">Attachment</a>
                            @endif
                        </x-td>
                        <x-td>

                            @if(!$item->proof_of_payment == null)
                            <a href="/property/{{ $item->property_uuid }}/owner/{{ $item->owner->uuid }}/ar/{{ $item->id }}/proof_of_payment"
                                target="_blank" class="text-indigo-500 text-decoration-line: underline">Proof of payment</a>
                            @endif
                        </x-td>
                    </tr>
                </tbody>
                @endforeach
                <tr>

                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    {{-- <x-td></x-td> --}}
                    <?php
                        $property_collections_count = App\Models\Collection::posted()->where('owner_uuid',$owner->uuid)->where('property_uuid', Session::get('property'))->count();
                    ?>
                    <x-td>
                        {{ number_format($collections->sum('amount'), 2) }} ({{ $property_collections_count }})
                    </x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                    <x-td></x-td>
                </tr>
            </table>
        </div>
    </div>
</x-new-layout>