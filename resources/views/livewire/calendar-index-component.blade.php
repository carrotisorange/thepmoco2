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
                                            <label for="">Guest</label>
                                            <input type="text" name="guest" class="form-control" required>
                                            <br>
                                            <label for="">Unit</label>
                                            <select class="form-control" name="unit_uuid" id="unit_uuid" required>
                                                <option value="">Select a unit</option>
                                                @foreach ($units as $unit )
                                                <option value="{{ $unit->uuid }}">{{ $unit->unit }} - {{
                                                    $unit->status->status }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <label for="">Start</label>
                                            <input type="date" name="movein_at" class="form-control" required>
                                            <br>
                                            <label for="">End</label>
                                            <input type="date" name="moveout_at" class="form-control" required>
                                            <br>

                                        
                                            {{-- <br>
                                            <label for="">Number of guests</label>
                                            <input type="number" min="1" name="no_of_guests" class="form-control">

                                            <br>
                                            <label for="">Vehicle Details</label>
                                            <input type="text" name="vehicle_details" class="form-control">

                                            <br>
                                            <label for="">Plate Number</label>
                                            <input type="text" name="plate_number" class="form-control"> --}}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>