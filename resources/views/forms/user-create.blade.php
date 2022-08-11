<form method="POST" wire:submit.prevent="addUser" enctype="multipart/form-data" class="w-full" id="create-form">
    @csrf
    <div class="flex flex-wrap mb-6">
        <div class="w-full md:w-full ">
            <x-label for="role_id" :value="__('User role')" />

            <x-form-select wire:model="role_id" form="create-form" name="role_id" id="role_id" autofocus>
                <option value="">Select one</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id')==$role->id?
                    'selected': 'Select one'
                    }}>{{ $role->role }} - {{ $role->description }}</option>
                @endforeach
            </x-form-select>

            @error('role_id')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>

    @if($role_id)
    <div class="flex flex-wrap mb-6">
        <div class="w-full md:w-full ">
            <x-label for="email" :value="__('Email')" />

            <x-form-input wire:model.lazy="email" form="create-form" id="email" type="email" name="email"
                :value="old('email')" autofocus />

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="mt-4">
        <p class="text-right">
            <x-form-button>Create</x-form-button>
        </p>
    </div>
    @endif
</form>