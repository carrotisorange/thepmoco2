<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500">Calendar</h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <button type="button"
                    onclick="window.location.href='/property/{{ Session::get('property_uuid') }}/guest'"
                    class="inline-flex items-center justify-center rounded-md border border-transparent bg-purple-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:w-auto">
                    View Guests in List
                </button>

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
                                {{-- <form action="" method="POST">
                                    @csrf --}}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Guest Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="property_uuid" id="property_uuid"
                                                value="{{ $property->uuid }}" class="form-control" required>


                                            <label for="">Agent</label>
                                            <select class="form-control" name="agent_id" id="agent_id">
                                                <option value="">Select an agent</option>
                                                @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->agent }} - {{
                                                    $agent->referral_code }}</option>
                                                @endforeach
                                            </select>
                                            <span id="agentIdError" class="text-danger text-sm"></span>
                                            <br>
                                            <label for="">Guest</label>
                                            <input type="text" name="guest" id="guest" class="form-control">
                                            <span id="guestError" class="text-danger text-sm"></span>
                                            <br>

                                            <label for="">Email</label>
                                            <input type="email" name="email" id="email" class="form-control">
                                            <span id="emailError" class="text-danger text-sm"></span>
                                            <br>

                                            <label for="">Mobile Number</label>
                                            <input type="text" name="mobile_number" id="mobile_number"
                                                class="form-control">
                                            <span id="mobileNumberError" class="text-danger text-sm"></span>
                                            <br>

                                            <label for="">Unit</label>
                                            <select class="form-control" name="unit_uuid" id="unit_uuid" required>
                                                <option value="">Select a unit</option>
                                                @foreach ($units as $unit )
                                                <option value="{{ $unit->uuid }}">{{ $unit->unit }} - {{
                                                    $unit->status->status }} - ₱ {{ number_format($unit->transient_rent,
                                                    2) }}/night</option>
                                                @endforeach
                                            </select>
                                            <span id="unitUuidError" class="text-danger text-sm"></span>
                                            <br>
                                            {{-- <label for="">Do you want to send welcome email to the guest?</label>
                                            <select class="form-control" name="is_send_email" id="is_send_email">
                                                <option value="no">no</option>
                                                <option value="yes">yes</option>
                                            </select> --}}

                                            {{-- <br>
                                            <label for="">Start</label>
                                            <input type="date" name="movein_at" id="movein_at" class="form-control"
                                                required>
                                            <span id="startError" class="text-danger"></span>
                                            <br>
                                            <label for="">End</label>
                                            <input type="date" name="moveout_at" id="moveout_at" class="form-control"
                                                required>
                                            <span id="endError" class="text-danger"></span>
                                            <br> --}}

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="saveBtn" class="btn btn-primary">Book</button>

                                        </div>
                                    </div>
                                    {{--
                                </form> --}}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>