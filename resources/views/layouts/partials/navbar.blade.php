<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min.css">

    <title>Product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<style>
.navbar {
    display: flex;
    justify-content: end;
    flex-wrap: wrap;
    padding-right: 5px;

}

.box {
    position: relative;
    max-width: 450px;
    width: 100%;
    background-color: white;
    border-radius: 5px;
    padding: 0;

}

.box .search-box {
    display: flex;
    position: relative;
    height: 40px;
    max-width: 450px;
    margin: auto;
    padding-left: 15px;


}

.search-box input {
    position: relative;
    height: 100%;
    width: 100%;
    border-radius: 5px;
    outline: none;
    border: 0 none;

}

.search-box input:active {
    border: none;
}

.search-box input::placeholder {
    color: royalblue;
}

.ui-menu {
    position: absolute;
    border: 2px;
    border-radius: 5px;
    color: royalblue;
    padding-top: 5px;

}

.search-box button {
    right: 0;
    top: 0;
    width: 60px;
    height: 90%;
    border-color: transparent;
    background-color: royalblue;
    color: white;
    border-radius: 5px;
    margin: 2px 2px 2px 2px;
}

.btn-search:hover {
    background-color: dodgerblue;
    color: white;
}

.img-login,
.img-cart {
    color: white;
}

.img-login:hover,
.img-cart:hover {

    color: lightgrey;
}

.img-fav {
    color: white;
}

.img-fav:hover {
    color: crimson;
}

.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;

}

.dropdown-item:hover {
    background-color: dodgerblue;
    color: white;
}

.count {
    top: 0;
    left: 65%;
    min-width: 20px;
    min-height: 20px;
    line-height: 1;
    border: solid 2px #fff;
    border-radius: 100%;
}
</style>

<header class="p-3 text-white " style="background-color:royalblue">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-center">
            <div class="col d-flex align-middle mb-2 mb-lg-0 justify-content-start ">
                <a href="/" class=" text-white fs-3 font-weight-bold  text-decoration-none ">
                    Switch
                </a>
            </div>
            <!--Serch -->
            <div class="box col d-none d-sm-block  " style="max-width: 450px;">
                <form action="{{ url('searchproduct')}}" method="POST">
                    @csrf
                    <div class="search-box">
                        <input style="background-color:white;color:royalblue; " name="product_name" id="search_product"
                            type="search" placeholder="Search">
                        <button class="btn-search" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg></button>
                    </div>
                </form>

            </div>



            <div class="col  d-flex justify-content-end  gap-4 mr-2 ">
                <!--cart-->
                @guest


                <a href="" class="d-block d-sm-none" style="color:#fff"><svg xmlns="http://www.w3.org/2000/svg"
                        width="23" height="23" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></a>

                <a href="{{url('login')}}" class="img-cart"><svg xmlns="http://www.w3.org/2000/svg" width="23"
                        height="23" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                </a>

                <!--favorite-->
                <a href="{{route('favorite')}}" class="img-fav ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                        class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                    </svg>

                </a>



                <!--login-->
                <a href="/login" class="img-login "><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23"
                        fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                </a>
                @endguest
                <!--logout-->
                @auth

                <!--Cart-->
                <div>
                    <a href="" class="d-block d-sm-none" style="color:#fff"><svg xmlns="http://www.w3.org/2000/svg"
                            width="23" height="23" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></a>
                </div>

                <div class="position-relative">
                    <a href="{{url('cart')}}" class="img-cart"><svg xmlns="http://www.w3.org/2000/svg" width="23"
                            height="23" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>

                        @php $total = 0 @endphp
                        @foreach($carts as $cart)
                        @php $total += $cart->quantity @endphp
                        @endforeach
                        @if($total != 0)
                        <span
                            class="count d-flex justify-content-center position-absolute  end-0 text-white bg-danger border border-2  rounded-circle   ">
                            {{$total}}
                        </span>
                        @endif
                    </a>
                </div>


                <!--favorite-->
                <div class="position-relative">

                    <a href="{{url('favorite')}}" class="img-fav ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                        </svg>
                        @php $total = 0 @endphp
                        @foreach($favorites as $favorite)
                        @php $total += $favorite->quantity @endphp
                        @endforeach
                        @if($total != 0)
                        <span
                            class="count d-flex justify-content-center position-absolute  end-0 text-white bg-danger border border-2  rounded-circle   ">
                            {{$total}}
                        </span>
                        @endif
                    </a>
                </div>
                <div class="dropdown">
                    <!--dropdown-->
                    <a href="" class="img-login data-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="23"
                            height="23" fill="currentColor" class="bi bi-person-heart" viewBox="0 0 16 16">
                            <path
                                d="M9 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h10s1 0 1-1-1-4-6-4-6 3-6 4Zm13.5-8.09c1.387-1.425 4.855 1.07 0 4.277-4.854-3.207-1.387-5.702 0-4.276Z" />
                        </svg>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <div class="dropdown-item">
                            Sign in as :
                            <p class="m-auto text-success fw-bolder">{{auth()->user()->username}}</p>
                        </div>
                        <hr>
                        <!--My Account-->
                        <a class="dropdown-item" href="{{ url('myaccount')}}">
                            <svg xmlns=" http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-fill mr-2" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>My Account
                        </a>
                        <!--DashBoard-->
                        @if(auth()->user()->role == "admin")
                        <a href="{{url('dashboard')}}" class="dropdown-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person-workspace mr-2" viewBox="0 0 16 16">
                                <path
                                    d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                <path
                                    d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
                            </svg>My DashBord
                        </a>
                        @endif

                        <a class="dropdown-item" href="{{url('cart')}}"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-cart mr-2" viewBox="0 0 16 16">
                                <path
                                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </svg>My Orders</a>
                        <hr>
                        <a class="dropdown-item m-0" href="{{ route('logout.perform') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-power mr-2" viewBox="0 0 16 16">
                                <path d="M7.5 1v7h1V1h-1z" />
                                <path
                                    d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z" />
                            </svg>Logout</a>

                    </div>
                </div>




                @endauth

            </div>
        </div>
    </div>
</header>