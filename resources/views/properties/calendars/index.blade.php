<x-new-layout>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/inter-ui/3.19.3/inter.css'>
    <link rel="stylesheet" href="./style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
 
    @section('title','Calendar | '. $property->property)
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('calendar-index-component', ['property' => $property])
        </div>
    </div>
</x-new-layout>

{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Calendar</title>

</head>

<body>


</body>

<style>
    table {
        font-family: "Inter", sans-serif;
    }

    table thead {
        top: 0;
        position: sticky;
    }

    table thead th:first-child {
        position: sticky;
        left: 0;
    }

    table tbody tr,
    table thead tr {
        position: relative;
    }

    table tbody th {
        position: sticky;
        left: 0;
    }
</style>

</html> --}}