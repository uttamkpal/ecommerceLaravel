
@extends('userLayout')
@section("herosection")
    @include('inc.herosection')
@endsection

@section("content")

<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Best Products</h2>
                </div>
        
                
            </div>
        </div>
        <div class="row featured__filter">
            @foreach ($products as $product)
                
            
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item border ">
                    <div class="featured__item__pic set-bg" data-setbg="{{ asset('user/img/product/'. $product->image) }}">
                        <ul class="featured__item__pic__hover">
                            {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li> --}}
                            <form action="{{ url('add_to_cart', $product->id) }}" method="post">
                                @csrf
                                <input type="number" name="count" value="1" min="1" > <br>
                                <button type="submit" value="add to cart" class="btn btn-warning">
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