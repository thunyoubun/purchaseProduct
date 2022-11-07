@extends('layouts.app-master')
@section('content')
<style>
.select-c:hover {

    background-color: whitesmoke;

}
</style>

<div class=" bg-light vh-100">
    <div class="container ">
        <div class=" d-flex pt-5 gap-4">
            <div class="d-block bg-white rounded m-2 h-100 w-25">
                <div class=" container">
                    <div class="row gap-3 mt-3 mb-3 ">

                        <div class="select-c d-block p-2">
                            <a class="m-3  text-decoration-none text-primary" href=""><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-person-fill " viewBox="0 0 16 16">
                                    <path
                                        d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg><span class="ml-2 fs-6 font-weight-bold">บัญชีของฉัน</span></a>
                        </div>
                        <!-- <div class="select-c d-block p-2">
                            <a class="m-3  text-decoration-none text-primary" href=""><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-heart-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                </svg><span class="ml-2 fs-6 font-weight-bold">รายการโปรด</span></a>
                        </div> -->




                    </div>
                </div>
            </div>
            <div class="d-block bg-white rounded m-2" style="width: 100%;">
                <div class="container p-4 ">
                    <div>
                        <div class="d-flex justify-content-center ">
                            <h6 class="font-weight-bold m-3">ข้อมูลส่วนตัว</h6>
                        </div>
                        <div class="d-flex justify-content-start rounded border border-light">
                            <div class="container border border-5-light rounded ">
                                <div class="row">
                                    <div class="p-5">

                                        <div class="d-flex mb-3">
                                            <label class="fs-6 text-secondary"
                                                style="min-width: 86px; line-height: 20px;">
                                                ชื่อ :
                                            </label>
                                            <span class="fs-6 font-weight-bold"
                                                style="min-width: 86px; line-height: 20px;">{{$users->name === null ? "-" : $users->name}}</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <label class="fs-6 text-secondary"
                                                style="min-width: 86px; line-height: 20px;">
                                                E-mail :
                                            </label>
                                            <span class="fs-6 font-weight-bold"
                                                style="min-width: 86px; line-height: 20px;">{{$users->email}}</span>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <label class="fs-6 text-secondary"
                                                style="min-width: 86px; line-height: 20px;">
                                                เบอร์โทร :
                                            </label>
                                            <span class="fs-6 font-weight-bold"
                                                style="min-width: 86px; line-height: 20px;">{{$users->phone === null ? "-" : $users->phone}}</span>
                                        </div>
                                        <div class="d-flex ">
                                            <label class="fs-6 text-secondary"
                                                style="min-width: 86px; line-height: 20px;">
                                                ที่อยู่ :
                                            </label>
                                            <span class="fs-6 font-weight-bold"
                                                style="min-width: 86px; line-height: 20px;">{{$users->address === null ? "-" : $users->address}}</span>
                                        </div>
                                    </div>

                                    <!-- <a href="{{ url('edit-account/'.$users->id) }}" style="width: 100%;"
                                        class="bg-light p-4 text-decoration-none">

                                        <div class="d-flex text-primary font-weight-bold fs-6 text-decoration-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                fill="currentColor" class="bi bi-pencil-square mr-2"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg><span>แก้ไขข้อมูลส่วนตัว</span>
                                        </div>
                                    </a> -->

                                    <button type="button" class="btn bg-light p-4" data-toggle="modal"
                                        data-target="#exampleModalCenter" style="width: 100%;">
                                        <div class="container ">

                                            <div class="d-flex text-primary font-weight-bold fs-6 text-decoration-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                    fill="currentColor" class="bi bi-pencil-square mr-2"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                    <path fill-rule="evenodd"
                                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                </svg><span>แก้ไขข้อมูลส่วนตัว</span>
                                            </div>
                                        </div>

                                    </button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
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
                                                                            action="{{ url('update-account',$users->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('PUT')

                                                                            <div class="form-group mb-3">
                                                                                <label for="">Name</label>
                                                                                <input type="string" name="name"
                                                                                    value="{{$users->name}}"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="">Email</label>
                                                                                <input type="string" name="email"
                                                                                    value="{{$users->email}}"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="">Tel.</label>
                                                                                <input type="string" name="phone"
                                                                                    value="{{$users->phone}}"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="">Address</label>
                                                                                <input type="string" name="address"
                                                                                    value="{{$users->address}}"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group mb-3">
                                                                                <label for="">Password</label>
                                                                                <input type="password" name="password"
                                                                                    class="form-control" require>
                                                                            </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="form-group mb-3">
                                                        <button type="submit" class="btn btn-primary">Update
                                                        </button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class=" d-block">

                </div>
            </div>
        </div>
    </div>
    @endsection