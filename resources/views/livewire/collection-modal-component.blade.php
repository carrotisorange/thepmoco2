<x-modal>
    <form wire:submit.prevent="update">
        <x-slot name="title">
            Hello World
        </x-slot>

        <x-slot name="content">
            Hi! 👋 {{ $counter }}
        </x-slot>

        <x-slot name="buttons">
            <button type="submit">Start counting</button>
        </x-slot>
    </form>
</x-modal>