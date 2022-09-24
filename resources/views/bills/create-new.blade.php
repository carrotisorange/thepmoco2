<x-new-layout>
    @section('title', $tenant->tenant.' | '.Session::get('property_name'))

    <div class="mx-auto px-4 sm:px-6 lg:px-8">

        <div class="pt-6 sm:pb-5">
            <div class="lg:border-t lg:border-b lg:border-gray-200">

                <nav class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" aria-label="Progress">
                    <ol role="list"
                        class="rounded-md overflow-hidden lg:flex lg:border-l lg:border-r lg:border-gray-200 lg:rounded-none">


                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">

                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                                <!-- Heroicon name: solid/check -->
                                                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span class="text-sm font-medium text-gray-900">Tenant Information
                                            </span>

                                        </span>
                                    </span>
                                </a>
                            </div>
                        </li>

                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                                <!-- Heroicon name: solid/check -->
                                                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span class="text-sm font-medium text-gray-900">Guardian Information
                                            </span>

                                        </span>
                                    </span>
                                </a>


                                <!-- Separator -->
                                <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                            vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                            </div>
                        </li>

                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                                <!-- Heroicon name: solid/check -->
                                                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span class="text-sm font-medium text-gray-900">Reference Information
                                            </span>

                                        </span>
                                    </span>
                                </a>

                                <!-- Separator -->
                                <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                    <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                        preserveAspectRatio="none">
                                        <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                            vector-effect="non-scaling-stroke" />
                                    </svg>
                                </div>
                        </li>

                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center bg-indigo-600 rounded-full group-hover:bg-indigo-800">
                                                <!-- Heroicon name: solid/check -->
                                                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                        d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span class="text-sm font-medium text-gray-900">Contract Information
                                            </span>

                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </li>

                        <li class="relative overflow-hidden lg:flex-1">
                            <div class="border border-gray-200 overflow-hidden lg:border-0">
                                <!-- Current Step -->
                                <a href="#" aria-current="step">
                                    <span
                                        class="absolute top-0 left-0 w-1 h-full lg:w-full lg:h-1 lg:bottom-0 lg:top-auto"
                                        aria-hidden="true"></span>
                                    <span class="px-6 py-5 flex items-start text-sm font-medium lg:pl-9">
                                        <span class="flex-shrink-0">
                                            <span
                                                class="flex-shrink-0 w-10 h-10 flex items-center justify-center border-2 border-indigo-600 rounded-full">
                                                <span class="text-indigo-600">05</span>
                                            </span>
                                        </span>
                                        <span class="mt-0.5 ml-4 min-w-0 flex flex-col">
                                            <span class="text-sm font-medium text-indigo-600">Bill
                                                Information</span>

                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="hidden absolute top-0 left-0 w-3 inset-0 lg:block" aria-hidden="true">
                                <svg class="h-full w-full text-gray-300" viewBox="0 0 12 82" fill="none"
                                    preserveAspectRatio="none">
                                    <path d="M0.5 0V31L10.5 41L0.5 51V82" stroke="currentcolor"
                                        vector-effect="non-scaling-stroke" />
                                </svg>
                            </div>
                        </li>
                    </ol>
                </nav>


            </div>



        </div>
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                {{-- <h1 class="text-3xl font-bold text-gray-700">Employees</h1> --}}
            </div>
            <div class="mt-2 sm:mt-0 sm:ml-16 sm:flex-none">

                <button type="button" data-modal-toggle="create-particular-modal"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                    New particular
                </button>

            </div>
        </div>
    </div>

    <div class="p-8 bg-white border-b border-gray-200">
        <form class="px-12 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="post"
            action="/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}/bill/store">
            @csrf

            <div>
                <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-full px-3">
                        <x-label for="particular_id">
                            Select a particular
                        </x-label>
                        <x-form-select wire:model="particular_id" id="particular_id" name="particular_id">
                            <option value="">Select one</option>
                            @foreach ($particulars as $particular)
                            <option value="{{ $particular->particular_id }}" {{ old('particular_id')==$particular->
                                particular_id?
                                'selected': 'Select one'
                                }}>{{ $particular->particular }}</option>
                            @endforeach
                        </x-form-select>

                        @error('particular_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-full px-3">
                        <x-label for="particular_id">
                            {{-- Unit --}}
                        </x-label>
                        <x-form-input wire:model="unit_uuid" id="unit_uuid" type="hidden" value="{{ $unit->uuid }}"
                            name="unit_uuid" readonly />

                        @error('unit_uuid')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <x-label>Period Covered</x-label>
                <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-1/2 px-3">
                        <x-label for="start">
                            Start
                        </x-label>
                        <x-form-input wire:model="start" id="grid-last-name" type="date"
                            value="{{ old('start', Carbon\Carbon::now()->startOfMonth()->format('Y-m-d')) }}"
                            name="start" />

                        @error('start')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <x-label for="end">
                            End
                        </x-label>
                        <x-form-input wire:model="end" id="grid-last-name" type="date"
                            value="{{ old('end', Carbon\Carbon::now()->addMonth()->endOfMonth()->format('Y-m-d')) }}"
                            name="end" />

                        @error('end')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                </div>

                <div class="mt-5 flex flex-wrap -mx-3 mb-6">

                    <div class="w-full md:w-full px-3">
                        <x-label for="bill">
                            Amount
                        </x-label>
                        <x-form-input wire:model="bill" id="grid-last-name" type="number" step="0.001"
                            value="{{ old('bill') }}" name="bill" min="0" />

                        @error('bill')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">

                    <p class="text-right">
                        <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                            href="/property/{{ Session::get('property') }}/tenant/{{ $tenant->uuid }}">
                            Finish
                        </a>
                        <x-form-button>Create</x-form-button>
                    </p>
                </div>
        </form>
    </div>
    </form>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <?php $ctr =1; ?>
        <thead class="bg-gray-50">
            <tr>
             
                <x-th> #</x-th>
                <x-th>Unit</x-th>
                <x-th>Particular</x-th>
                <x-th>Period</x-th>
                <x-th>Amount Due</x-th>

                <x-th>Amount Paid</x-th>
                <x-th>Balance</x-th>
                {{-- <x-th></x-th> --}}
            </tr>
        </thead>
        @forelse ($bills as $item)
        <tbody class="bg-white divide-y divide-gray-200">
            <tr>
               
                <x-td>{{ $item->bill_no }}</x-td>
                <x-td> <a href="/property/{{ Session::get('property') }}/unit/{{ $item->unit->uuid }}"><b
                            class="text-blue-600">{{ $item->unit->unit}} </b></a></x-td>
                <x-td>{{$item->particular->particular }}</x-td>
                <x-td>{{Carbon\Carbon::parse($item->start)->format('M d,
                    Y').'-'.Carbon\Carbon::parse($item->end)->format('M d, Y') }}</x-td>
                <x-td>{{number_format($item->bill,2) }}
                    @if($item->status === 'paid')
                    <span title="paid"
                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                        <i class="fa-solid fa-circle-check"></i>
                    </span>
                    @elseif($item->status === 'partially_paid')
                    <span title="partially_paid"
                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-clock"></i>
                    </span>
                    @else
                    <span title="unpaid"
                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                        <i class="fa-solid fa-circle-xmark"></i>
                    </span>
                    @endif

                    @if($item->description === 'movein charges' && $item->status==='unpaid')
                    <span title="urgent"
                        class="px-2 text-sm leading-5 font-semibold rounded-full bg-orange-100 text-orange-800">
                        <i class="fa-solid fa-bolt"></i>
                    </span>
                    @endif
                </x-td>
                <x-td>{{ number_format($item->initial_payment, 2) }}</x-td>
                <x-td>{{ number_format(($item->bill-$item->initial_payment), 2) }}</x-td>
                {{-- <x-td>
                    <form method="POST" action="/bill/{{ $item->id }}/delete">
                        @csrf
                        @method('delete')
                        <x-button onclick="confirmMessage()"><i class="fa-solid fa-trash-can"></i></x-button>
                    </form>
                </x-td> --}}

                @empty
                <x-td>
                    No data found!
                </x-td>
            </tr>
            @endforelse
            <tr>
                <x-td>Total</x-td>
                <x-td></x-td>
           
                <x-td></x-td>
                <x-td></x-td>
                <x-td>{{number_format($bills->sum('bill'),2) }}</x-td>
                <x-td>{{number_format($bills->sum('initial_payment'),2) }}</x-td>
                <x-td>{{number_format($bills->sum('bill') - $bills->sum('initial_payment') ,2)
                    }}</x-td>
            </tr>
        </tbody>
    </table>
    </div>
    @include('modals.create-particular-modal');
</x-new-layout>