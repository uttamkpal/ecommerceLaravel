@extends('userLayout')


@section('content')
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form role="form" action="{{ url('order/stripe') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Full Name<span>*</span></p>
                                        <input name="name" type="text">
                                    </div>
                                </div>

                            </div>

                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" placeholder="Full Address"
                                    class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>City<span>*</span></p>
                                <input name="city" type="text">
                            </div>
                            <div class="checkout__input">
                                <p>State<span>*</span></p>
                                <input name="state" type="text">
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input name="zip" type="text">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input name="phone" type="text">
                                    </div>
                                </div>

                            </div>


                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input name="password" type="password">
                            </div>

                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <input type="text" name="note"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cartdata as $cart)
                                        <li>{{ $cart->product->title }}
                                            <span>${{ $cart->product->price * $cart->count }}</span>
                                        </li>
                                        @php
                                            $total = $total + $cart->product->price * $cart->count;
                                        @endphp
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>${{ $total }}</span></div>
                                <div class="checkout__order__total">Total <span>${{ $total }}</span></div>

                                <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua.
                                </p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment2">
                                        Card Payment
                                        <input type="checkbox" id="payment2">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div id="card-details" class="">
                                    <div class="row">

                                        <div class="">

                                            <div class="panel panel-default credit-card-box">

                                                <div class="panel-heading display-table">

                                                    <h3 class="panel-title">Payment Details</h3>

                                                </div>

                                                <div class="panel-body">



                                                    @if (Session::has('success'))
                                                        <div class="alert alert-success text-center">

                                                            <a href="#" class="close" data-dismiss="alert"
                                                                aria-label="close">×</a>

                                                            <p>{{ Session::get('success') }}</p>

                                                        </div>
                                                    @endif





                                                    @csrf



                                                    <div class='form-row row'>

                                                        <div class='w-full form-group required'>

                                                            <label class='control-label'>Name on Card</label> <input
                                                                class='form-control' type='text'>

                                                        </div>

                                                    </div>



                                                    <div class='form-row row'>

                                                        <div class='w-full form-group required'>
                                                            <p>for test user : 4242 4242 4242 4242</p>
                                                            <label class='control-label'>Card Number</label> <input
                                                                autocomplete='off' class='form-control card-number'
                                                                type='text' value="4242 4242 4242 4242">

                                                        </div>

                                                    </div>



                                                    <div class='form-row row'>

                                                        <div class='w-50 form-group cvc required'>

                                                            <label class='control-label'>CVC</label> <input
                                                                autocomplete='off' class='form-control card-cvc'
                                                                placeholder='ex. 311' type='text' value="123">

                                                        </div>

                                                        <div class='w-50 pl-2 form-group expiration required'>

                                                            <label class='control-label'>Expiration Month</label> <input
                                                                class='form-control card-expiry-month' placeholder='MM'
                                                                type='text' value="12">

                                                        </div>

                                                        <div class='w-full form-group expiration required'>

                                                            <label class='control-label'>Expiration Year</label> <input
                                                                class='form-control card-expiry-year' placeholder='YYYY'
                                                                type='text' value="2028">

                                                        </div>

                                                    </div>













                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <button type="submit" class="site-btn">PLACE ORDER</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>



    <!-- Button trigger modal -->
@endsection


@section('script')
    <script>
        $(document).ready(function() {

            $('#payment2').click(function() {
                $('#card-details').toggle();
            });

        });
    </script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");



            $('form.require-validation').bind('submit', function(e) {

                var $form = $(".require-validation"),

                    inputSelector = ['input[type=email]', 'input[type=password]',

                        'input[type=text]', 'input[type=file]',

                        'textarea'
                    ].join(', '),

                    $inputs = $form.find('.required').find(inputSelector),

                    $errorMessage = $form.find('div.error'),

                    valid = true;

                $errorMessage.addClass('hide');



                $('.has-error').removeClass('has-error');

                $inputs.each(function(i, el) {

                    var $input = $(el);

                    if ($input.val() === '') {

                        $input.parent().addClass('has-error');

                        $errorMessage.removeClass('hide');

                        e.preventDefault();

                    }

                });



                if (!$form.data('cc-on-file')) {

                    e.preventDefault();

                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));

                    Stripe.createToken({

                        number: $('.card-number').val(),

                        cvc: $('.card-cvc').val(),

                        exp_month: $('.card-expiry-month').val(),

                        exp_year: $('.card-expiry-year').val()

                    }, stripeResponseHandler);

                }



            });


            function stripeResponseHandler(status, response) {

                if (response.error) {

                    $('.error')

                        .removeClass('hide')

                        .find('.alert')

                        .text(response.error.message);

                } else {

                    /* token contains id, last4, and card type */

                    var token = response['id'];



                    $form.find('input[type=text]').empty();

                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");

                    $form.get(0).submit();

                }

            }



        });
    </script>
@endsection
