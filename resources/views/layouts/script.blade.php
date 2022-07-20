<script src="https://unpkg.com/flowbite@1.3.4/dist/flowbite.js"></script>

@yield('scripts')

{{-- @include('layouts.messenger-chatbot') --}}

@include('layouts.notifications')

<script>
    function confirmMessage() {
      alert("Are you sure you want to perform this action?");
    }
</script>

@livewireScripts()

@livewire('livewire-ui-modal')

