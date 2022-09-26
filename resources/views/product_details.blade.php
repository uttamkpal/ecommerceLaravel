@extends('userLayout')

@section('content')
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large" src="{{ asset('user/img/product/'. $product->image) }}"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $product->title }}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">$ {{ $product->price }}</div>
                        <p>
                            {{ $product->description }}
                        </p>
                        <form action="{{ url('add_to_cart', $product->id) }}" method="post">
                            @csrf
                            <div class="product__details__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" name="count" value="1" min="1" >
                                    </div>
                                </div>
                            </div>
                            <button type="submit" value="add to cart" class="primary-btn">
                                add to cart <i class="fa fa-shopping-cart"></i>
                            </button>
                        </form>
                        <ul>
                            <li><b>Availability</b> <span>In Stock ({{ $product->quantity }})</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>
                                        {{ $product->description }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Reviews</h6>
                                    <p>
                                        Review list
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                
            
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item border ">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('user/img/product/'. $product->image) }}">
                        <ul class="featured__item__pic__hover">
                            {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                            <form action="{{ url('add_to_cart', $product->id) }}" method="post">
                                @csrf
                                <input type="number" name="count" value="1" min="1" > <br>
                                <button type="submit" value="add to cart" class="btn btn-warning w-full">
                                    add to cart <i class="fa fa-shopping-cart"></i>
                                </button>
                            </form>
                            
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="{{ url('product', $product->id) }}">{{ $product->title }}</a></h6>
                        <h5>${{ $product->price }}</h5>
                    </div>
                </div>
            </div>
            
            @endforeach
                
            </div>
        </div>
    </section>
@endsection
