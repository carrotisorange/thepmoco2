<div>
    <div class="mt-10 px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-3xl font-bold text-gray-500" wire:ignore>
                    {{ucfirst(Route::current()->getName())}}
                </h1>
            </div>
            <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                <div class="group inline-block">
                    <x-button>Calendar &nbsp; <i class="fa-solid fa-caret-down"></i></x-button>
                    <ul
                        class="text-left z-50 bg-white border rounded-sm transform scale-0 group-hover:scale-100 absolute  transition duration-150 ease-in-out origin-top min-w-32">

                        <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
                            <a href="/property/{{ Session::get('property_uuid') }}/guest"
                                >View in List</a>
                        </li>

                    </ul>

                </div>
            </div>
        </div>
        <div class="-my-2 -mx-4 overflow-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 mt-5 align-middle md:px-6 lg:px-8">
                <div id="calendar"> </div>
                <div class="mb-5 mt-2 relative overflow-hidden ring-black ring-opacity-5 md:rounded-lg">
                    <div class="mt-10 px-4 sm:px-6 lg:px-8">
                        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Guest Information</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="property_uuid" id="property_uuid"
                                                value="{{ Session::get('property_uuid') }}" class="form-control"
                                                required>
                                            <x-label for="">Agent</x-label>
                                            <select class="form-control" name="agent_id" id="agent_id">
                                                <option value="">Select an agent</option>
                                                @foreach ($agents as $agent)
                                                <option value="{{ $agent->id }}">{{ $agent->agent }} - {{
                                                    $agent->referral_code }}</option>
                                                @endforeach
                                            </select>
                                            <span id="agentIdError" class="text-danger text-sm"></span>
                                            <br>
                                            <x-label for="">Guest</x-label>
                                            <input type="text" name="guest" id="guest" class="form-control">
                                            <span id="guestError" class="text-danger text-sm"></span>
                                            <br>

                                            <x-label for="">Email</x-label>
                                            <input type="email" name="email" id="email" class="form-control">
                                            <span id="emailError" class="text-danger text-sm"></span>
                                            <br>

                                            <x-label for="">Mobile Number</x-label>
                                            <input type="text" name="mobile_number" id="mobile_number"
                                                class="form-control">
                                            <span id="mobileNumberError" class="text-danger text-sm"></span>
                                            <br>

                                            <x-label for="">Unit</x-label>
                                            <select class="form-control" name="unit_uuid" id="unit_uuid" required>
                                                <option value="">Select a unit</option>
                                                @foreach ($units as $unit )
                                                <option value="{{ $unit->uuid }}">{{ $unit->unit }} - {{
                                                    $unit->status->status }} - ₱ {{ number_format($unit->transient_rent,
                                                    2) }}/night</option>
                                                @endforeach
                                            </select>
                                            <small>Only units with <b>daily</b> rent duration will show up here.</small>
                                            <br>
                                            <span id="unitUuidError" class="text-danger text-sm"></span>
                                            <br>
                                            <x-label for="">Number of guest</x-label>
                                            <input type="text" name="no_of_guests" id="no_of_guests" value="1"
                                                class="form-control">
                                            <span id="noOfGuestsError" class="text-danger text-sm"></span>
                                            <br>
                                            <x-label for="">Number of senior citizen</x-label>
                                            <input type="text" name="no_of_senior_citizens" id="no_of_senior_citizens"
                                                value="0" class="form-control">
                                            <span id="noOfCitizenError" class="text-danger text-sm"></span>
                                            <br>
                                            <x-label for="">Number of pwd</x-label>
                                            <input type="text" name="no_of_pwd" id="no_of_pwd" value="0"
                                                class="form-control">
                                            <span id="noOfPwdError" class="text-danger text-sm"></span>
                                            <br>
                                            <x-label for="">Number of < 7 years old</x-label>
                                                    <input type="text" name="no_of_children" id="no_of_children"
                                                        value="0" class="form-control">
                                                    <span id="noOfChildrenError" class="text-danger text-sm"></span>
                                                    <br>
                                                    <x-label for="">Remarks</x-label>
                                                    <input type="text" name="remarks" id="remarks" class="form-control">
                                                    <span id="remarkError" class="text-danger text-sm"></span>
                                        </div>
                                        <div class="modal-footer">
                                            <x-button class="bg-red-500" data-bs-dismiss="modal">Close</x-button>
                                            <x-button id="saveBtn">Book</x-button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
