{{-- @extends('layout')

@section('title', 'Checkout')

@section('extra-css')
    <style>
        .mt-32 {
            margin-top: 32px;
        }
    </style>

    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1 class="checkout-heading stylish-heading">Checkout</h1>
        <div class="checkout-section">
            <div>
                <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                    {{ csrf_field() }}
                    <h2>Billing Details</h2>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        @if (auth()->user())
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                        @else
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                    </div>

                    <div class="half-form">
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="province">Province</label>
                            <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="half-form">
                        <div class="form-group">
                            <label for="postalcode">Postal Code</label>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div> <!-- end half-form -->

                    <div class="spacer"></div>

                    <h2>Payment Details</h2>

                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                    </div>

                    <div class="form-group">
                        <label for="card-element">
                          Credit or debit card
                        </label>
                        <div id="card-element">
                          <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="spacer"></div>

                    <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>


                </form>

                @if ($paypalToken)
                    <div class="mt-32">or</div>
                    <div class="mt-32">
                        <h2>Pay with PayPal</h2>

                        <form method="post" id="paypal-payment-form" action="{{ route('checkout.paypal') }}">
                            @csrf
                            <section>
                                <div class="bt-drop-in-wrapper">
                                    <div id="bt-dropin"></div>
                                </div>
                            </section>

                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                            <button class="button-primary" type="submit"><span>Pay with PayPal</span></button>
                        </form>
                    </div>
                @endif
            </div>



            <div class="checkout-table-container">
                <h2>Your Order</h2>

                <div class="checkout-table">
                    @foreach (Cart::content() as $item)
                    <div class="checkout-table-row">
                        <div class="checkout-table-row-left">
                            <img src="{{ productImage($item->model->image) }}" alt="item" class="checkout-table-img">
                            <div class="checkout-item-details">
                                <div class="checkout-table-item">{{ $item->model->name }}</div>
                                <div class="checkout-table-description">{{ $item->model->details }}</div>
                                <div class="checkout-table-price">{{ $item->model->presentPrice() }}</div>
                            </div>
                        </div> <!-- end checkout-table -->

                        <div class="checkout-table-row-right">
                            <div class="checkout-table-quantity">{{ $item->qty }}</div>
                        </div>
                    </div> <!-- end checkout-table-row -->
                    @endforeach

                </div> <!-- end checkout-table -->

                <div class="checkout-totals">
                    <div class="checkout-totals-left">
                        Subtotal <br>
                        @if (session()->has('coupon'))
                            Discount ({{ session()->get('coupon')['name'] }}) :
                            <br>
                            <hr>
                            New Subtotal <br>
                        @endif
                        Tax ({{config('cart.tax')}}%)<br>
                        <span class="checkout-totals-total">Total</span>

                    </div>

                    <div class="checkout-totals-right">
                        {{ presentPrice(Cart::subtotal()) }} <br>
                        @if (session()->has('coupon'))
                            -{{ presentPrice($discount) }} <br>
                            <hr>
                            {{ presentPrice($newSubtotal) }} <br>
                        @endif
                        {{ presentPrice($newTax) }} <br>
                        <span class="checkout-totals-total">{{ presentPrice($newTotal) }}</span>

                    </div>
                </div> <!-- end checkout-totals -->
            </div>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
        </div> <!-- end checkout-section -->
    </div>

@endsection

@section('extra-js')
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('{{ config('services.stripe.key') }}');

            // Create an instance of Elements
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                  color: '#aab7c4'
                }
              },
              invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
              }
            };

            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;

              var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }

              stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;

                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });

            function stripeTokenHandler(token) {
              // Insert the token ID into the form so it gets submitted to the server
              var form = document.getElementById('payment-form');
              var hiddenInput = document.createElement('input');
              hiddenInput.setAttribute('type', 'hidden');
              hiddenInput.setAttribute('name', 'stripeToken');
              hiddenInput.setAttribute('value', token.id);
              form.appendChild(hiddenInput);

              // Submit the form
              form.submit();
            }

            // PayPal Stuff
            var form = document.querySelector('#paypal-payment-form');
            var client_token = "{{ $paypalToken }}";

            braintree.dropin.create({
              authorization: client_token,
              selector: '#bt-dropin',
              paypal: {
                flow: 'vault'
              }
            }, function (createErr, instance) {
              if (createErr) {
                console.log('Create Error', createErr);
                return;
              }

              // remove credit card option
              var elem = document.querySelector('.braintree-option__card');
              elem.parentNode.removeChild(elem);

              form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                  if (err) {
                    console.log('Request Payment Method Error', err);
                    return;
                  }

                  // Add the nonce to the form and submit
                  document.querySelector('#nonce').value = payload.nonce;
                  form.submit();
                });
              });
            });

        })();
    </script>
@endsection --}}



@extends('layouts.electro')
@section('content')

@if (session()->has('success_message'))
<div class="spacer"></div>
<div class="alert alert-success">
    {{ session()->get('success_message') }}
</div>
@endif

@if(count($errors) > 0)
<div class="spacer"></div>
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
</div>
@endif

<div id="content" class="site-content" tabindex="-1">
    <div class="container">

        <nav class="woocommerce-breadcrumb"><a href="home.html">Home</a><span class="delimiter"><i class="fa fa-angle-right"></i></span>Checkout</nav>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <article class="page type-page status-publish hentry">
                    <header class="entry-header"><h1 itemprop="name" class="entry-title">Checkout</h1></header><!-- .entry-header -->
                    <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                        {{ csrf_field() }}
                        <div id="customer_details" class="col2-set">
                            <div class="col-1">
                                <div class="woocommerce-billing-fields">

                                    <h3>Billing Details</h3>


                                    <p id="billing_email_field" class="form-row form-row form-row-first validate-required validate-email"><label class="" for="billing_email">Email Address <abbr title="required" class="required">*</abbr></label> @if (auth()->user())
                                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" readonly>
                                    @else
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                                    @endif</p>

                                    <p id="billing_first_name_field" class="form-row form-row form-row-first validate-required"><label class="" for="billing_first_name">Full Name <abbr title="required" class="required">*</abbr></label><input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                    </p>

                                    <p id="billing_address_1_field" class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_address_1">Address <abbr title="required" class="required">*</abbr></label><input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required></p>

                                   

                                    <p id="billing_city_field" class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_city">Town / City <abbr title="required" class="required">*</abbr></label><input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                                    </p>

                                    <p class="form-row form-row form-row-wide address-field validate-required" data-o_class="form-row form-row form-row-wide address-field validate-required"><label class="" for="billing_city">Province<abbr title="required" class="required">*</abbr></label><input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                                    </p>
                                   

                                    <p class="form-row form-row form-row-last address-field validate-postcode validate-required" data-o_class="form-row form-row form-row-last address-field validate-required validate-postcode"><label class="" for="billing_postcode">Postcode / ZIP <abbr title="required" class="required">*</abbr></label><input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required></p>

                                    <p class="form-row form-row form-row-last validate-required validate-phone"><label class="" for="billing_phone">Phone <abbr title="required" class="required">*</abbr></label> <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required></p>
                                    <div class="clear"></div>

                                    <div class="clear"></div>

                                    <p class="form-row form-row-wide create-account"><input type="checkbox" value="1" name="createaccount" id="createaccount" class="input-checkbox"> <label class="checkbox" for="createaccount">Create an account?</label></p>

                                </div>
                                <h2>Payment Details</h2>

                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                    </div>

                    <div class="form-group">
                        <label for="card-element">
                          Credit or debit card
                        </label>
                        <div id="card-element">
                          <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="spacer"></div>

                    <button type="submit" id="complete-order" class="button alt">Complete Order</button>


                </form>

                @if ($paypalToken)
                    <div class="mt-32">or</div>
                    <div class="mt-32">
                        <h2>Pay with PayPal</h2>

                        <form method="post" id="paypal-payment-form" action="{{ route('checkout.paypal') }}">
                            @csrf
                            <section>
                                <div class="bt-drop-in-wrapper">
                                    <div id="bt-dropin"></div>
                                </div>
                            </section>

                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                            <button class="button-primary" type="submit"><span>Pay with PayPal</span></button>
                        </form>
                    </div>
                @endif
            </div>
                            </div>

                            
                            <hr>
                            <hr>
                        <h3 id="order_review_heading">Your order</h3>

                        <div class="woocommerce-checkout-review-order" id="order_review">
                            <table class="shop_table woocommerce-checkout-review-order-table">
                                <thead>
                                    <tr>
                                        <th class="product-name">Product</th>
                                        <th class="product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $item)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{ $item->model->name }}&nbsp;
                                            <strong class="product-quantity">({{ $item->qty }})</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">{{ $item->model->presentPrice() }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>

                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        @if (session()->has('coupon'))
                                            Discount ({{ session()->get('coupon')['name'] }}) :
                                            <br>
                                            <hr>
                                            New Subtotal <br>
                                        @endif
                                        Tax ({{config('cart.tax')}}%)<br>
                                        <span class="checkout-totals-total">Total</span>
                                        <td><span class="amount">{{ presentPrice(Cart::subtotal()) }} <br>
                                            @if (session()->has('coupon'))
                                                -{{ presentPrice($discount) }} <br>
                                                <hr>
                                                {{ presentPrice($newSubtotal) }} <br>
                                            @endif
                                            {{ presentPrice($newTax) }} <br>
                                            <span class="checkout-totals-total">{{ presentPrice($newTotal) }}</span></span></td>
                                    </tr>

                                    <tr class="shipping">
                                        <th>Shipping</th>
                                        <td data-title="Shipping">Flat Rate: <span class="amount">$300.00</span> <input type="hidden" class="shipping_method" value="international_delivery" id="shipping_method_0" data-index="0" name="shipping_method[0]"></td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td><strong><span class="amount">$3,599.00</span></strong> </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="woocommerce-checkout-payment" id="payment">
                                <ul class="wc_payment_methods payment_methods methods">
                                    <li class="wc_payment_method payment_method_bacs">
                                        <input type="radio" data-order_button_text="" checked="checked" value="bacs" name="payment_method" class="input-radio" id="payment_method_bacs">
                                        <label for="payment_method_bacs">Direct Bank Transfer</label>
                                        <div class="payment_box payment_method_bacs">
                                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_cheque">
                                        <input type="radio" data-order_button_text="" value="cheque" name="payment_method" class="input-radio" id="payment_method_cheque">
                                        <label for="payment_method_cheque">Cheque Payment   </label>
                                        <div style="display:none;" class="payment_box payment_method_cheque">
                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_cod">
                                        <input type="radio" data-order_button_text="" value="cod" name="payment_method" class="input-radio" id="payment_method_cod">

                                        <label for="payment_method_cod">Cash on Delivery</label>
                                        <div style="display:none;" class="payment_box payment_method_cod">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </li>
                                    <li class="wc_payment_method payment_method_paypal">
                                        <input type="radio" data-order_button_text="Proceed to PayPal" value="paypal" name="payment_method" class="input-radio" id="payment_method_paypal">

                                        <label for="payment_method_paypal">PayPal <img alt="PayPal Acceptance Mark" src="../../www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg"><a title="What is PayPal?" onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;" class="about_paypal" href="https://www.paypal.com/us/webapps/mpp/paypal-popup">What is PayPal?</a></label>
                                        <div style="display:none;" class="payment_box payment_method_paypal">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                        </div>
                                    </li>
                                </ul>
                                
                                </div>
                            </div>
                        </div>
                    </form>
                </article>
            </main><!-- #main -->
        </div><!-- #primary -->
    </div><!-- .container -->
</div><!-- #content -->

@endsection

@section('js')
<script src="https://js.stripe.com/v3/"></script>

<script>
    (function(){
        // Create a Stripe client
        var stripe = Stripe('{{ config('services.stripe.key') }}');

        // Create an instance of Elements
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
          base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
              color: '#aab7c4'
            }
          },
          invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
          }
        };

        // Create an instance of the card Element
        var card = elements.create('card', {
            style: style,
            hidePostalCode: true
        });

        // Add an instance of the card Element into the `card-element` <div>
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
          var displayError = document.getElementById('card-errors');
          if (event.error) {
            displayError.textContent = event.error.message;
          } else {
            displayError.textContent = '';
          }
        });

        // Handle form submission
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
          event.preventDefault();

          // Disable the submit button to prevent repeated clicks
          document.getElementById('complete-order').disabled = true;

          var options = {
            name: document.getElementById('name_on_card').value,
            address_line1: document.getElementById('address').value,
            address_city: document.getElementById('city').value,
            address_state: document.getElementById('province').value,
            address_zip: document.getElementById('postalcode').value
          }

          stripe.createToken(card, options).then(function(result) {
            if (result.error) {
              // Inform the user if there was an error
              var errorElement = document.getElementById('card-errors');
              errorElement.textContent = result.error.message;

              // Enable the submit button
              document.getElementById('complete-order').disabled = false;
            } else {
              // Send the token to your server
              stripeTokenHandler(result.token);
            }
          });
        });

        function stripeTokenHandler(token) {
          // Insert the token ID into the form so it gets submitted to the server
          var form = document.getElementById('payment-form');
          var hiddenInput = document.createElement('input');
          hiddenInput.setAttribute('type', 'hidden');
          hiddenInput.setAttribute('name', 'stripeToken');
          hiddenInput.setAttribute('value', token.id);
          form.appendChild(hiddenInput);

          // Submit the form
          form.submit();
        }

        // PayPal Stuff
        var form = document.querySelector('#paypal-payment-form');
        var client_token = "{{ $paypalToken }}";

        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }

          // remove credit card option
          var elem = document.querySelector('.braintree-option__card');
          elem.parentNode.removeChild(elem);

          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });

    })();
</script>

@endsection