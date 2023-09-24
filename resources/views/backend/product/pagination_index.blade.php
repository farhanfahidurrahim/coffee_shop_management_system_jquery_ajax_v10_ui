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
                    <a href="" class="btn btn-danger text-center deleteProduct"
                        data-id="{{ $data->id }}"
                        >Delete
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{!! $products->links() !!}
