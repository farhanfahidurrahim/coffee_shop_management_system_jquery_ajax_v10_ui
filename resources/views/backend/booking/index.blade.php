@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Orders</h5>

                    <div class="table-data">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Created_at</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $row)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $row->first_name }}</td>
                                    <td>{{ $row->last_name }}</td>
                                    <td>{{ $row->date }}</td>
                                    <td>{{ $row->time }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->message }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                        <input data-id="{{$row->id}}" class="toggleClass" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Complete" data-off="Processing" {{ $row->status ? 'checked' : '' }}>
                                    </td>
                                    <td><a href="" class="btn btn-danger text-center deleteOrder" data-id="{{ $row->id }}">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>

        //Change Status
        $(function(){
            $('.toggleClass').change(function(){
                var status = $(this).prop('checked') == true ? 1 : 0;
                var booking_id = $(this).data('id');

                $.ajax({
                    type: "GET",
                    url: '/admin/changeBookingStatus',
                    data:{
                        'status': status,
                        'booking_id': booking_id,
                    },
                    success: function(data){
                        Command: toastr["success"]("Change Done!", "Success")
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "100",
                            "hideDuration": "500",
                            "timeOut": "2500",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                    }
                })
            })
        })

        //Delete Product - Ajax
        $(document).on('click','.deleteOrder', function(e){
                e.preventDefault();
                let id = $(this).data('id')

                if (confirm("Are you sure to Delete??")) {
                    $.ajax({
                        url: "{{ url('/admin/booking-delete') }}/" + id,
                        method: 'POST',
                        success: function(res){
                            if (res.status == 'success') {
                                $('.table-data').load(location.href+' .table-data')
                                Command: toastr["error"]("Deleted Done!", "Success")
                                toastr.options = {
                                "closeButton": true,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": true,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "100",
                                "hideDuration": "500",
                                "timeOut": "2500",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                                }
                            }
                        }
                    })
                }
            })

    </script>
@endsection

