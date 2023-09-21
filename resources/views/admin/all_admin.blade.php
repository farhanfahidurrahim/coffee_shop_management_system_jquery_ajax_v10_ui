@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">All Admins</h5>
                    <a href="{{ route('create.admin') }}" class="btn btn-primary mb-4 text-center float-right">Create
                        Admin</a><br>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" style="margin-bottom: 10px" onclick="addAdminForm()"
                        data-toggle="modal" data-target="#exampleModal">
                        Create Admin by Ajax
                    </button>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Admin Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="get-show-ajax-admin-data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form onsubmit="event.preventDefault();
                    if (isCreatingAdmin) {
                        submitCreateForm();
                    } else {
                        submitEditForm();
                    }"
                    enctype="multipart/form-data">
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button id="modalCloseBtn" type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        function addAdminForm() {
            isCreatingAdmin = true;
            const modalBody = document.getElementsByClassName('modal-body')[0];

            const adminForm =
            `
                <div class="form-outline mb-4 mt-4">
                    <input type="email" name="email" onchange="onChangeHandler(event)" id="form2Example1"
                        class="form-control" placeholder="Email" />
                </div>
                <div class="form-outline mb-4">
                    <input type="text" name="name" onchange="onChangeHandler(event)" id="form2Example2"
                        class="form-control" placeholder="Name" />
                </div>
                <div class="form-outline mb-4">
                    <input type="password" name="password" onchange="onChangeHandler(event)" id="form2Example3"
                        class="form-control" placeholder="Password" />
                </div>
            `

            modalBody.innerHTML = adminForm;
        }

        function handleEdit(obj) {
            isCreatingAdmin = false;
            const modalBody = document.getElementsByClassName('modal-body')[0];
            const editForm =
            `
                <div class="form-outline mb-4 mt-4">
                    <input type="email" name="email" onchange="onChangeEditHandler(event)" id="form2Example1"
                        class="form-control" placeholder="Email" value=` + `${obj?.email}` + `>
                </div>
                <div class="form-outline mb-4">
                    <input type="text" name="name" onchange="onChangeEditHandler(event)" id="form2Example2"
                        class="form-control" placeholder="Name" value=` + `${obj?.name}` + `/>
                </div>
            `

            modalBody.innerHTML = editForm;
        }

        // Edit Data by Ajax //
        // const editFormData = new FormData();

        // function onChangeEditHandler(event) {
        //     editFormData.append(event.currentTarget.name, event.currentTarget.value);
        // }

        // function submitEditForm() {
        //     const url = '{{ route('admin.update_ajax') }}';

        //     const options = {
        //         method: 'POST',
        //         body: editFormData,
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //         },
        //     };

        //     fetch(url, options)
        //         .then(function(data) {
        //             const closebtn = document.getElementById('modalCloseBtn');
        //             closebtn.click();
        //             getAllAdmin();
        //         })
        //         .catch(error => {
        //             console.error('API request error:', error);
        //         });
        // }

        function handleDelete(obj) {


        }

        // Get Data by Ajax //
        function tempalteAdminData(data) {
            const tbody = document.getElementById('get-show-ajax-admin-data');
            tbody.innerText = "";

            data?.forEach((element, ind) => {
                const tr = document.createElement('tr');

                const iter = document.createElement('td')
                const name = document.createElement('td');
                const email = document.createElement('td');
                const edit = document.createElement('button');
                const del = document.createElement('button');

                iter.innerText = ind + 1;
                name.innerText = element?.name;
                email.innerText = element?.email;
                del.innerText = "Delete";
                edit.innerText = "Edit";

                del.classList.add('btn', 'btn-danger');
                edit.classList.add('btn', 'btn-info');

                edit.dataset.toggle = "modal"
                edit.dataset.target = "#exampleModal"


                del.addEventListener('click', () => handleDelete(element));
                edit.addEventListener('click', () => handleEdit(element));

                tr.appendChild(iter);
                tr.appendChild(name);
                tr.appendChild(email);
                tr.appendChild(del);
                tr.appendChild(edit);

                tbody.appendChild(tr)
            })
        }

        function getAllAdmin() {
            const url = '{{ route('all.get_ajax_admin') }}';

            const options = {
                method: 'GET',
            };

            fetch(url, options)
                .then(res => res.json())
                .then(data => {
                    tempalteAdminData(data?.data);
                })
                .catch(error => {
                    console.error('API request error:', error);
                });
        }

        window.onload = getAllAdmin()

        // Store Data by Ajax //
        // const formData = new FormData();

        // function onChangeHandler(event) {
        //     formData.append(event.currentTarget.name, event.currentTarget.value);
        // }

        // function submitForm() {
        //     const url = '{{ route('admin.create_ajax') }}';

        //     const options = {
        //         method: 'POST',
        //         body: formData,
        //         headers: {
        //             'X-CSRF-TOKEN': '{{ csrf_token() }}',
        //         },
        //     };

        //     fetch(url, options)
        //         .then(function(data) {
        //             const closebtn = document.getElementById('modalCloseBtn');
        //             closebtn.click();
        //             getAllAdmin();
        //         })
        //         .catch(error => {
        //             console.error('API request error:', error);
        //         });
        // }






        // Store Data by Ajax for Create
const createFormData = new FormData();

function onChangeCreateHandler(event) {
    createFormData.append(event.currentTarget.name, event.currentTarget.value);
}

function submitCreateForm() {
    const url = '{{ route('admin.create_ajax') }}';

    const options = {
        method: 'POST',
        body: createFormData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
    };

    fetch(url, options)
        .then(function(data) {
            const closebtn = document.getElementById('modalCloseBtn');
            closebtn.click();
            getAllAdmin();
        })
        .catch(error => {
            console.error('API request error:', error);
        });
}

// Edit Data by Ajax

const editFormData = new FormData();

function onChangeEditHandler(event) {
    editFormData.append(event.currentTarget.name, event.currentTarget.value);
}

function submitEditForm() {
    const url = '{{ route('admin.update_ajax') }}';

    const options = {
        method: 'POST',
        body: editFormData,
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
    };

    fetch(url, options)
        .then(function(data) {
            const closebtn = document.getElementById('modalCloseBtn');
            closebtn.click();
            getAllAdmin();
        })
        .catch(error => {
            console.error('API request error:', error);
        });
}


    </script>
@endsection
