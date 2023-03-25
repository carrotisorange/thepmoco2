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

    @section('scripts')
    <script type="text/javascript">
    console.log($events);
        $(document).ready(function() {
                                                          $.ajaxSetup({
                                                              headers: {
                                                                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                              }
                                                          });
                                              
                                                          $('#calendar').fullCalendar({
                                                         
                                                              header: {
                                                                  left: 'prev, next today',
                                                                  center: 'title',
                                                                  right: 'month, agendaWeek, agendaDay',
                                                              },
                                                            //   events: booking,

                                                              selectable: true,
                                                              selectHelper: true,
                                                              select: function(start, end, allDays) {
                                                                  $('#bookingModal').modal('toggle');
                                              
                                                                  $('#saveBtn').click(function() {
                                                                      var title = $('#title').val();
                                                                      var start_date = moment(start).format('YYYY-MM-DD');
                                                                      var end_date = moment(end).format('YYYY-MM-DD');
                                              
                                                                      $.ajax({
                                                                          type:"POST",
                                                                          dataType:'json',
                                                                          data:{ title, start_date, end_date  },
                                                                          success:function(response)
                                                                          {
                                                                              $('#bookingModal').modal('hide')
                                                                              $('#calendar').fullCalendar('renderEvent', {
                                                                                  'title': response.title,
                                                                                  'start' : response.start,
                                                                                  'end'  : response.end,
                                                                                  'color' : response.color
                                                                              });
                                              
                                                                          },
                                                                          error:function(error)
                                                                          {
                                                                              if(error.responseJSON.errors) {
                                                                                  $('#titleError').html(error.responseJSON.errors.title);
                                                                              }
                                                                          },
                                                                      });
                                                                  });
                                                              },
                                                              editable: true,
                                                              eventDrop: function(event) {
                                                                  var id = event.id;
                                                                  var start_date = moment(event.start).format('YYYY-MM-DD');
                                                                  var end_date = moment(event.end).format('YYYY-MM-DD');
                                              
                                                                  $.ajax({
                                                                        
                                                                          type:"PATCH",
                                                                          dataType:'json',
                                                                          data:{ start_date, end_date  },
                                                                          success:function(response)
                                                                          {
                                                                              swal("Good job!", "Event Updated!", "success");
                                                                          },
                                                                          error:function(error)
                                                                          {
                                                                              console.log(error)
                                                                          },
                                                                      });
                                                              },
                                                              eventClick: function(event){
                                                                  var id = event.id;
                                              
                                                                  if(confirm('Are you sure want to remove it')){
                                                                      $.ajax({
                                                                      
                                                                          type:"DELETE",
                                                                          dataType:'json',
                                                                          success:function(response)
                                                                          {
                                                                              $('#calendar').fullCalendar('removeEvents', response);
                                                                              // swal("Good job!", "Event Deleted!", "success");
                                                                          },
                                                                          error:function(error)
                                                                          {
                                                                              console.log(error)
                                                                          },
                                                                      });
                                                                  }
                                              
                                                              },
                                                              selectAllow: function(event)
                                                              {
                                                                  return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                                                              },
                                              
                                              
                                              
                                                          });
                                              
                                              
                                                          $("#bookingModal").on("hidden.bs.modal", function () {
                                                              $('#saveBtn').unbind();
                                                          });
                                              
                                                          $('.fc-event').css('font-size', '13px');
                                                          $('.fc-event').css('width', '20px');
                                                          $('.fc-event').css('border-radius', '50%');
                                              
                                              
                                                      });
    </script>
    @endsection


</div>