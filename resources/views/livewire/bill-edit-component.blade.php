<div class="py-12">
    <div class="max-w-12xl mx-auto sm:px-6 lg:px-8">
        <div class="">
            Bills Count: <b> {{ $bills->count('bill')}}</b>, Bills Total: <b> {{
                number_format($bills->sum('bill'),2)}}</b>


        </div>
        <div class="mt-5">
            @if($selectedBills)
            <x-button onclick="confirmMessage()" wire:click="deleteBills()"><i class="fa-solid fa-trash"></i>&nbsp
                Remove ({{ count($selectedBills) }})
            </x-button>
        

       
            <x-button form="edit-form"><i class="fas fa-check-circle"></i>&nbsp Post ({{ $bills->count() }})</x-button>
            @endif

        </div>

        <div class="mt-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="bg-white border-b border-gray-200">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">

                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="p-4">
                                                <div class="flex items-center">
                                                    <x-input id="" wire:model="selectAll" type="checkbox" />
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Bill #
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Ref #
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Date Posted
                                            </th>
                                            <th colspan="2" scope="col" class="px-6 py-3">
                                                Period Covered (start-end)
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Particular
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Amount
                                            </th>

                                        </tr>
                                    </thead>
                                    <?php 
                                        $ctr = 1;
                                        $id = 1;
                                        $amount = 1;
                                        $particular_id =1;
                                        $start = 1;
                                        $end =1;
                                        $created_at = 1;                     
                                    ?>
                                    <form action="/bill/{{ Session::get('property') }}/customized/batch/{{ $batch_no }}"
                                        method="POST" id="edit-form">
                                        @csrf
                                        @method('PATCH')
                                    </form>
                                    @foreach ($bills as $bill)
                                    <tbody>
                                        <tr
                                            class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                                            <td class="p-4">
                                                <div class="flex items-center">
                                                    <x-input type="checkbox" wire:model="selectedBills"
                                                        value="{{ $bill->id }}" />
                                                </div>
                                            </td>
                                            <td class="px-4 py-4">
                                                {{ $bill->bill_no }}
                                            </td>

                                            <td class="px-4 py-4">
                                                {{ $bill->reference_no }}
                                            </td>

                                            <td class="px-4 py-4">
                                                <x-table-input form="edit-form" type="date"
                                                    name="created_at{{ $created_at++ }}" id="created_at"
                                                    value="{{ $bill->created_at }}" readonly />
                                            </td>

                                            <input form="edit-form" type="hidden" name="id{{ $id++ }}" id="id"
                                                value="{{ $bill->id }}">

                                            <td class="px-4 py-4">
                                                <x-table-input form="edit-form" name="start{{ $start++  }}" id="start"
                                                    type="date" value="{{ $bill->start }}" />
                                            </td>
                                            <td class="px-4 py-4">
                                                <x-table-input form="edit-form" name="end{{ $end++  }}" id="end"
                                                    type="date" value="{{ $bill->end }}" />
                                            </td>

                                            <td class="px-4 py-4">
                                                <x-table-select form="edit-form"
                                                    name="particular_id{{ $particular_id++  }}" id="particular_id">
                                                    <option value="{{ $bill->particular_id }}" {{
                                                        old('particular_id')==$bill->particular_id ? 'selected' :
                                                        'Select one' }} selected>{{ $bill->particular->particular }}
                                                    </option>
                                                </x-table-select>
                                            </td>
                                            <td class="px-4 py-4">
                                                <x-table-input form="edit-form" name="amount{{ $amount++  }}" id="bill"
                                                    type="number" value="{{ $bill->bill }}" />
                                            </td>
                                        </tr>
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