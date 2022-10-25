@extends('layouts.app-master')
@section('content')

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Add Student</h4>
                </div>

                <div class="card-body">


                    <form action="{{ url('add-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="string" name="name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="string" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlSelect1">Category</label>
                            <select name="category" class="form-select" aria-label="Default select example"
                                placeholder="Select category...">
                                <option value="2">LN</option>
                                <option value="1">MG</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" required class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Stock</label>
                            <input type="integer" name="stock" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price</label>
                            <input type="decimal" name="price" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection