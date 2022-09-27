<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
{{-- Mobile Menu Start --}}
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ url('/') }}"><h3>{{ $site->sitename }}</h3></a>
            {{-- <a href="{{ url('/') }}"><img src="user/img/logo.png" alt=""></a> --}}
        </div>
        <div class="humberger__menu__cart">
            <ul>
                {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                <li><a href=""{{ url('cart') }}""><i class="fa fa-shopping-bag"></i> <span>{{ $carts }}</span></a></li>
            </ul>
            {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
        </div>
        <div class="humberger__menu__widget">
            
            <div class="header__top__right__auth">
                <div class="header__top__right__auth flex">
                    @if (Route::has('login'))
                        <div class="sm:flex ">
                            @auth
                            <div class="relative">
                                <x-jet-dropdown align="right">
                                    <x-slot name="trigger">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                            <button class="flex text-sm  border-transparent rounded-fulltransition">
                                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                            </button>
                                        @else
                                            <span class="inline-flex rounded-md">
                                                <button type="button" class="inline-flex items-center border-transparent text-sm leading-4 font-medium  hover:text-gray-500 focus:outline-none transition">
                                                    {{ Auth::user()->name }}
            
                                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </span>
                                        @endif
                                    </x-slot>
                                    <div class="absolute left-4">
                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Account') }}
                                            </div>
                
                                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </x-jet-dropdown-link>
                                            @if ( Auth::user()->usertype == '1')
                                                <x-jet-dropdown-link href="{{ url('admin') }}">
                                                    {{ __('Dashboard') }}
                                                </x-jet-dropdown-link>
    
                                            @endif
                
                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                    {{ __('API Tokens') }}
                                                </x-jet-dropdown-link>
                                            @endif
                
                                            <div class="border-t border-gray-100"></div>
                
                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf
                
                                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                        @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-jet-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </div>
                                    
                                </x-jet-dropdown>
                            </div>
                            @else
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div id="mobile-menu-wrap">
            <nav class="mobile-menu">
                <ul>
                    <li class="active"><a href="{{ url("/") }}">Home</a></li>
                    <li class="active"><a href="{{ url('/order') }}">Orders</a></li>
                    <li><a href="{{ url('/shop') }}">Shop</a></li>
                    {{-- <li><a href="#">Pages</a>
                        <ul class="header__menu__dropdown">
                            <li><a href="{{ url('order') }}">Orders</a></li>
                            <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                            <li><a href="./checkout.html">Check Out</a></li>
                            <li><a href="./blog-details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li><a href="./blog.html">Blog</a></li> --}}
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About Us</a></li>
                </ul>
            </nav>
        </div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> {{ $site->email }}</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> {{ $site->email }}</li>
                                <li><i class="fa fa-phone"> {{ $site->phone }}</i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="{{ $site->facebook }}"><i class="fa fa-facebook"></i></a>
                                <a href="{{ $site->twitter }}"><i class="fa fa-twitter"></i></a>
                                <a href="{{ $site->linkedin }}"><i class="fa fa-linkedin"></i></a>
                                <a href="{{ $site->pinterest }}"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            
                            <div class="header__top__right__auth flex">
                                @if (Route::has('login'))
                                    <div class="sm:flex ">
                                        @auth
                                        <div class="ml-3 relative">
                                            <x-jet-dropdown align="right" width="48">
                                                <x-slot name="trigger">
                                                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                        <button class="flex text-sm  border-transparent rounded-fulltransition">
                                                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                        </button>
                                                    @else
                                                        <span class="inline-flex rounded-md">
                                                            <button type="button" class="inline-flex items-center border-transparent text-sm leading-4 font-medium  hover:text-gray-500 focus:outline-none transition">
                                                                {{ Auth::user()->name }}
                        
                                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    @endif
                                                </x-slot>
                        
                                                <x-slot name="content">
                                                    <!-- Account Management -->
                                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                                        {{ __('Manage Account') }}
                                                    </div>
                        
                                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                                        {{ __('Profile') }}
                                                    </x-jet-dropdown-link>
                                                    @if ( Auth::user()->usertype == '1')
                                                        <x-jet-dropdown-link href="{{ url('admin') }}">
                                                            {{ __('Dashboard') }}
                                                        </x-jet-dropdown-link>

                                                    @endif
                        
                                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                                            {{ __('API Tokens') }}
                                                        </x-jet-dropdown-link>
                                                    @endif
                        
                                                    <div class="border-t border-gray-100"></div>
                        
                                                    <!-- Authentication -->
                                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                                        @csrf
                        
                                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                                @click.prevent="$root.submit();">
                                                            {{ __('Log Out') }}
                                                        </x-jet-dropdown-link>
                                                    </form>
                                                </x-slot>
                                            </x-jet-dropdown>
                                        </div>
                                        @else
                                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><h2>{{ $site->sitename }}</h2></a>
                        {{-- <a href="{{ url('/') }}"><img src="user/img/logo.png" alt=""></a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/order') }}">Orders</a></li>
                            <li><a href="{{ url('/shop') }}">Shop</a></li>
                            {{-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> --}}
                            {{-- <li><a href="./blog.html">Blog</a></li> --}}
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">About Us</a></li>
                        </ul>
                        
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                            <li><a href="{{ url('cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{ $carts }}</span></a></li>
                        </ul>
                        {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    @yield('herosection')
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    {{-- <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                            <h5><a href="#">Fresh Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-2.jpg">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-3.jpg">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-4.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="img/categories/cat-5.jpg">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Categories Section End -->

    @yield('content')
    <!-- Featured Section Begin -->
    
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    {{-- <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-1.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    {{-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><h2>{{ $site->sitename }}</h2></a>
                            {{-- <a href="./index.html"><img src="img/logo.png" alt=""></a> --}}
                        </div>
                        <ul>
                            <li>Address: {{ $site->address }}</li>
                            <li>Phone: {{ $site->phone }}</li>
                            <li>Email: {{ $site->email }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="{{ $site->facebook }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ $site->instagram }}"><i class="fa fa-instagram"></i></a>
                            <a href="{{ $site->twitter }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{ $site->pinterest }}"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by {{ $site->sitename }}
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="user/img/payment-item.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('user/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('user/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('user/js/main.js') }}"></script>

   
    @yield('script')
   
</body>

</html>