@extends('layouts.app-master')
@section('content')


<div class="vh-100 bg-white">
    <div class="container p-4 bg-light">
        @foreach($products as $items)
        <div class="d-flex justify-content-center ">
            <div class=" border border-5 shadow-lg d-flex justify-content-center" style="width:50% ;">
                <img src="{{ $items->image }}" class="img-responsive m-2 rounded-2" />
            </div>
            <div class="ml-4 border border-4 rounded-4 bg-white shadow-lg  p-4" style="width: 50%;">
                <div class="container ">
                    <h4>{{$items->name}}</h4>
                    <p class="text-primary font-weight-bold">฿{{$items->price}}</p>
                    <div class="d-flex justify-content-start align-items-center">
                        <p class="fs-6 m-2">จำนวน</p>
                        <button
                            class="btn btn-outline-primary   p-2 d-flex justify-content-center text-center align-bottom"
                            style="height:fit-content">
                            <div class=" d-flex justify-content-center gap-2">
                                <a href="{{ route('remove.to.cart', $items->id) }}" class=" 
                                 text-decoration-none  fw-bold ml-1">
                                    <a>-</a>
                                </a>
                                <a class="fw-bold">1</a>
                                <a href="{{ route('add.to.cart', $items->id) }}" class=" 
                                 text-decoration-none fw-bold mr-1">
                                    <a>+</a>
                                </a>
                            </div>
                        </button>
                    </div>
                    <div class="d-flex mt-5">
                        <a href="{{ route('add.to.cart', $items->id) }}">
                            <button type="button" class="btn btn-outline-primary ">
                                <div class="d-flex align-items-center justify-content-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-cart" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg>
                                    <span class="m-1">Add -฿{{ $items->price }}</spaa>
                                </div>

                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

</div>
@endsection