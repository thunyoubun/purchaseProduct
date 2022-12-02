<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>Product</title>
    <!-- Bootstrap core CSS -->
    <link href="{!! url('assets/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet">
    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    ::-webkit-scrollbar {
        width: 15px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;

    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: dodgerblue;
        border-radius: 10px;
    }

    .session {
        position: fixed;
        animation-name: session;
        visibility: hidden;
        animation-duration: 3s;
        right: 2%;

    }

    @keyframes session {
        0% {
            right: 0%;
            visibility: visible;
        }

        50% {
            right: 2%;
            visibility: visible;
        }

        100% {
            right: 2%;
            visibility: visible;
        }
    }

    /* Handle on hover */
    </style>
    <!-- Custom styles for this template -->
    <link href="{!! url('assets/css/app.css') !!}" rel="stylesheet">

    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <script>
    $(function() {
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function(response) {
                startAutoComplete(response)
            }
        })

        function startAutoComplete(availableTags) {

            $("#search_product").autocomplete({
                source: availableTags
            });
        }
    });
    </script>
</head>

<body>
    @include('layouts.partials.navbar')

    <main class="position-relative" style="overflow:hidden;">

        @if(session('success'))

        <div class="session  d-flex shadow  " style="z-index:10;  top:10% ; " role="alert">
            <div class="d-flex justify-content-center align-item-middle py-3 px-2 "
                style="background-color:limegreen; ">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-check-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                </svg>
            </div>
            <div class="d-flex bg-white text-center p-3 ">
                <span class="font-weight-bold">{{session('success')}}</span>
            </div>
        </div>
        @endif
        @if(session('fail'))

        <div class="session  d-flex shadow  " style="z-index:10;  top:10% ; " role="alert">
            <div class="d-flex justify-content-center align-item-middle py-3 px-2 " style="background-color:crimson; ">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="white" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path
                        d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z" />
                </svg>
            </div>
            <div class="d-flex bg-white text-center p-3 ">
                <span class="font-weight-bold">{{session('fail')}}</span>
            </div>
        </div>
        @endif
        @yield('content')


    </main>



    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
</body>

</html>