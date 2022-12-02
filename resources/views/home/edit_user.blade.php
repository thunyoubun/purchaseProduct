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
                    <h4>Edit & Update User
                        <a href="{{ url('dashboard') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-user/'.$users->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="string" name="name" value="{{$users->name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Role</label>
                            <select name="role" id="role" class="form-select" require="required">
                                <option value="admin">admin</option>
                                <option value="client">client</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="string" name="email" value="{{$users->email}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" require>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update User</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection