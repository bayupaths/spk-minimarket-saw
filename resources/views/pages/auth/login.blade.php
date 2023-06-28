<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ url('/style/main.css') }}" rel="stylesheet" />
</head>

<div class="page-content page-auth">
    <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-5">
                    <h2>Belanja Kebutuhan Utama, <br>
                        menjadi lebih mudah
                    </h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input id="email" type="email"
                                class="form-control w-75 @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control w-75 @error('password') is-invalid @enderror" name="password"
                                required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success btn-block w-75 mt-4">
                            Sign In to My Account
                        </button>
                        <a class="btn btn-signup w-75 mt-2" href="{{ route('register') }}">
                            Sign Up
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="pt-4 pb-2">
                    {{ date('Y') }} Copyright <a class="text-decoration:none;"
                        href="http://github.com/bayupaths">bayupaths</a>. All rights
                    reserved.
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="/vendor/jquery/jquery.slim.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>

</html>
