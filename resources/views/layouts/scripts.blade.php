{{-- @include('layouts.messenger-chatbot') --}}

{{-- @include('layouts.notifications') --}}

{{-- <script>
  function confirmMessage() {
      alert("Are you sure you want to perform this action?");
    }
</script> --}}

@livewireScripts()

{{-- <script>
  window.addEventListener('closeModal', event => {
    $("#modalForm").modal('hide');
})
</script> --}}

{{-- @livewire('livewire-ui-modal') --}}

<script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"
  integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script> --}}

@yield('scripts')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
  integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
