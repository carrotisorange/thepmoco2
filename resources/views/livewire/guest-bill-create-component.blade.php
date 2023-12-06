<div>
    <div class="my-5 px-4 sm:px-6 lg:px-8">
        <div class="sm:grid grid-cols-1 lg:grid-cols-4 sm:items-center">
            <nav class="mt-5 border-b flex col-start-1" aria-label="Breadcrumb">
                <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6">
                    <li class="flex">
                        <div class="flex items-center">
                            <button onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/guest'"
                                class="text-lg font-medium text-gray-500 hover:text-gray-700" aria-current="page">
                                Guests</button>
                        </div>
                    </li>
                    <li class="flex">
                        <div class="flex items-center">
                            <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44"
                                preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                            </svg>
                            <button
                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/guest/{{ $guest->uuid }}'"
                                class="ml-4 text-lg font-medium text-gray-500 hover:text-gray-700 ">
                                {{ $guest->guest }} </button>
                        </div>
                    </li>

                    <li class="flex">
                        <div class="flex items-center">
                            <svg class="h-full w-6 flex-shrink-0 text-gray-200" viewBox="0 0 24 44"
                                preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                aria-hidden="true">
                                <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                            </svg>
                            <button
                                onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/guest/{{ $guest->uuid }}/bills'"
                                class="ml-4 text-lg font-bold text-gray-700 hover:text-gray-700" aria-current="page">
                                Bills</button>
                        </div>

                    </li>
                </ol>
            </nav>

            <div class="col-span-3 flex sm:justify-center lg:justify-end items-end">
                <div class="group inline-block">
                    <x-button>Bill &nbsp; <i class="fa-solid fa-caret-down"></i></x-button>
                    <ul class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute  transition duration-150 ease-in-out origin-top min-w-32">
                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                            <a href="#/" data-modal-toggle="create-bill-modal"> Create</a>
                        </li>
                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                            <a href="#/" data-modal-toggle="export-guest-bill"> Export</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-3">
            @if($bills)
            <x-label for="status" >Filter status</x-label>
            <x-form-select wire:model="status" autocomplete="status">
                <option value="all" {{ $status=='' ? 'selected' : 'selected' }}> all </option>
                <option value="paid" {{ $status=='paid' ? 'selected' : 'selected' }}> paid </option>
                <option value="unpaid" {{ $status=='unpaid' ? 'selected' : 'selected' }}> unpaid </option>
            </x-form-select>
            @endif
        </div>

        <div class="sm:col-span-3">
            @if($bills)
            <x-label for="particular" >Filter particulars</x-label>
            <x-form-select wire:model="particular" autocomplete="particular">
                <option value="">Filter bill particulars</option>
                @foreach ($particulars as $item)
                <option value="{{ $item->particular_id }}">{{ $item->particular }}</option>
                @endforeach
            </x-form-select>
            @endif
        </div>
    </div>

    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-3">
            @if($selectedBills)
            <div class="mt-5">
                <span>You've selected <b>{{ count($selectedBills) }}</b> {{ Str::plural('bill',
                    count($selectedBills))}}
                    amounting to <b>{{ number_format($total, 2) }}</b></span>
            </div>
            @else
            <div class="mt-1">
                <b>Please check the bill you want to pay</b>
            </div>
            @endif
        </div>

        <div class="sm:col-span-3 text-right">
            @if($selectedBills)

                <x-button wire:click="payBills">
                    Pay Bills
                </x-button>

            @endif
        </div>

    </div>

    <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200">
            <div class="flex flex-col">
                <div class="-my-2 overflow-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @include('tables.bills')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.create-bill-modal')
    @include('modals.export-guest-bill')
    @include('modals.send-guest-bill')
    @livewire('particular-create-component')
</div>
