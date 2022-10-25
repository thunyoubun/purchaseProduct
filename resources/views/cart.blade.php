@extends('layouts.app-master')
@section('content')

<div class=" bg-white">
    @auth
    <div class="container p-4">
        <div class="">
            <p class="fs-5 fw-bold">ตะกร้าสินค้า</p>
        </div>
        <div class="d-flex flex-column  ">
            @php $total = 0 @endphp
            @foreach( $carts as $cart )
            @php $total += $cart->price*$cart->quantity @endphp
            <div class="d-flex justify-content-between">
                <div class="d-flex">
                    <img src="{{ asset('assets/products') }}/{{$cart->image}}" width="143" height="200"
                        class="img-responsive m-2 rounded-2" />
                    <div class="d-block m-2  position-relative">
                        <p class=" fs-6 fw-bold">{{ $cart->name }}</p>
                        <button
                            class="btn btn-outline-secondary position-absolute bottom-0 start-0 p-2 d-flex justify-content-center text-center align-bottom"
                            style="height:fit-content">
                            <div class=" d-flex gap-4">
                                <a href="{{ route('remove.item', $cart->id) }}" class=" 
                                 text-decoration-none fw-bold mr-1">-</a>
                                <a class="fw-bold">{{ $cart->quantity }}</a>
                                <a href="{{ route('add.item', $cart->id) }}" class=" 
                                 text-decoration-none fw-bold mr-1">+</a>
                            </div>
                        </button>


                    </div>
                </div>

                <div class="d-block m-2  " style="width:10% ;">
                    <div class="d-flex justify-content-center x ">
                        <p class="fs-5 fw-bold text-primary">฿{{ $cart->price * $cart->quantity }}</p>
                    </div>
                    <div class="d-flex justify-content-center align-items-center  ">

                        <form action="{{ url('remove-from-cart/'.$cart->id) }}" method="POST">

                            <button class="btn btn-outline-danger ">
                                @csrf
                                @method('DELETE')
                                <i class="fa fa-trash-o">
                                    ลบ</i></button>
                        </form>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <div class="">
            <div class="">
                <p class="fs-5 fw-bold">สรุปคำสั่งซื้อ</p>
            </div>
            <div>

                <div class=" d-flex justify-content-between ">
                    <p class="text-left fs-5 fw-bold text-secondary">
                        ราคาสุทธิ
                    </p>
                    <p class=" fs-3 fw-bold text-success"> ฿{{ $total }} </p>

                </div>
                <div>
                    <div class="text-right">
                        <a href="{{ url('/') }}" class="btn btn-outline-primary"><i class="fa fa-angle-left"></i>
                            กลับไปช้อปต่อ</a>
                        <button class="btn btn-outline-success px-5 ">สั่งซื้อ</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endauth
</div>

@endsection