@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Foods</h5>
                    {{-- <a href="create-products.html" class="btn btn-primary mb-4 text-center float-right">Create Product</a> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-4 text-center float-end" data-bs-toggle="modal" data-bs-target="#addModal">
                        Create Product by Ajax
                    </button>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key=>$data )
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td>image</td>
                                    <td>${{ $data->price }}</td>
                                    <td>{{ $data->type }}</td>
                                    <td><a href="delete-products.html" class="btn btn-danger  text-center ">delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <form method="POST" action="" id="addProductForm" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="errValidationMsgShow">

                        </div>

                        <div class="form-outline mb-2 mt-2">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" />

                        </div>
                        <div class="form-outline mb-2 mt-2">
                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" />

                        </div>
                        <div class="form-outline mb-2 mt-2">
                            <label for="name">Image</label>
                            <input type="file" name="image" id="image" class="form-control" />

                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea class="form-control" id="description" rows="2"></textarea>
                        </div>

                        <div class="form-outline mb-2 mt-2">

                            <select name="price" id="type" class="form-select  form-control"
                                aria-label="Default select example">
                                <option selected disabled>Choose Type</option>
                                <option value="drink">Drink</option>
                                <option value="dessert">Dessert</option>
                            </select>
                        </div>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary saveProduct">Save Product</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.saveProduct', function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let price = $('#price').val();
                let description = $('#description').val();
                let type = $('#type').val();
                // console.log(name+price);

                $.ajax({
                    url: "{{ route('product.store') }}",
                    method: 'POST',
                    data: {
                        name: name,
                        price: price,
                        description: description,
                        type: type
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#addModal').modal('hide');
                            $('#addProductForm')[0].reset();
                            $('.table').load(location.href+' .table');
                        }
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $('.errValidationMsgShow').append(
                                '<span class="text-danger">' + value + '</span>' +
                                '<br>');
                        });
                    }
                })
            })
        });
    </script>
@endsection
