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
                                                <label for="username">Username or email address<span class="required">*</span></label>
                                                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>

                                            </p>

                                            <p class="form-row form-row-wide">
                                                <label for="password">Password<span class="required">*</span></label>
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

                                            <div class="register-benefits">
                                                <a href="{{ route('guestCheckout.index_2') }}" class="auth-button-hollow">   <h3>Or just continue as a GUEST</h3></a>
                                               
                                            </div>

                                        </form>

                                    </div><!-- .col-2 -->

                                </div><!-- .col2-set -->

                            </div><!-- /.customer-login-form -->
                        </div><!-- .woocommerce -->
                    </div><!-- .entry-content -->

                </article><!-- #post-## -->

            </main><!-- #main -->
        </div><!-- #primary -->

    </div><!-- .col-full -->
</div><!-- #content -->


@endsection