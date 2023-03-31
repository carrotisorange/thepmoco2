<x-new-layout>
    @section('styles')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
            @livewire('calendar-index-component', ['property' => $property, 'events' => $events])
        </div>
    </div>

    @section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var booking = @json($events);
            $('#calendar').fullCalendar({
                header:{
                    left:'prev, next today',
                    center:'title',
                    right: 'month, agendaWeek, agendaDay'
                },
                events: booking,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays){
                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function(){
                        var guest = $('#guest').val();
                        var email = $('#email').val();
                        var mobile_number = $('#mobile_number').val();
                        var property_uuid = $('#property_uuid').val();
                        var unit_uuid = $('#unit_uuid').val();
                        var movein_at = moment(start).format('YYYY-MM-DD');
                        var moveout_at = moment(end).format('YYYY-MM-DD');
                        
                        $.ajax({
                            url:"{{ route('calendar.store') }}",
                            type:"POST",
                            dataType: 'json',
                            data:{
                                guest, email, mobile_number, movein_at, moveout_at, unit_uuid, property_uuid,
                            },
                            success:function(response){
                                $('#bookingModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent',{
                                    // 'id': response.event_id,
                                    'title':response.guest,
                                    'start':response.movein_at,
                                    'end':response.moveout_at,
                                    // 'color': response.color,
                                    // 'time': response.time
                                });

                                swal("Success!", "Guest Created!", "success");

                            },
                            error:function(error){
                                if(error.responseJSON.errors) {
                                    $('#guestError').html(error.responseJSON.errors.guest);
                                    $('#emailError').html(error.responseJSON.errors.email);
                                    $('#mobileNumberError').html(error.responseJSON.errors.mobile_number);
                                    $('#unitUuidError').html(error.responseJSON.errors.unit_uuid);
                                }
                            }
                        });
                    });


                },
                editable: true,
                eventDrop: function(event){
                    var id = event.id;
                    var movein_at = moment(event.start).format('YYYY-MM-DD');
                    var moveout_at = moment(event.end).format('YYYY-MM-DD');

                    $.ajax({
                            url:"{{ route('calendar.update', '') }}" + '/' + id,
                            type:"PATCH",
                            dataType: 'json',
                            data:{
                                movein_at, moveout_at
                            },
                            success:function(response){
                                swal("Success!", "Guest Updated!", "success");
                            },
                            error:function(error){
                                console.log(error)
                            }
                        });
                },
                // eventClick: function(event){
                //     var id = event.id;
                //         if(confirm('Are you sure want to remove it')){
                //             $.ajax({
                //                 url:"{{ route('calendar.destroy', '') }}" +'/'+ id,
                //                 type:"DELETE",
                //                 dataType:'json',
                //                 success:function(response)
                //                 {
                //                     console.log('asdasdad')
                //                     $('#calendar').fullCalendar('removeEvents', response);
                //                     swal("Success!", "Event Deleted!", "success");
                //                 },
                //                 error:function(error)
                //                 {
                //                     console.log(error)
                //                 }
                //             });
                //         }
                // }
            });
            $("#bookingModal").on("hidden.bs.modal", function(){
            $("#saveBtn").unbind();
            });
        });
    </script>
    @endsection

</x-new-layout>