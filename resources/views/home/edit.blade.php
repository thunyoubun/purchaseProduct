@extends('layouts.app-master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Product
                        <a href="{{ url('dashboard') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-product/'.$products->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="string" name="name" value="{{$products->name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="string" name="title" value="{{$products->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="category">Category</label>
                            <select name="category" class="form-select" type="integer"
                                aria-label="Default select example" placeholder="Select category...">
                                <option value="2">LN</option>
                                <option value="1">MG</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{$products->description}}"
                                class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">

                        </div>
                        <div class="form-group mb-3">
                            <label for="">Stock</label>
                            <input type="integer" name="stock" value="{{$products->stock}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price</label>
                            <input type="decimal" name="price" value="{{$products->price}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Product</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection