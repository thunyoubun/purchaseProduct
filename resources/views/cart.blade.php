@extends('layouts.app-master')
@section('content')
<!-- <table>
    @auth
    <thead>
        <tr>
            <th style="width:10%">Product</th>
            <th style="width:20%">Name</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @foreach( $carts as $cart )
        <tr>
            @php $total += $cart->price*$cart->quantity @endphp
            <td>
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img src="{{ $cart->image }}" width="100" height="100"
                            class="img-responsive" /></div>
                    <div class="col-sm-9">
                    </div>
                </div>
            </td>
            <td>{{ $cart->name }}</td>
            <td class="inner-table">{{ $cart->price }}</td>
            <td class="inner-table">{{ $cart->quantity }}
            <td data-th="Subtotal" class="text-center">{{$cart->price*$cart->quantity}}</td>
            <td>
                <form action="{{ url('remove-from-cart/'.$cart->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa fa-trash-o"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
                <h3><strong>Total {{ $total }}
                        <h3><strong>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                <button class="btn btn-success">Checkout</button>
            </td>
        </tr>
    </tfoot>
    @endauth
</table> -->
<div class="vh-100 bg-white">
    <div class="container p-4">
        <div class="">
            <p class="fs-5 fw-bold">ตะกร้าสิ้นค้า</p>
        </div>
        <div class="d-flex flex-column  ">
            @foreach( $carts as $cart )
            <div class="d-flex">
                <img src="{{ $cart->image }}" width="143" height="200" class="img-responsive m-2 rounded-2" />
                <div class="d-block m-2  position-relative" style="width:50% ;">
                    <p class="fs-6  fw-bold">{{ $cart->name }}</p>
                    <button
                        class="btn btn-outline-secondary position-absolute bottom-0 start-0 p-2 d-flex justify-content-center text-center align-bottom"
                        style="height:fit-content">
                        <div class=" d-flex gap-4">
                            <a href="{{ route('remove.to.cart', $cart->id) }}" class=" 
                             text-decoration-none fw-bold mr-1">-</a>
                            <a class="fw-bold">{{ $cart->quantity }}</a>
                            <a href="{{ route('add.to.cart', $cart->id) }}" class=" 
                             text-decoration-none fw-bold mr-1">+</a>
                        </div>
                    </button>

                </div>

                <div class="d-block m-2  " style="width:10% ;">
                    <div class="d-flex justify-content-center align-items-center ">
                        <p class="fs-5 fw-bold text-primary">฿{{ $cart->price }}</p>
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
                    <p class=" fs-3 fw-bold text-secondary"> ฿{{ $total }} </p>

                </div>
                <div>
                    <div class="text-right">
                        <a href="{{ url('/') }}" class="btn btn-outline-primary"><i class="fa fa-angle-left"></i>
                            กลับไปช้อปต่อ</a>
                        <button class="btn btn-outline-success">สั่งซื้อ</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection