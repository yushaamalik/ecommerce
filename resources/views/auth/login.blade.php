{{-- @extends('layout')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="auth-pages">
        <div class="auth-left">
            @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
            @endif @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h2>Returning Customer</h2>
            <div class="spacer"></div>

            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}

                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>

                <div class="login-container">
                    <button type="submit" class="auth-button">Login</button>
                    <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>

                <div class="spacer"></div>

                <a href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>

            </form>
        </div>

        <div class="auth-right">
            <h2>New Customer</h2>
            <div class="spacer"></div>
            <p><strong>Save time now.</strong></p>
            <p>You don't need an account to checkout.</p>
            <div class="spacer"></div>
            <a href="{{ route('guestCheckout.index') }}" class="auth-button-hollow">Continue as Guest</a>
            <div class="spacer"></div>
            &nbsp;
            <div class="spacer"></div>
            <p><strong>Save time later.</strong></p>
            <p>Create an account for fast checkout and easy access to order history.</p>
            <div class="spacer"></div>
            <a href="{{ route('register') }}" class="auth-button-hollow">Create Account</a>

        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.electro')
@section('content')

<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb" ><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>My Account</nav><!-- .woocommerce-breadcrumb -->

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article id="post-8" class="hentry">

                    <div class="entry-content">
                        <div class="woocommerce">
                            <div class="customer-login-form">
                                <span class="or-text">or</span>

                                <div class="col2-set" id="customer_login">

                                    <div class="col-1">


                                        <h2>Returning Customer</h2>

                                        <form action="{{ route('login') }}" method="POST">
                                            {{ csrf_field() }}

                                            <p class="before-login-text">Welcome back! Sign in to your account</p>

                                            <p class="form-row form-row-wide">
                                                <label for="username">Email address<span class="required">*</span></label>
                                                <br>
                                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                            </p>

                                            <p class="form-row form-row-wide">
                                                <label for="password">Password<span class="required">*</span></label>
                                                <br>
                                                <input type="password" id="password" name="password" value="{{ old('password') }}" placeholder="Password" required>

                                            </p>

                                            <p class="form-row">
                                                <button type="submit" class="auth-button">Login</button>
                                                <label for="rememberme" class="inline">
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                Remember me</label>
                                            </p>

                                            <p class="lost_password"><a href="{{ route('password.request') }}">Lost your password?</a></p>

                                        </form>


                                    </div><!-- .col-1 -->

                                    <div class="col-2">

                                        <h2>Register</h2>

                                        <form method="POST" action="{{ route('register') }}">
                                            {{ csrf_field() }}
                            

                                            <p class="before-register-text">Create your very own account</p>


                                            <p class="form-row form-row-wide">
                                                <label for="reg_email">Name<span class="required">*</span></label>
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required autofocus>

                                            </p>

                                            <p class="form-row form-row-wide">
                                                <label for="reg_email">Email address<span class="required">*</span></label>
                                                <input type="email" class="input-text" name="email" id="reg_email" value="" />
                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label for="reg_email">Password<span class="required">*</span></label>
                                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" placeholder="Password" required>

                                            </p>
                                            <p class="form-row form-row-wide">
                                                <label for="reg_email">Confirm Password<span class="required">*</span></label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                                            required>

                                            </p>

                                            <p class="form-row"><button type="submit" class="auth-button">Create Account</button>
                                            </p>

                                            

                                        </form>

                                    </div><!-- .col-2 -->

                                </div><!-- .col2-set -->
                                <div class="register-benefits">
                                    <a href="{{ route('guestCheckout.index_2') }}" class="auth-button-hollow">   <h3>JUST CONTINUE AS A GUEST</h3></a>
                                   
                                </div>
                            </div><!-- /.customer-login-form -->
                        </div><!-- .woocommerce -->
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .col-full -->
</div><!-- #content -->
</div>

@endsection