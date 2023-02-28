<div>
    <div class=" mt-5 px-4 sm:px-6 lg:px-8">

        {{-- start-step-1-form --}}
        <form class="space-y-6" wire:submit.prevent="submitForm()" method="POST">

            <div class="md:grid md:grid-cols-6 md:gap-6">
                <div class="sm:col-span-7">
                    <label for="" class="block text-sm font-medium text-gray-700"></label>

                </div>

                {{-- request for purchase --}}
                <div class="sm:col-span-6">
                    <label for="request_for" class="block text-sm font-medium text-gray-700">Request for: </label>
                    <select wire:model="request_for"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">

                        <option value="{{ $request_for }}">{{ $request_for }}</option>
                    </select>
                    @error('request_for')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- creation date --}}
                <div class="sm:col-span-2">
                    <label for="created_at" class="block text-sm font-medium text-gray-700">Request Date:</label>
                    <input type="date" wire:model="created_at" name="created_at"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('created_at')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="due_date" class="block text-sm font-medium text-gray-700">Due Date:</label>
                    <input type="date" wire:model="due_date" name="due_date"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                    @error('due_date')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{-- requester's name --}}
                <div class="sm:col-span-2">
                    <label for="requester" class="block text-sm font-medium text-gray-700">Requester's Name:</label>
                    <select id="requester_id" wire:model="requester_id"
                        class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block h-8 w-full sm:text-sm border border-gray-700  rounded-md">
                        <option value="{{ $requester_id }}">{{ auth()->user()->name }}</option>
                    </select>
                    @error('requester_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="sm:col-span-6">
                    <label for="particular" class="block text-sm font-medium text-gray-700"><b>Please add the
                            particulars</b></label>
                </div>

                <div class="sm:col-span-6">
                    <div class="flex justify-end">
                        <button type="button" wire:loading.remove wire:click="addNewParticular"
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                            New Particular
                        </button>
                        <button type="button" wire:loading disabled wire:target="addNewParticular" disabled
                            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                            Loading...
                        </button>
                    </div>
                    <div class="mb-5 mt-2 relative overflow-hidden ring-opacity-5 md:rounded-lg">

                        <form class="mt-5 sm:pb-6 xl:pb-8">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <x-th>#</x-th>
                                        <x-th>ITEM </x-th>
                                        <x-th>QUANTITY</x-th>
                                        @if($request_for === 'payment')
                                        <x-th>Price</x-th>
                                        <x-th>Total</x-th>
                                        {{-- <x-th>Upload file</x-th> --}}
                                        @endif
                                        <x-th></x-th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($particulars as $index => $particular)
                                    <div wire:key="particular-field-{{ $particular->id }}">
                                        <tr>
                                            <x-td>{{ $index+1 }}</x-td>
                                            <x-td>
                                                <input type="text" wire:model.debounce.500ms="particulars.{{ $index }}.item"
                                                    wire:keyup="updateParticular({{ $particular->id }})"
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                                @error('particulars.{{ $index }}.item')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>
                                            <x-td>
                                                <input type="number" wire:model.debounce.500ms="particulars.{{ $index }}.quantity"
                                                    wire:keyup="updateParticular({{ $particular->id }})"
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                                @error('particulars.{{ $index }}.quantity')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>
                                            @if($request_for === 'payment')
                                            <x-td>
                                                <input type="number" step="0.001"
                                                    wire:model.debounce.500ms="particulars.{{ $index }}.price"
                                                    wire:keyup="updateParticular({{ $particular->id }})"
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                                @error('particulars.{{ $index }}.price')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td>
                                            <x-td>
                                                <input type="number"
                                                    value="{{ $particular->quantity * $particular->price }}" readonly
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">

                                            </x-td>
                                            {{-- <x-td>
                                                <input type="file"
                                                    wire:model="particulars.{{ $index }}.price"
                                                    wire:keyup="updateParticular({{ $particular->id }})"
                                                    class="mt-4 shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full h-8 sm:text-sm border border-gray-700 rounded-md">
                                                @error('particulars.{{ $index }}.price')
                                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                                @enderror
                                            </x-td> --}}
                                             @endif
                                            <x-td>
                                                <button type="button"
                                                    wire:click="removeParticular({{ $particular->id }})"
                                                    wire:loading.remove wire:target="removeParticular"
                                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                                    Remove
                                                </button>
                                                <button type="button" wire:loading disabled
                                                    wire:target="removeParticular" wire:target="removeParticular"
                                                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                                                    Loading...
                                                </button>
                                                @include('layouts.notifications')
                                            </x-td>
                                        </tr>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>

                    </div>
                </div>


                <div class="col-start-6 flex items-center justify-end">
                    <button type="submit" wire:loading.remove wire:click="cancelRequest" wire:target="cancelRequest"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-red-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Cancel
                    </button>
                    <button type="submit" wire:loading wire:target="cancelRequest" disabled
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        Loading...
                    </button>
                    <button type="submit" wire:loading wire:target="submitForm" disabled
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        Loading...
                    </button>
                    <button type="submit" wire:loading.remove wire:target="submitForm"
                        class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">

                        Next
                    </button>
                </div>

            </div>
        </form>
        {{-- end-step-1-form --}}
    </div>
</div>