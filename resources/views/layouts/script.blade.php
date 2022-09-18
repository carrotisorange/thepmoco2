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

<script>
  window.addEventListener('closeModal', event => {
    $("#modalForm").modal('hide');
})
</script>

@livewire('livewire-ui-modal')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
      integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>

