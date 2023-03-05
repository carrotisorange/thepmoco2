<div>


    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">Calendar</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">


            </div>
        </div>


        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="inline-block min-w-full py-2 mt-5 align-middle md:px-6 lg:px-8">
                <div id="calendar">

                </div>

                <div class="mb-5 mt-2 relative overflow-hidden ring-black ring-opacity-5 md:rounded-lg">


                    <div class="mt-10 px-4 sm:px-6 lg:px-8">
                        <!-- Modal -->
                        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="/calendar" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Booking Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <select class="form-control" name="unit_uuid" id="unit_uuid">
                                                @foreach ($units as $unit )
                                                <option value="{{ $unit->uuid }}">{{ $unit->unit }} - {{
                                                    $unit->status->status }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="saveBtn" class="btn btn-primary">Book</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Modal -->
                        {{-- <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Booking title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" class="form-control" id="title">
                                        <span id="titleError" class="text-danger"></span>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>