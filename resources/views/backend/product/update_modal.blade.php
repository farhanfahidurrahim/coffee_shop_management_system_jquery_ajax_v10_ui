    <!-- Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <form method="POST" action="" id="updateProductForm" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="update_id">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="errValidationMsgShow">

                        </div>

                        <div class="form-outline mb-2 mt-2">
                            <label for="name">Name</label>
                            <input type="text" name="update_name" id="update_name" class="form-control"
                                placeholder="Name" />

                        </div>
                        <div class="form-outline mb-2 mt-2">
                            <label for="name">Price</label>
                            <input type="text" name="update_price" id="update_price" class="form-control"
                                placeholder="Price" />

                        </div>
                        <div class="form-outline mb-2 mt-2">
                            <label for="name">Image</label>
                            <input type="file" name="image" id="image" class="form-control" />

                        </div>
                        <div class="form-group">
                            <label for="name">Description</label>
                            <textarea class="form-control" name="update_description" id="update_description" rows="2"></textarea>
                        </div>

                        <div class="form-outline mb-2 mt-2">

                            <select name="update_type" id="update_type" class="form-select  form-control"
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
                        <button type="button" class="btn btn-primary updateProduct">Update Product</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
