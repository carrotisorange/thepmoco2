<div>
    <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">
        <div class="bg-gray-100 mt-5 px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-1 md:gap-6">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="grid grid-cols-2 gap-6">

                        <div class="col-span-6">
                            <label for="last-name" class="block text-sm font-medium text-gray-700">Please a deposit you
                                want to add</label>
                            <select wire:model="description" autocomplete="deposit_type"
                                class="mt-1 block w-full px-3 border border-gray-700 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option value="">Select one</option>
                                <option value="Security Deposit">Security Deposit</option>
                                <option value="Rent Deposit">Rent Deposit</option>

                            </select>
                            <x-validation-error-component name='description' />
                        </div>


                        <div class="col-span-2">
                            <label for="amount" class="block text-sm font-medium text-gray-700">Amount of the
                                deposit</label>
                            <input type="numnber" step="0.01" wire:model="amount" autocomplete="amount"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border border-gray-700 rounded-md">
                            <x-validation-error-component name='amount' />
                        </div>


                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-10">

                <button type="submit"
                    class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">


                    Save
                </button>
                <a class="whitespace-nowrap px-3 py-2 text-sm text-blue-500 text-decoration-line: underline"
                    href="/property/{{ Session::get('property_uuid') }}/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/bill/{{ Str::random(8) }}/create">
                    Next
                </a>
            </div>
        </div>
    </form>
    <div class="mb-10">
        @if($deposits->count())
        <table class="min-w-full table-fixed">
            <thead class="">
                <tr>
                    <th scope="col" class="relative w-12 px-5 sm:w-16 sm:px-8">
                    </th>
                    <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900"> #
                    </th>
                    <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                        DESCRIPTION</th>
                    <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                        AMOUNT</th>
                    <th scope="col" class="min-w-[12rem] py-3.5 pr-3 text-left text-sm font-semibold text-gray-900">
                    </th>
                </tr>
            </thead>
            @foreach ($deposits as $index => $item)
            <tbody class=" divide-gray-50 border divide-y gap-y-6 bg-white">
                <!-- Selected: "bg-gray-50" -->
                <tr>
                    <td class="relative w-12 px-6 sm:w-16 sm:px-8">
                        <!-- Selected row marker, only show when row is selected. -->
                        {{--
                        <input type="checkbox"
                            class="absolute left-4 top-1/2 -mt-2 h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500 sm:left-6">
                        --}}
                    </td>
                    <!-- Selected: "text-indigo-600", Not Selected: "text-gray-900" -->
                    <td class="whitespace-nowrap py-4 pr-3 text-sm font-medium text-gray-900">
                        {{ $index+1}}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {{ $item->description }}
                    </td>
                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        {{ $item->amount }}
                    </td>

                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <a class="whitespace-nowrap px-3 py-2 text-sm text-red-500 text-decoration-line: underline"
                            href="#/" wire:click='remove({{ $item->id }})'>
                            Remove
                        </a>
                    </td>

                </tr>

            </tbody>
            @endforeach
        </table>
        @endif
    </div>
</div>