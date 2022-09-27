@extends('userLayout')


@section('content')
    
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                                @foreach ($cartdata as $cart)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="img/cart/cart-1.jpg" alt="">
                                        <h5>{{ $cart->product->title }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{ $cart->product->price }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                {{ $cart->count }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        ${{ $cart->product->price * $cart->count }}
                                        <?php $total = $total + ($cart->product->price * $cart->count);?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{ url('cart/delete',$cart->id) }}"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ url('/') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span>${{ $total }}</span></li>
                            <li>Total <span>${{ $total }}</span></li>
                        </ul>
                        <a href="{{ url('check-out') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
