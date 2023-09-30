@extends('layouts.app')
@section('content')
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                {{-- Session Notification  --}}
                @if (Session::has('success'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
                @endif
                <div class="col-md-12 ftco-animate">
                    <div class="">
                        <table class="table-dark" style="width: 1100px">
                            <thead style="background-color: #c49b63; height: 60px">
                                <tr class="text-center">
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Write Review</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($bookings->count() > 0)
                                    @foreach ($bookings as $booking)
                                        <tr class="text-center">
                                            <td>{{ $booking->first_name }}</td>
                                            <td>{{ $booking->last_name }}</td>
                                            <td>{{ $booking->date }}</td>
                                            <td>{{ $booking->time }}</td>
                                            <td>{{ $booking->phone }}</td>
                                            <td>{{ $booking->message }}</td>
                                            <td>{{ $booking->status }}</td>
                                            <td>
                                                @if ($booking->status == 'booked')
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#addReview">
                                                        Write Review
                                                    </button>
                                                @else
                                                    <h5>wait for booked!</h5>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <p class="alert alert-danger">You have No Table Booking!</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="addReview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form method="POST" action="">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Write Review</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Type Review</label>
                            <textarea name="message" id="message" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary saveReview">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> --}}
    <button id="testButton">Test Button</button>

    <script>
        $(document).ready(function(){
        $('#testButton').on('click', function() {
            alert("Test button clicked!");
        });
    });

    </script>


    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>

    <script>

        $(document).ready(function(){
            $(document).on('click', '.saveReview', function(e){
                e.preventDefault();
                let review = $('#message').val();
                //console.log(review);
                // alert("Save Changes button clicked! Review: " + review);

                let formData = new FormData();
                formData.append('review', review);

                $.ajax({
                    url: "{{ route('review.store') }}",
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        console.log(res);
                    },
                    error: function(err){
                        console.error(err);
                    }
                })
            });
        })
    </script>

@endsection
