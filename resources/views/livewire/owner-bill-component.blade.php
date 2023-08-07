<div>
    <div class="my-5 px-4 sm:px-6 lg:px-8">
        <div class="sm:grid grid-cols-1 lg:grid-cols-4 sm:items-center">

            <nav class="mt-5 border-b flex col-start-1" aria-label="Breadcrumb">
                <ol role="list" class="mx-auto flex w-full max-w-screen-xl space-x-4 px-4 sm:px-6">

                    <li class="flex">
                        <div class="flex items-center">
                            <button onclick="window.location.href='/property/{{ Session::get('property') }}/owner'"
                                class="text-lg font-medium text-gray-500 hover:text-gray-700" aria-current="page">
                                Owners</button>
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
                                onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner->uuid }}'"
                                class="ml-4 text-lg font-medium text-gray-500 hover:text-gray-700 ">
                                {{ $owner->owner }} </button>
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
                                onclick="window.location.href='/property/{{ Session::get('property') }}/owner/{{ $owner->uuid }}/bills'"
                                class="ml-4 text-lg font-bold text-gray-700 hover:text-gray-700" aria-current="page">
                                Bills</button>
                        </div>

                    </li>
                </ol>
            </nav>

            <div class="col-span-3 flex sm:justify-center lg:justify-end items-end">
                <div class="sm:my-10 md:my-5 lg:my-0">

                    @if($total_unpaid_bills->count())
                    <button type="button" data-modal-toggle="export-owner-bill"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Export
                        Bills ({{
                        App\Models\Owner::find($owner->uuid)->bills()->where('status', '!=','paid')->count()
                        }})</a></button>

                    <button type="button" data-modal-toggle="send-owner-bill"
                        class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">Send
                        Bills ({{ App\Models\Owner::find($owner->uuid)->bills()->where('status',
                        '!=', 'paid')->count() }})</a></button>
                    @endif


                    <button type="button" data-modal-toggle="create-owner-bill"
                        class="inline-flex items-end justify-end rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Create Bill</a></button>

                    <button type="button" data-modal-toggle="create-particular-modal"
                        class="inline-flex items-end justify-end rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:w-auto">
                        Create Particular</a></button>
                </div>
            </div>


        </div>
    </div>
    {{-- Reference # : <b> {{ $owner->bill_reference_no }}</b>, Security Deposit: <b> {{
        number_format(App\Models\Owner::find($owner->uuid)->wallets()->sum('amount'), 2) }}</b> --}}

    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                @if($bills)
                <label for="status" class="block text-sm font-medium text-gray-700">Filter status</label>
                <select wire:model.lazy="status" autocomplete="status"
                    class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="all" {{ $status=='' ? 'selected' : 'selected' }}> all </option>
                    <option value="paid" {{ $status=='paid' ? 'selected' : 'selected' }}> paid </option>
                    <option value="partially_paid" {{ $status=='partially_paid' ? 'selected' : 'selected' }}> partially paid
                    </option>
                    <option value="unpaid" {{ $status=='unpaid' ? 'selected' : 'selected' }}> unpaid </option>
        
                </select>
        
                @endif
        
            </div>
        
            <div class="sm:col-span-3">
                @if($bills)
                <label for="particular" class="block text-sm font-medium text-gray-700">Filter particulars</label>
                <select wire:model.lazy="particular" autocomplete="particular"
                    class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        
                    <option value="">Filter bill particulars</option>
                    @foreach ($particulars as $item)
                    <option value="{{ $item->particular_id }}">{{ $item->particular }}</option>
                    @endforeach
                </select>
        
                @endif
        
            </div>
        
        </div>

    <div class="mt-5">
        <div class="flex flex-row">
            <div class="basis-3/4">


                @if($total_unpaid_bills->sum('bill') && $selectedBills)
                <button type="button" wire:click="payBills"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Pay Bills
                </button>
               
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
            {{-- <div class="basis-1/4 ml-12 text-right">

                @if($selectedBills)
                <x-button
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    title="remove selected bills" onclick="confirmMessage()" wire:click="removeBills()">
                    Remove
                    bills ({{ count($selectedBills) }})
                </x-button>
                @endif

            </div> --}}
        </div>
    </div>
    {{-- {{ $bills->links() }} --}}
    <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="bg-white border-b border-gray-200">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            @include('tables.bills')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.notifications')
</div>