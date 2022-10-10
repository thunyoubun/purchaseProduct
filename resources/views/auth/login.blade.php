<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\bootstrap\css\bootstrap.min.css">

    <title>Log In</title>
</head>

<style>
body {
    /* background-color: #5063e3;
    background-image:
        radial-gradient(at 47% 33%, hsl(219.74, 77%, 40%) 0, transparent 59%),
        radial-gradient(at 82% 65%, hsl(198.00, 100%, 50%) 0, transparent 55%); */
    background-image: url('https://cutewallpaper.org/25/anime-wallpaper-gif-loops/river-1041uuu-on-patreon-pixel-art-landscape-cool-pixel-art-anime-pixel-art.gif');

    background-size: cover;


}

/* Glassmorphism card effect */
.card {
    backdrop-filter: blur(8px) saturate(180%);
    -webkit-backdrop-filter: blur(8px) saturate(180%);
    background-color: rgba(255, 255, 255, 0.23);
    border-radius: 12px;
    border: 1px solid rgba(209, 213, 219, 0.3);
}

.wrapper {
    width: auto;
    height: 40px;
    position: relative;

}

.wrapper input {
    background: white;
    width: 100%;
    height: 100%;
    border: 3px solid deepskyblue;
    border-radius: 10px;
    padding-left: 8px;
    color: deepskyblue;
    outline: none;
    font-size: 14px;
}



label {
    position: absolute;
    top: 50%;
    left: 15px;
    transform: translateY(-50%);
    transition: all 0.8s ease;
    font-size: 17px;
    pointer-events: none;
    color: deepskyblue;


}

input:focus+label,
input:valid+label {

    font-size: 15px;
    top: 0;
    padding-left: 5px;
    padding-right: 5px;
    background-color: white;
}
</style>



<body>

    @extends('layouts.auth-master')
    @section('content')

    <section class="vh-100 ">
        <div class=" mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container w-75 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 ">
                        <div class="card shadow-lg    " style="background-color:white; border-radius: 15px;">
                            <div class="card-body p-5">
                                <div class="p-4">
                                    <h3 class="my-4 d-flex justify-content-center text-primary">Login</h3>
                                    @include('layouts.partials.messages')
                                    <form method="post" action="{{ route('login.perform') }}">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <div class=" wrapper mb-3">
                                            <input type="text" required="required" name="username"
                                                value="{{ old('username') }}">
                                            <label for="floatingName">Username</label>
                                            @if ($errors->has('username'))
                                            <span
                                                class="text-danger m-2 text-left">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                        <div class="wrapper mb-3">
                                            <input type="password" name="password" value="{{ old('password') }}"
                                                required="required">
                                            <label for="">Password</label>
                                            @if ($errors->has('password'))
                                            <span
                                                class="text-danger m-2 text-left">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div class="d-flex justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-primary rounded    "
                                                style="width:1000px ;">Log
                                                In
                                            </button>
                                        </div>
                                        <!-- @include('auth.partials.copy') -->
                                    </form>
                                    <p class="text-center text-muted mt-2 mb-0">Haven't an account? <a
                                            href="{{ route('register.perform') }}" class="fw-bold  text-success"><u>Sign
                                                Up</u></a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

</body>

</html>



</html>