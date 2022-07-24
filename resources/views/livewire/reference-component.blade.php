<div>
    <div class="p-8 bg-white border-b border-gray-200">
        <form method="POST" wire:submit.prevent="submitForm"
            action="/unit/{{ $unit->uuid }}/tenant/{{ $tenant->uuid }}/reference/{{ Str::random(10) }}/store"
            class="w-full" id="create-form">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3">
                    <x-label for="reference">
                        Full Name <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-input wire:model="reference" id="reference" type="text" name="reference"
                        value="{{ old('reference') }}" />

                    @error('reference')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <x-label form="relationship">
                        Relationship <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-select wire:model="relationship_id" id="grid-relationship_id" name="relationship_id">
                        <option value="">Select one</option>
                        @foreach ($relationships as $relationship)
                        <option value="{{ $relationship->id }}" {{ old('relationship_id')==$relationship->id?
                            'selected': 'Select one'
                            }}>{{ $relationship->relationship }}</option>
                        @endforeach
                    </x-form-select>
                    @error('relationship_id')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6 w-full md:w-1/2 px-3">
                    <x-label for="email">
                        Email
                    </x-label>
                    <x-form-input wire:model="email" id="grid-last-name" type="email" name="email"
                        value="{{ old('email') }}" />

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-6 w-full md:w-1/2 px-3">
                    <x-label for="mobile_number">
                        Mobile <span class="text-red-600">*</span>
                    </x-label>
                    <x-form-input wire:model="mobile_number" id="grid-last-name" type="number" name="mobile_number"
                        value="{{ old('mobile_number') }}" />

                    @error('mobile_number')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mt-5">
                <p class="text-right">
                    <x-form-button>
                        Create
                    </x-form-button>
                </p>
            </div>
        </form>
    </div>
    @if($references->count())
    <div class="mt-5 p-8 bg-white border-b border-gray-200">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="bg-gray-50">
                <tr>
                    <x-th>#</x-th>
                    <x-th>Full Name</x-th>
                    <x-th>Email</x-th>
                    <x-th>Mobile</x-th>
                    <x-th>Relationship</x-th>
                    <x-th></x-th>
                </tr>
            </thead>
            <?php $ctr = 1; ?>
            @forelse ($references as $item)
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <x-td>{{ $ctr++}}</x-td>
                    <x-td>{{ $item->reference }}</x-td>
                    <x-td>{{ $item->email }}</x-td>
                    <x-td>{{ $item->mobile_number }}</x-td>
                    <x-td>{{ $item->relationship->relationship }}</x-td>
                    <x-td>
                        <x-button wire:click="removeReference({{ $item->id }})" onclick="confirmMessage()">
                            Remove
                        </x-button>
                    </x-td>
                </tr>
                @empty
                <tr>
                    <x-td>No data found.</x-td>
                </tr>
            </tbody>
            @endforelse
        </table>
    </div>
    @endif
    @include('layouts.notifications')
</div>