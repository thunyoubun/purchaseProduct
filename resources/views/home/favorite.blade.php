@extends('layouts.app-master')
@section('content')

<style>
.fav {

    position: absolute;
    top: 6%;
    right: 5%;
    background-color: whitesmoke;
    color: crimson;
    border-style: solid;
    border-width: 5px;
    border-color: whitesmoke;
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

.form-check-input:active {
    background-color: dodgerblue;
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
    <div class="container   pt-5 pb-5 ">
        <div class="d-flex gap-3 ">






            <!--Fav-->
            <div class="bg-white h-100 shadow " style="width:100% ;">
                <div class="container p-4  ">
                    <div class="d-flex px-4 position-relative align-items-center ">
                        <span class="fs-2 fw-semibold ">Favorite</span>
                        <div class="position-absolute end-0 mx-5 ">
                            @php $total = 0
                            @endphp
                            @foreach( $products as $product )
                            @php $total += 1
                            @endphp
                            @endforeach

                            <span class="text-primary fs-5">{{$total}} </span>
                            <span class="text-primary fs-6">Items</span>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex flex-wrap gap-5  " id="tbody">
                        @foreach($products as $product)
                        <div class=" mt-3 ">
                            <div class=" position-relative h-100  " style="width: 202px;">
                                <div class="w-100">
                                    <div class="d-block ">
                                        <div class="position-relative text-decoration-none text-dark text-center alight-cnter "
                                            alt="">


                                            <form action="{{ url('remove-from-fav/'.$product->id) }}" method="POST">

                                                <button class=" fav rounded-circle shadow">
                                                    @csrf
                                                    @method('DELETE')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                                                        fill="currentColor" class="bi bi-heart-fill"
                                                        viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                    </svg>

                                                </button>
                                            </form>
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
                                        <div class=" d-block mt-1 mb-1 text-left" style="max-width: 100%; height:60px">
                                            <a href="{{route('item', $product->id)}}" class=" d-block text-decoration-none text-truncate text-wrap text-center
                                            lh-sm text-center w-100 overflow-hidden ">
                                                <p class="tile-name">
                                                    {{ $product->name }}
                                                </p>
                                            </a>

                                        </div>
                                    </div>
                                    <div class="d-block  ">
                                        <a href="{{ route('add.to.cart', $product->id) }}">
                                            <button type="button" class="btn btn-outline-primary " style=" width:100%;">
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

                        </div>
                        @endforeach

                    </div>


                </div>
            </div>

        </div>
    </div>




    @endsection