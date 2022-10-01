@extends('layouts.app-master')
@section('content')


<div class=" bg-white">
    <div class="container p-4 bg-light h-100">

        <div class="d-flex justify-content-center flex-xl-row flex-column gap-sm-3 ">
            <div class=" border border-5 shadow d-flex justify-content-center   p-4">
                <img src="{{ asset('assets/products') }}/{{$products->image}}" class="img-responsive m-2 "
                    style=" max-height:500px; max-width:400px" />
            </div>
            <div class="h-100  border border-4  bg-white shadow-lg  p-4  " style="max-width: 700px;">
                <div class="container ">
                    <h4 class="mb-4">{{$products->name}}</h4>
                    <p class="text-primary fs-4 font-weight-bold">฿{{$products->price}}</p>
                    <div class="d-flex justify-content-start align-items-center">
                        <p class="fs-6 m-2">จำนวน</p>
                        <button
                            class="btn btn-outline-primary   p-2 d-flex justify-content-center text-center align-bottom"
                            style="height:fit-content">
                            <div class=" d-flex justify-content-center gap-2">
                                <a href="{{ route('remove.to.cart', $products->id) }}" class=" 
                                 text-decoration-none  fw-bold ml-1">
                                    <a>-</a>
                                </a>
                                <a class="fw-bold">1</a>
                                <a href="{{ route('add.to.cart', $products->id) }}" class=" 
                                 text-decoration-none fw-bold mr-1">
                                    <a>+</a>
                                </a>
                            </div>
                        </button>
                    </div>
                    <div class="d-flex mt-5">
                        <a href="{{ route('add.to.cart', $products->id) }}">
                            <button type="button" class="btn btn-outline-primary ">
                                <div class="d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-cart" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <span class="m-1">Add - ฿{{ $products->price }}</spaa>
                                </div>

                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white mt-4 ">
            <div class="container p-5 ">
                <div class="position-relative border-top border-bottom align-items-middle p-3   ">
                    <p class="w-100  text-center m-auto">
                        <a class="text-decoration-none col d-block fs-5 " data-bs-toggle="collapse"
                            href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="font-weight-bold">ข้อมูลสินค้า</span>
                            <span class=" font-weight-bold position-absolute end-0  ">+</span>
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="d-flex justify-content-center">
                            <div class="mt-2  text-center " style="max-width: 50%;">
                                {{$products->description}}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
    @endsection