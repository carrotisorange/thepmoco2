<div>

    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <h1 class="text-3xl font-bold text-gray-700 mb-5 mt-5 ">Request Account Payable</h1>
        </div>
        <button type="button" data-modal-toggle="create-biller-modal"
            class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">Add
            Biller</a></button>

        <button type="button" data-modal-toggle="create-particular-modal"
            class="ml-4 inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">Add
            Particular</a></button>
    </div>
    @include('forms.accountpayables.accountpayable-create')
    @include('modals.create-particular')
    @include('modals.create-biller')
</div>