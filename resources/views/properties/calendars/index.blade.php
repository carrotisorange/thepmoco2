<x-new-layout>

    @section('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @endsection

    @section('title','Calendar | '. $property->property)
    <div class="mt-8">
        <div class="max-full mx-auto sm:px-6">
            @livewire('calendar-index-component', ['property' => $property])
        </div>
    </div>

    @section('scripts')
    <script>
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
                                                      // events: booking,
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


</x-new-layout>