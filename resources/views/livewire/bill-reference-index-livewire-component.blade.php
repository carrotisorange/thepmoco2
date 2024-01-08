<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                  {{ $billTo }}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <div class="group inline-block">
                    <x-button>Bill &nbsp; <i class="fa-solid fa-caret-down"></i></x-button>
                    <ul
                        class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute  transition duration-150 ease-in-out origin-top min-w-32">
                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                            <a href="#/" data-modal-toggle="create-bill-livewire-component"> Create</a>
                        </li>
                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                            <a href="#/" data-modal-toggle="bill-export-component"> Export</a>
                        </li>
                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                            <a href="#/" data-modal-toggle="bill-send-component"> Send</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mt-3">
          <div>

            <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                <div class="sm:col-span-3">
                    @if($bills)
                    <x-label for="status">Filter status</x-label>
                    <x-form-select wire:model="billStatus" autocomplete="billStatus">
                        <option value="" {{ $billStatus=='' ? 'selected' : 'selected' }}> all </option>
                        <option value="paid" {{ $billStatus=='paid' ? 'selected' : 'selected' }}> paid </option>
                        <option value="unpaid" {{ $billStatus=='unpaid' ? 'selected' : 'selected' }}> unpaid </option>
                    </x-form-select>
                    @endif
                </div>

                <div class="sm:col-span-3">
                    @if($bills)
                    <x-label for="particular">Filter particulars</x-label>
                    <x-form-select wire:model="billParticularId" autocomplete="billParticularId">
                        <option value="">Filter bill particulars</option>
                        @foreach ($billParticulars as $item)
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
                    <x-button wire:click="submit">
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
                                    @include('features.bills.type.table')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @livewire('bill-create-livewire-component', ['type' => $type, 'uuid' => $uuid])
                                            @livewire('bill-export-component', ['type' => $type, 'uuid' => $uuid])
                                            @livewire('bill-send-component', ['type' => $type, 'uuid' => $uuid, 'email' => $email])
                                            @livewire('particular-create-livewire-component')
        </div>
    </div>
    </div>
</div>



