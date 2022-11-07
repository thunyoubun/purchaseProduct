@extends('layouts.app-master')
@section('content')
<style>
.btn-cart {
    background-color: deepskyblue;
    border-style: solid;
    border-width: 1px;
    border-color: royalblue;
    border-radius: 5px;
}

.fav {

    position: absolute;
    top: 6%;
    right: 5%;
    background-color: grey;
    color: white;
    border-style: solid;
    border-width: 5px;
    border-color: grey;
    z-index: 15;

}

.fav:hover {
    color: crimson;
    border-color: white;
    background-color: white;
}

.tile-name {
    color: black;
}

.tile-name:hover {
    color: dodgerblue;
}

.cardt {

    width: fit-content;
    height: fit-content;
    display: grid;
    grid-template-rows: minmax(100%, 1fr);
    grid-template-areas: "stack";
    overflow: hidden;
}

.cardt>img,
.cardt>figcaption {
    grid-area: stack;
}

.cardt>figcaption {
    border: none;
    grid-area: stack;
    background-color: white;

    /* transform: translateZ(calc(100% - 0rem)); */

    opacity: 0%;
    transition: ease-in-out 0.5s;
    text-align: center;
    display: flex;
    justify-content: center;
    align-content: center;
}


.cardt:hover figcaption {
    opacity: 100%;
    text-align: center;
}
</style>


<div class="bg-light ">

    <div class="">
        <div class="bg-dark shadow-lg mt-0">
            <div class="container">
                <!--Corussal-->
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade d-flex justify-content-center "
                    data-ride="carousel" style="max-height: 500px; z-index:5">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="assets/carousel/aria.jpg" class="d-block w-100" alt="aria">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/carousel/solo.jpg" class="d-block w-100" alt="solo">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/carousel/Release.jpg" class="d-block w-100" alt="july">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/carousel/Gimai_EC.jpg" class="d-block w-100" alt="gimai">
                        </div>
                        <div class="carousel-item">
                            <img src="assets/carousel/Mamahaha_EC.jpg" class="d-block w-100" alt="mam">
                        </div>
                    </div>
                    <a class="carousel-control-prev " href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon  border border-5 border-dark bg-dark rounded-circle "
                            aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon border border-5 border-dark bg-dark rounded-circle"
                            aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <!--hits-->

        <div class="bg-white shadow-lg mt-3 mb-3">
            <div class="container p-4 ">
                <a href="{{route('product')}}" class="text-primary text-decoration-none d-flex justify-content-center ">
                    <p class="fs-5 font-weight-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                            class="bi bi-columns-gap" viewBox="0 0 16 16">
                            <path
                                d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                        </svg>
                        ซีรีย์ยอดฮิตติดอันดับ

                    </p>
                </a>
                <div id="carouselExampleFade1" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner  d-flex">
                        <!--1-->
                        <div class="carousel-item active d-flex justify-content-center text-center bg-white gap-3  ">
                            <a href="" class=" text-decoration-none text-dark " alt="">
                                <img src="/assets/hits/_LN_Ousama_KV_1_.jpg"
                                    class="d-block items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">สาบานรักราชันจอมเวท - Ousama
                                    no Propose</p>
                            </a>
                            <a href="" class="items text-decoration-none text-dark d-block " alt="">
                                <img src="assets/hits/_LN_Rokudenashi_KV.jpg" class="items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">
                                    อาจารย์เวทมนตร์ไม่เอาไหนกับตำนานปราสาทลอยฟ้า</p>
                            </a>
                            <a href="" class="items text-decoration-none text-dark d-block " alt="">
                                <img src="assets/hits/_LN_Shijo_Saikyou_KV_1_.jpg"
                                    class="items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">
                                    ชีวิตใหม่ไม่ธรรมดาของราชาปีศาจขี้เหงา</p>
                            </a>
                            <a href="" class="items text-decoration-none text-dark d-block " alt="">
                                <img src="assets/hits/_LN_Seijo_KV_4.jpg" class="items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">
                                    สตรีศักดิ์สิทธิ์อิทธิฤทธิ์สารพัดอย่าง</p>
                            </a>
                            <a href="" class="items text-decoration-none text-dark d-block " alt="">
                                <img src="assets/hits/_LN_Maou_KV.jpg" class="items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">
                                    ใครว่าข้าไม่เหมาะเป็นจอมมาร</p>
                            </a>
                        </div>
                        <!--2-->
                        <div class="carousel-item active d-flex justify-content-center text-center bg-white gap-3">
                            <a href="" class="items text-decoration-none text-dark d-block  " alt="">
                                <img src="assets/hits/_M_Fufuijo_KV_1_.jpg" class="items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">แผนสมรสไม่สมเลิฟ - Fufuijo
                                    Koibito miman</p>
                            </a>
                            <a href="" class="items text-decoration-none text-dark d-block " alt="">
                                <img src="assets/hits/_LN_Spy_KV_1_.jpg" class="items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">ห้องเรียนจารชน - Spy
                                    Classroom
                                </p>
                            </a>
                            <a href="" class="items text-decoration-none text-dark d-block " alt="">
                                <img src="assets/hits/_M_Kuroiwa_Medaka_KV.jpg" class="items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">คุโรอิวะ เมดากะ
                                    ไม่เข้าใจความน่ารักของฉันเลย - Kuroiwa Medaka</p>
                            </a>
                            <a href="" class="items text-decoration-none text-dark d-block " alt="">
                                <img src="assets/hits/Tokidoki_Russia_KV.jpg" class="items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">คุณอาเรียโต๊ะข้างๆ
                                    พูดรัสเซียหวานใส่ซะหัวใจจะวาย</p>
                            </a>
                            <a href="" class="items text-decoration-none text-dark d-block " alt="">
                                <img src="assets/hits/_M_Akuyaku_Lastboss_KV.jpg"
                                    class="items border rounded-circle m-3">
                                <p class="text-wrap font-weight-bold" style="width:200px ;">เป็นนางร้ายมันเสี่ยง
                                    เลยขอเลี้ยงลาสต์บอสดูสักตั้ง - Akuyaku Reijou Last Boss</p>
                            </a>
                        </div>

                    </div>

                    <button class="carousel-control-prev" style="width:100px" type="button"
                        data-bs-target="#carouselExampleFade1" data-bs-slide="prev">
                        <span
                            class="carousel-control-prev-icon shadow-lg border border-5 border-dark bg-dark rounded-circle"
                            aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" style="width:100px" type="button"
                        data-bs-target="#carouselExampleFade1" data-bs-slide="next">
                        <span
                            class="carousel-control-next-icon shadow-lg border border-5 border-dark bg-dark rounded-circle"
                            aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <!--LN-News-->

        <div class="container bg-white shadow-lg mt-3 mb-3">
            <div class="container p-4">
                <a href="{{route('product')}}" class="text-primary text-decoration-none d-flex justify-content-center ">
                    <p class="fs-5 font-weight-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                            class="bi bi-columns-gap" viewBox="0 0 16 16">
                            <path
                                d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                        </svg>
                        Light Novel แนะนำ
                    </p>
                </a>
                <div id="carouselExampleFade2" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner  d-flex">
                        <!--1-->

                        <!-- @php $total = 0
                        @endphp
                        @foreach( $products as $product )
                        @php $total += 1
                        @endphp
                        @endforeach -->

                        <div class="carousel-item active d-flex justify-content-center text-center bg-white gap-3 ">
                            @foreach($products as $product)
                            @if($product->id <= 15 && $product->id > 10 && $product->ProductCategoryID == 2) <div
                                    class=" position-relative h-100  " style="width: 202px;">
                                    <div class="w-100">
                                        <div class="d-block ">
                                            <div class="position-relative text-decoration-none text-dark text-center alight-cnter "
                                                alt="">
                                                <a href="{{ route('add.to.fav', $product->id) }}">
                                                    <span class=" fav rounded-circle shadow"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                            fill="currentColor" class="bi bi-heart-fill"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div>
                                                    <a href="{{route('item', $product->id)}} "
                                                        class="text-decoration-none text-white d-flex justify-content-center">
                                                        <figure class="cardt text-decoration-none">
                                                            <img src="{{ asset('assets/products') }}/{{$product->image}}"
                                                                class="" style="width:143px; height:202px">
                                                            <figcaption
                                                                class="d-flex align-items-center bg-white bg-opacity-75 ">
                                                                <button
                                                                    class=" btn btn-dark d-flex justify-content-center  fs-6 rounded"
                                                                    style="width:100px">
                                                                    <div class="font-weight-bolder fs-6 lh-1 text-wrap"
                                                                        style="max-width: 50px;">
                                                                        Quick View
                                                                    </div>
                                                                </button>
                                                            </figcaption>
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="d-block mt-1 mb-1   text-left"
                                                style="max-width: 100%; height:60px">
                                                <a href="{{route('item', $product->id)}}" class=" d-block text-decoration-none text-truncate text-wrap text-center
                                            lh-sm text-center w-100 overflow-hidden ">
                                                    <p class="tile-name">
                                                        {{ $product->name }}
                                                    </p>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="d-block  ">
                                            <a href="{{ route('add.to.cart', $product->id ) }}">
                                                <button type="button" class="btn btn-outline-primary "
                                                    style=" width:100%;">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                        </svg>
                                                        <span class="m-1">Add -฿{{ $product->price }}</spaa>
                                                    </div>

                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                        </div>

                        <!--2-->
                        <div class="carousel-item active d-flex justify-content-center text-center bg-white gap-3 ">
                            @foreach($products as $product)
                            @if($product->id > 15 && $product->id <= 20 && $product->ProductCategoryID == 2)
                                <div class=" position-relative h-100  " style="width: 202px;">
                                    <div class="w-100">
                                        <div class="d-block ">
                                            <div class="position-relative text-decoration-none text-dark text-center alight-cnter "
                                                alt="">
                                                <a href="{{ route('add.to.fav', $product->id) }}" class="">
                                                    <span class=" fav rounded-circle shadow"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                            fill="currentColor" class="bi bi-heart-fill"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div>
                                                    <a href="{{route('item', $product->id)}} "
                                                        class="text-decoration-none text-white d-flex justify-content-center">
                                                        <figure class="cardt text-decoration-none">
                                                            <img src="{{ asset('assets/products') }}/{{$product->image}}"
                                                                class="" style="width:143px; height:202px">
                                                            <figcaption
                                                                class="d-flex align-items-center bg-white bg-opacity-75 ">
                                                                <button
                                                                    class=" btn btn-dark d-flex justify-content-center  fs-6 rounded"
                                                                    style="width:100px">
                                                                    <div class="font-weight-bolder fs-6 lh-1 text-wrap"
                                                                        style="max-width: 50px;">
                                                                        Quick View
                                                                    </div>
                                                                </button>
                                                            </figcaption>
                                                        </figure>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="d-block mt-1 mb-1   text-left"
                                                style="max-width: 100%; height:60px">
                                                <a href="{{route('item', $product->id)}}"
                                                    class=" d-block text-decoration-none  text-truncate text-wrap text-center lh-sm text-center w-100 overflow-hidden  ">
                                                    <p class="tile-name">
                                                        {{ $product->name }}
                                                    </p>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="d-block bottom-0 ">
                                            <a href="{{ route('add.to.cart',$product->id) }}">
                                                <button type="button" class="btn btn-outline-primary "
                                                    style=" width:100%;">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                        </svg>
                                                        <span class="m-1">Add -฿{{ $product->price }}</spaa>
                                                    </div>

                                                </button>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                                @endif
                                @endforeach

                        </div>
                        <button class="carousel-control-prev" style="width:100px" type="button"
                            data-bs-target="#carouselExampleFade2" data-bs-slide="prev">
                            <span
                                class="carousel-control-prev-icon shadow-lg border border-5 border-dark bg-dark rounded-circle"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" style="width:100px" type="button"
                            data-bs-target="#carouselExampleFade2" data-bs-slide="next">
                            <span
                                class="carousel-control-next-icon shadow-lg border border-5 border-dark bg-dark rounded-circle"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

            </div>
        </div>

        <!--MG-News-->
        <div class="container bg-white shadow-lg mt-3 mb-3">
            <div class="container p-4">
                <a href="{{route('product')}}" class="text-primary text-decoration-none d-flex justify-content-center ">
                    <p class="fs-5 font-weight-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                            class="bi bi-columns-gap" viewBox="0 0 16 16">
                            <path
                                d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z" />
                        </svg>
                        Manga แนะนำ
                    </p>
                </a>
                <div id="carouselExampleFade4" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner  d-flex">
                        <!--1-->

                        <!-- @php $total = 0
                        @endphp
                        @foreach( $products as $product )
                        @php $total += 1
                        @endphp
                        @endforeach -->

                        <div class="carousel-item active d-flex justify-content-center text-center bg-white gap-3 ">
                            @foreach($products as $product)
                            @if($product->id >= 1 && $product->id <= 5 && $product->ProductCategoryID == 1) <div
                                    class=" position-relative h-100  " style="width: 202px;">
                                    <div class="w-100">
                                        <div class="d-block ">
                                            <div class="position-relative text-decoration-none text-dark text-center alight-cnter "
                                                alt="">
                                                <a href="{{ route('add.to.fav', $product->id) }}">
                                                    <span class=" fav rounded-circle shadow"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                            fill="currentColor" class="bi bi-heart-fill"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div>
                                                    <a href="{{route('item', $product->id)}} "
                                                        class="text-decoration-none text-white d-flex justify-content-center">
                                                        <figure class="cardt text-decoration-none">
                                                            <img src="{{ asset('assets/products') }}/{{$product->image}}"
                                                                class="" style="width:143px; height:202px">
                                                            <figcaption
                                                                class="d-flex align-items-center bg-white bg-opacity-75 ">
                                                                <button
                                                                    class=" btn btn-dark d-flex justify-content-center  fs-6 rounded"
                                                                    style="width:100px">
                                                                    <div class="font-weight-bolder fs-6 lh-1 text-wrap"
                                                                        style="max-width: 50px;">
                                                                        Quick View
                                                                    </div>
                                                                </button>
                                                            </figcaption>
                                                        </figure>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="d-block mt-1 mb-1   text-left"
                                                style="max-width: 100%; height:60px">
                                                <a href="{{route('item', $product->id)}}" class=" d-block text-decoration-none text-truncate text-wrap text-center
                                            lh-sm text-center w-100 overflow-hidden ">
                                                    <p class="tile-name">
                                                        {{ $product->name }}
                                                    </p>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="d-block  ">
                                            <a href="{{ route('add.to.cart', $product->id ) }}">
                                                <button type="button" class="btn btn-outline-primary "
                                                    style=" width:100%;">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                        </svg>
                                                        <span class="m-1">Add -฿{{ $product->price }}</spaa>
                                                    </div>

                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                        </div>

                        <!--2-->
                        <div class="carousel-item active d-flex justify-content-center text-center bg-white gap-3 ">
                            @foreach($products as $product)
                            @if($product->id > 5 && $product->id <= 10 && $product->ProductCategoryID == 1)
                                <div class=" position-relative h-100  " style="width: 202px;">
                                    <div class="w-100">
                                        <div class="d-block ">
                                            <div class="position-relative text-decoration-none text-dark text-center alight-cnter "
                                                alt="">
                                                <a href="{{ route('add.to.fav', $product->id) }}" class="">
                                                    <span class=" fav rounded-circle shadow"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                            fill="currentColor" class="bi bi-heart-fill"
                                                            viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div>
                                                    <a href="{{route('item', $product->id)}} "
                                                        class="text-decoration-none text-white d-flex justify-content-center">
                                                        <figure class="cardt text-decoration-none">
                                                            <img src="{{ asset('assets/products') }}/{{$product->image}}"
                                                                class="" style="width:143px; height:202px">
                                                            <figcaption
                                                                class="d-flex align-items-center bg-white bg-opacity-75 ">
                                                                <button
                                                                    class=" btn btn-dark d-flex justify-content-center  fs-6 rounded"
                                                                    style="width:100px">
                                                                    <div class="font-weight-bolder fs-6 lh-1 text-wrap"
                                                                        style="max-width: 50px;">
                                                                        Quick View
                                                                    </div>
                                                                </button>
                                                            </figcaption>
                                                        </figure>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="d-block mt-1 mb-1   text-left"
                                                style="max-width: 100%; height:60px">
                                                <a href="{{route('item', $product->id)}}"
                                                    class=" d-block text-decoration-none  text-truncate text-wrap text-center lh-sm text-center w-100 overflow-hidden  ">
                                                    <p class="tile-name">
                                                        {{ $product->name }}
                                                    </p>
                                                </a>

                                            </div>
                                        </div>
                                        <div class="d-block bottom-0 ">
                                            <a href="{{ route('add.to.cart',$product->id) }}">
                                                <button type="button" class="btn btn-outline-primary "
                                                    style=" width:100%;">
                                                    <div class="d-flex align-items-center justify-content-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                                            <path
                                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                        </svg>
                                                        <span class="m-1">Add -฿{{ $product->price }}</spaa>
                                                    </div>

                                                </button>
                                            </a>
                                        </div>


                                    </div>
                                </div>
                                @endif
                                @endforeach

                        </div>
                        <button class="carousel-control-prev" style="width:100px" type="button"
                            data-bs-target="#carouselExampleFade4" data-bs-slide="prev">
                            <span
                                class="carousel-control-prev-icon shadow-lg border border-5 border-dark bg-dark rounded-circle"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" style="width:100px" type="button"
                            data-bs-target="#carouselExampleFade4" data-bs-slide="next">
                            <span
                                class="carousel-control-next-icon shadow-lg border border-5 border-dark bg-dark rounded-circle"
                                aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- @guest -->
    <!-- <div class="container mt-5">
    <h1>Homepage</h1>
    <p class="lead">Your viewing the home page. Please login to view the
        restricted data.</p>
    @endguest
</div> -->

</div>


@endsection