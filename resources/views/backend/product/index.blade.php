@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Product Index</h5>
                    {{-- <a href="create-products.html" class="btn btn-primary mb-4 text-center float-right">Create Product</a> --}}
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary mb-4 text-center float-end" data-bs-toggle="modal" data-bs-target="#addModal">
                        Create Product by Ajax
                    </button>

                    <div class="table-data">
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
                                        <td>
                                            <img src="{{ asset('uploads/products/'.$data->image) }}" width="75" height="50" alt="{{ $data->name }}">
                                        </td>
                                        <td>${{ $data->price }}</td>
                                        <td>{{ $data->type }}</td>
                                        <td>
                                            <a href=""
                                                class="btn btn-warning text-center editProduct"
                                                data-bs-toggle="modal" data-bs-target="#updateModal"
                                                data-id="{{ $data->id }}"
                                                data-name="{{ $data->name }}"
                                                data-price="{{ $data->price }}"
                                                data-description="{{ $data->description }}"
                                                data-type="{{ $data->type }}"
                                                >Edit
                                            </a>
                                            <a href="" class="btn btn-danger text-center deleteProduct" data-id="{{ $data->id }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $products->links() !!}
                    </div>
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
                        <img src="" width="200" height="100" class="image_preview">
                        <div class="form-outline mb-2 mt-2">
                            <label for="name">Image</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*"/>
                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea class="form-control" id="description" rows="2"></textarea>
                        </div>

                        <div class="form-outline mb-2 mt-2">

                            <select name="type" id="type" class="form-select  form-control"
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

    @include('backend.product.update_modal')

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        $(document).ready(function() {

            //todo:image preview
            $(document).on('change','#image', function() {
                $('.error_success_msg_container').html('');
                if (this.files && this.files[0]) {
                    let img = document.querySelector('.image_preview');
                    img.onload = () =>{
                        URL.revokeObjectURL(img.src);
                    }
                    img.src = URL.createObjectURL(this.files[0]);
                    document.querySelector(".image_preview").files = this.files;
                }
            });

            //Store Product - Ajax
            $(document).on('click', '.saveProduct', function(e) {
                e.preventDefault();
                let name = $('#name').val();
                let price = $('#price').val();
                let image = $('#image')[0].files[0];
                let description = $('#description').val();
                let type = $('#type').val();

                // console.log("Name: " + name);
                // console.log("Image: ", image);

                // Create a FormData object to send the file data
                let formData = new FormData();
                formData.append('name', name);
                formData.append('price', price);
                formData.append('image', image); // Append the file
                formData.append('description', description);
                formData.append('type', type);

                $.ajax({
                    url: "{{ route('product.store') }}",
                    method: 'POST',
                    data: formData,
                    processData: false, // Prevent jQuery from processing the data
                    contentType: false, // Set content type to false
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#addModal').modal('hide');
                            $('#addProductForm')[0].reset();
                            $('.table-data').load(location.href+' .table-data');
                            Command: toastr["success"]("Added Done!", "Success")
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
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value) {
                            $('.errValidationMsgShow').append(
                                '<span class="text-danger">' + value + '</span>' +
                                '<br>');
                        });
                    }
                });
            })

            //Show Product Value in Update Modal Form
            $(document).on('click','.editProduct',function(){
                let id = $(this).data('id');
                let name = $(this).data('name');
                // console.log(name);
                let price = $(this).data('price');
                let description = $(this).data('description');
                let type = $(this).data('type');

                $('#update_id').val(id);
                $('#update_name').val(name);
                $('#update_price').val(price);
                $('#update_description').val(description);
                $('#update_type').val(type);
            });

            //Update Porduct From Modal
            $(document).on('click','.updateProduct', function(e){
                e.preventDefault();
                let id = $('#update_id').val();
                let name = $('#update_name').val();
                let price = $('#update_price').val();
                let description = $('#update_description').val();
                let type = $('#update_type').val();
                //console.log(name+price);

                $.ajax({
                    url: "{{ url('/admin/product-update') }}/" + id,
                    method:'POST',
                    data:{
                        _method: 'POST',
                        name: name,
                        price: price,
                        description: description,
                        type: type,
                    },
                    success: function(res){
                        if (res.status == 'success') {
                            $('#updateModal').modal('hide');
                            $('.table').load(location.href+' .table')
                            Command: toastr["success"]("Updated Done!", "Success")
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
                    },
                    error: function(err){
                        let error = err.responseJSON;
                        $.each(error.errors, function(index, value){
                            $('.errValidationMsgShow').append(
                                '<span class="text-danger">' + value + '</span>' +
                                '<br>');
                        })

                    }
                })
            })

            //Delete Product - Ajax
            $(document).on('click','.deleteProduct', function(e){
                e.preventDefault();
                let id = $(this).data('id')

                if (confirm("Are you sure to Delete??")) {
                    $.ajax({
                        url: "{{ url('/admin/product-delete') }}/" + id,
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

            //Pagination Ajax
            $(document).on('click','.pagination a',function(e){
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1]
                product(page)
            })

            function product(page){
                $.ajax({
                    url:"/admin/product-pagination/paginate-data?page="+page,
                    success: function(res){
                        $('.table-data').html(res);
                    }
                })
            }

        });
    </script>
@endsection
