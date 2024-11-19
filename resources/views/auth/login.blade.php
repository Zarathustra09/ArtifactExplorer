@extends('layouts.app')

@section('content')

<body class="bg-gradient-success">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block position-relative"
                                 style="background: #97CC70;
            min-height: 600px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;">
                                <!-- Image Container -->
                                <div style="height: 60%;
                background: url('{{ asset('img/miguel_malvar.png') }}') center center no-repeat;
                background-size: 50%;
                margin-top: 2rem;">
                                </div>
                                <!-- Overlay Text -->
                                <div class="text-center w-100"
                                     style="color: white;
                font-size: 2rem;
                font-weight: bold;
                padding: 2rem 1rem;
                background: linear-gradient(to bottom, transparent, #97CC70 20%);">
                                    <span style="color: white;">Step into history with</span> <br>
                                    <span style="color: #007A33;">ARtifact Explorer</span> <br>
                                    <span style="color: white;">where the past meets the future</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <!-- Logo Image on Top of Login -->
                                        <img src="{{ asset('NEW CONTENT/malvar x app black.png') }}" alt="Logo" class="img-fluid mb-4" style="max-width: 150px;">

                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <!-- Start of Form -->
                                    <!-- Start of Form -->
                                    <form method="POST" action="{{ route('login') }}" class="user">
                                        @csrf

                                        <!-- Email Input -->
                                        <div class="form-group mb-4">  <!-- Added mb-4 for bottom margin -->
                                            <input id="email"
                                                   type="email"
                                                   class="form-control form-control-user @error('email') is-invalid @enderror"
                                                   name="email"
                                                   value="{{ old('email') }}"
                                                   required
                                                   autocomplete="email"
                                                   autofocus
                                                   placeholder="Enter Email Address...">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
                                            @enderror
                                        </div>

                                        <!-- Password Input -->
                                        <!-- Password Input -->
                                        <div class="form-group mb-4 position-relative">  <!-- Added position-relative here -->
                                            <div class="position-relative">  <!-- Added wrapper div -->
                                                <input id="password"
                                                       type="password"
                                                       class="form-control form-control-user @error('password') is-invalid @enderror"
                                                       name="password"
                                                       required
                                                       autocomplete="current-password"
                                                       placeholder="Password"
                                                       style="padding-right: 40px;">  <!-- Added right padding to prevent text overlap with icon -->
                                                <span toggle="#password"
                                                      class="fa fa-fw fa-eye field-icon toggle-password"
                                                      style="cursor: pointer;
                     position: absolute;
                     right: 15px;
                     top: 50%;
                     transform: translateY(-50%);
                     z-index: 2;">
        </span>
                                            </div>

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                                            @enderror
                                        </div>

                                        <!-- Remember Me Checkbox -->
                                        <div class="form-group mb-4">  <!-- Added mb-4 for bottom margin -->
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox"
                                                       class="custom-control-input"
                                                       id="customCheck"
                                                       name="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customCheck">Remember Me</label>
                                            </div>
                                        </div>

                                        <!-- Login Button -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block mb-4">  <!-- Added mb-4 for bottom margin -->
                                            Login
                                        </button>

                                        <hr class="mb-4">  <!-- Added mb-4 for bottom margin -->
                                    </form>

                                    <!-- Forgot Password and Register Links -->
                                    <div class="text-center">
                                        @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                        @endif
                                    </div>
                                    {{--                                    <div class="text-center">--}}
                                    {{--                                        <a class="small" href="{{ route('register') }}">Create an Account!</a>--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        document.querySelector('.toggle-password').addEventListener('click', function () {
            const passwordInput = document.querySelector('#password');
            const passwordType = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', passwordType);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

@endsection
