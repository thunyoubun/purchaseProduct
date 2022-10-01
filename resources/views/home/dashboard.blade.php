@extends('layouts.app-master')
@section('content')
@auth
@if(auth()->user()->role == 'admin')
<div class="container ">

    <nav class="mt-4 d-flex justify-content-center">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active font-weight-bold " id="nav-user-tab" data-toggle="tab" href="#nav-user"
                role="tab" aria-controls="nav-user" aria-selected="true">User</a>
            <a class="nav-item nav-link font-weight-bold " id="nav-product-tab" data-toggle="tab" href="#nav-product"
                role="tab" aria-controls="nav-product" aria-selected="false">Product</a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade row m-2" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">
            <div class="col-md-12">
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
                                    <td>{{ $item->id }}</td>
                                    <td style="max-width:200px ;">{{ $item->name }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td><img src="{{ $item->image }}" style="max-width:100px ; max-height:200px" />
                                    </td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <a href="edit-product/{{$item->id}}" class="btn btn-success btn-sm">Edit</a>
                                    </td>
                                    <td><a href="{{ url('delete-product/'.$item->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a></td>
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
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>password</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="bg-white">
                                    <td>{{ $user->id }}</td>
                                    <td style="max-width:200px ;">{{ $user->role }}</td>
                                    <td style="max-width:200px ;">{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>

                                    <td>
                                        <a href="{{ url('edit-user/'.$user->id) }}"
                                            class="btn btn-success btn-sm">Edit</a>
                                    </td>
                                    <td><a href="{{ url('delete-user/'.$user->id) }}"
                                            class="btn btn-danger btn-sm">Delete</a></td>
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