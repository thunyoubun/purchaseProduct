@extends('layouts.app-master')
@section('content')
@auth
@if(auth()->user()->role == 'admin')
<div class="container ">

    <nav class="mt-4 d-flex justify-content-start">
        <div class="nav nav-tabs ml-4 " id="nav-tab" role="tablist">
            <a class="nav-item nav-link active font-weight-bold " id="nav-user-tab" data-toggle="tab" href="#nav-user"
                role="tab" aria-controls="nav-user" aria-selected="true">User</a>
            <a class="nav-item nav-link font-weight-bold " id="nav-product-tab" data-toggle="tab" href="#nav-product"
                role="tab" aria-controls="nav-product" aria-selected="false">Product</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade row m-2 " id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">
            <div class=" col-md-12">
                <div class="card bg-light">
                    <div class="card-header">
                        <h4>Product
                            <a href="{{ url('add-product') }}" class="btn btn-primary float-end">Add Product</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Stock</th>
                                    <th>Price</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr class="bg-white">
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td style="max-width:200px ;  ">{{ $item->name }}</td>
                                    <td style="max-width:50px  ;  " class="text-center">
                                        {{ $item->ProductCategoryID == '1' ? "MG" : "LN"  }}
                                    </td>
                                    <td style="max-width:200px ; ;">{{ $item->title }}</td>
                                    <td>
                                        <div style=" max-height: 150px;max-width:400px;overflow: auto;">
                                            {{ $item->description }}
                                        </div>
                                    </td>
                                    <td><img src="{{ asset('assets/products') }}/{{$item->image}}"
                                            style="max-width:100px ; max-height:200px" />
                                    </td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <!-- <a href="{{url('edit-product/'. $item->id)}}"
                                            class="btn btn-success btn-sm"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="23" height="23" fill="currentColor" class="bi bi-pencil-square"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a> -->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#exampleModalCenter1">
                                            <div class="container ">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                        fill="currentColor" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </button>

                                        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-primary" id="exampleModalLongTitle">
                                                            Edit
                                                            Account</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">

                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    @if (session('status'))
                                                                    <h6 class="alert alert-success">
                                                                        {{ session('status') }}
                                                                    </h6>
                                                                    @endif

                                                                    <div class="">

                                                                        <div class="">

                                                                            <form
                                                                                action="{{ url('update-product/'.$item->id) }}"
                                                                                method="POST"
                                                                                enctype="multipart/form-data">
                                                                                @csrf
                                                                                @method('PUT')

                                                                                <div class="form-group mb-3">
                                                                                    <label for="">Name</label>
                                                                                    <input type="string" name="name"
                                                                                        value="{{$item->name}}"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="">Title</label>
                                                                                    <input type="string" name="title"
                                                                                        value="{{$item->title}}"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label
                                                                                        for="category">Category</label>
                                                                                    <select name="category"
                                                                                        class="form-select"
                                                                                        type="integer"
                                                                                        aria-label="Default select example"
                                                                                        placeholder="Select category...">
                                                                                        <option value="2">LN</option>
                                                                                        <option value="1">MG</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="">Description</label>
                                                                                    <input type="text"
                                                                                        name="description"
                                                                                        value="{{$item->description}}"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="">Image</label>
                                                                                    <input type="file" name="image"
                                                                                        class="form-control">

                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="">Stock</label>
                                                                                    <input type="integer" name="stock"
                                                                                        value="{{$item->stock}}"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="">Price</label>
                                                                                    <input type="decimal" name="price"
                                                                                        value="{{$item->price}}"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Update
                                                                                        Product</button>
                                                                                </div>

                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                    </td>
                                    <td>
                                        <form action="{{ url('delete-product/'.$item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                    fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                    <path
                                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                </svg></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <div class="tab-pane fade show active row m-2" id="nav-user" role="tabpanel" aria-labelledby="nav-user-tab">
            <div class="col-md-12">
                <div class="card bg-light">
                    <div class="card-header">
                        <h4>User

                        </h4>
                    </div>
                    <div class="card-body">


                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="bg-white">
                                    <td>{{ $user->id }}</td>
                                    <td style="max-width:200px ;">{{ $user->role }}</td>
                                    <td style="max-width:200px ;">{{ $user->name }}</td>
                                    <td style="max-width:200px ;">{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>


                                    <td>
                                        <!-- <a href="{{ url('edit-user/'.$user->id) }}" class="btn btn-success btn-sm"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg></a> -->
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#exampleModalCenter3">
                                            <div class="container ">
                                                <div>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                        fill="currentColor" class="bi bi-pencil-square"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd"
                                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </div>
                                            </div>

                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-primary" id="exampleModalLongTitle">
                                                            Edit
                                                            Account</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">

                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="col-md-12">

                                                                    @if (session('status'))
                                                                    <h6 class="alert alert-success">
                                                                        {{ session('status') }}
                                                                    </h6>
                                                                    @endif

                                                                    <div class="">

                                                                        <div class="">

                                                                            <form
                                                                                action="{{ url('update-user/'.$user->id) }}"
                                                                                method="POST">
                                                                                @csrf
                                                                                @method('PUT')

                                                                                <div class="form-group mb-3">
                                                                                    <label for="">Name</label>
                                                                                    <input type="string" name="name"
                                                                                        value="{{$user->name}}"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="role">Role</label>
                                                                                    <select name="role" id="role"
                                                                                        class="form-select"
                                                                                        require="required">
                                                                                        <option value="admin">admin
                                                                                        </option>
                                                                                        <option value="client">client
                                                                                        </option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="">Email</label>
                                                                                    <input type="string" name="email"
                                                                                        value="{{$user->email}}"
                                                                                        class="form-control">
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label for="">Password</label>
                                                                                    <input type="password"
                                                                                        name="password"
                                                                                        class="form-control" require>
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary">Update
                                                                                        User</button>
                                                                                </div>

                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                    </td>
                                    <td><a href="{{ url('delete-user/'.$user->id) }}" class="btn btn-danger btn-sm"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                            </svg></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endif

@endauth


@endsection