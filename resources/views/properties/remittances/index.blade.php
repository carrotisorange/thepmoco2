<x-new-layout>
    <style>
    * {
        margin: 0px;
        padding: 0;

    }


    .heading {
        display: flex;



    }

    h1 {
        background: transparent;
        padding: 7px;

    }


    .outer-wrapper {
        margin: 2px;
        margin-left: 0px;
        margin-right: 0px;
        max-width: fit-content;
        max-height: fit-content;


    }

    .table-wrapper {

        overflow-y: scroll;
        overflow-x: scroll;
        height: fit-content;
        max-height: 66.4vh;
        margin-top: 22px;
        margin: 15px;
        padding-bottom: 20px;

    }


    table {

        min-width: max-content;
        border-collapse: separate;
        border-spacing: 0px;

    }



    table th {
        position: sticky;
        top: 0px;
        background-color: #e3e3e3;
        color: #2e2e2e;
        text-align: center;
        font-weight: light;
        font-size: 12px;
        outline: 0.7px;
        border: 1.5px solid gray;

    }



    table th,
    table td {

        padding: 15px;
        padding-top: 10px;
        padding-bottom: 10px;

    }

    table td {
        text-align: left;
        font-size: 12px;
        border: 1px solid rgb(177, 177, 177);
        padding-left: 20px;

    }

    .first-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 0px;
    }

    .second-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 100px;
    }

    .third-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 200px;
    }

    .fourth-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 300px;
    }

    .fifth-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 400px;
    }

    .sixth-col {
        width: 100px;
        min-width: 100px;
        max-width: 100px;
        left: 500px;
    }

    .sticky-col {
        position: -webkit-sticky;
        position: sticky;
        background-color: white;
    }
</style>

   @section('title', 'Remittances | '. Session::get('property_name'))
    <div class="px-4 sm:px-6 lg:px-8 pt-10">
        @livewire('remittance-index-component',['property' => $property])
    </div>

</x-new-layout>