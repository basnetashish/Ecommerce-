<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="{{asset('assets/frontend/images/fevicon.png')}}" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Electro</title>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/frontend/css/bootstrap.css')}}" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->
  <!-- font awesome style -->
  <link href="{{asset('assets/frontend/css/font-awesome.min.css')}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('assets/frontend/css/responsive.css')}}" rel="stylesheet" />
  {{-- //google --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caudex&family=Lato&family=Roboto:wght@100;300;400;500;700&family=Spectral:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">
</head>
<body>
  <div style="font-family: 'Roboto', sans-serif;">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call :{{$ui->phone}}
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Email : {{$ui->email}}
                </span>
              </a>
            </div>
            <form class="search_form" action="{{url('/product')}}" method="get">
             
              <input type="text" class="form-control" name="input" placeholder="Search here...">
                <a href="">
              <button class="" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
            </a>       
          </form>
            <div class="user_option_box">
             @if(Auth::check())
             <a href="" class="account-link">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                {{Auth::user()->name}}
              </span>
            </a>

            <a class="" href="{{ route('logout') }}"
            
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                             <i class="fa fa-sign-out"  style="color: #f4e00b;" aria-hidden="true"></i>
               {{ __('Logout') }}
           </a>
          
           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
           </form>
            @else
              <a href="{{url('/login')}}" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                 Login
                </span>
              </a>
            @endif
            <a href="{{url('/cart1')}}" class="cart-link {{ Request::is('cart1') ? 'active' : '' }}">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              <span>
                Cart
              </span>
              @if(Auth::check())
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-info cart-count">
                 @endif 
              </span> 
            </a>
            </div>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="/userhome">
              <span class="d-flex justify-content">
                {{$ui->company_name}}
              </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                  <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item {{ Request::is('product') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/product') }}">Product</a>
                </li>
                <li class="nav-item {{ Request::is('category') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/category') }}">Category</a>
                </li>
                <li class="nav-item {{ Request::is('placeorder') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/placeorder') }}">My Orders</a>
                </li>
                <li class="nav-item {{ Request::is('wishlist') ? 'active' : '' }}">
                  <a class="nav-link" href="{{ url('/wishlist') }}">Wishlist
                  @if(Auth::id())
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-info count-wishlist">
                    @endif
                  </span> 
                </a>
              </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Welcome to our shop
                    </h1>
                    <p>
                        Headphones come with many technical specifications, usually located on the back of the box of the headphones.
                    </p>
                    <a href="">
                      Read More
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('assets/frontend/images/headphone.jpg')}}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Welcome to our shop
                    </h1>
                    <p>
                     Designed with utmost patience and craftsmanship, the Mi NoteBook 14 is so beautiful that you can't help but notice it. Weighing just 1.5kg, the sleek unibody metal chassis and an anodized sandblasted coating makes your device sturdy and gives it a svelte look.
                    </p>
                    <a href="">
                      Read More
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('assets/frontend/images/mi.webp')}}" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      Welcome to our shop
                    </h1>
                    <p>
                   Our most awesome Galaxy A Series device yet, with a multi-lens camera for brilliant photos and video, smooth scrolling 120Hz display, and a fast-charging battery that just keeps going.
                    </p>
                    <a href="">
                      Read More
                    </a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="img-box">
                    <img src="{{asset('assets/frontend/images/smartphone.jpg')}}"alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="carousel_btn_box">
          <a class="carousel-control-prev" href="#customCarousel1" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel1" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div> --}}
      </div>
    </section>
    <!-- end slider section -->
  </div>
  <!-- product section -->
  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Trending Products
        </h2>
      </div>
      <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
              <img src="{{asset('assets/backend/product/'.$product->image)}}" alt="">
              <a href="{{url('products/'.$product->slug)}}" class="add_cart_btn">
                <span>
                  Add To Cart
                </span>
              </a>
            </div>
            <div class="detail-box">
              <h5>
                {{$product->name}}
              </h5>
              <div class="product_info">
                <h5>
                  <span>Rs.</span> {{$product->selling_price}}
                </h5>
                <div>
                    <span class="float-end float-right"><s style="color: red">{{$product->orginal_price}}</s></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
{{-- Category section --}}
<section class="product_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Popular Categories
      </h2>
    </div>
    <div class="row">
      @foreach($categories as $category)
      <div class="col-sm-6 col-lg-4">
        <div class="box">
          <div class="img-box">
            <img src="{{asset('/assets/category/'.$category->image)}}" alt="">
            <a href="{{url('/category/'.$category->slug)}}" class="add_cart_btn">
              <span>
               View Products
              </span>
            </a>
          </div>
          <div class="detail-box">
            <h5>
              {{$category->name}}
            </h5>
            <div class="product_info">
             <small>
              {{$category->description}}  
            </small> 
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
{{-- category section ends --}}
  <!-- about section -->
  <div class="heading_container heading_center">
    <br>
    <h2>About Us </h2>
    <br>
  </div>
  <section class="about_section" style="background-color:#938ba1">
    <div class="container-fluid  ">
      <div class="row">
        <div class="col-md-5 ml-auto">
          <div class="detail-box pr-md-3">
            <div class="heading_container">
              <h2>
                We Provide Best For You
              </h2>
            </div>
            <p>
              Electro Wordpress theme is a WooCommerce WordPress theme designed and developed for use with WordPress 4.8 or higher. The code was written to be backwards compatible where possible, however we recommend you use the current WP version when possible. If you are not using WordPress 4.8 or higher and can upgrade your site we recommend you do this before installation.
            <a href="">
              Read More
            </a>
          </div>
        </div>
        <div class="col-md-7 px-0">
          <div class="img-box">
            <img src="{{asset('assets/frontend/images/background.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- client section -->
<br>
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          What Says Our Customers
        </h2>
      </div>
    </div>
    <div class="client_container ">
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                    long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look
                  </p>
                </div>
                <div class="client-id">
                  <div class="img-box">
                    <img src="{{asset('assets/frontend/images/client.jpg')}}" height="100px;" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      James Dew
                    </h5>
                    <h6>
                      Photographer
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                    long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look
                  </p>
                </div>
                <div class="client-id">
                  <div class="img-box">
                    <img src="{{asset('assets/frontend/images/client.jpg')}}" height="100px;" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      James Dew
                    </h5>
                    <h6>
                      Photographer
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                    long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look
                  </p>
                </div>
                <div class="client-id">
                  <div class="img-box">
                    <img src="{{asset('assets/frontend/images/client.jpg')}}" height="100px;" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      James Dew
                    </h5>
                    <h6>
                      Photographer
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <span>
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <span>
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              <a href="" class="navbar-brand">
                <span>
                  {{$ui->company_name}}
                </span>
              </a>
            </h5>
            <p>
              <i class="fa fa-map-marker" aria-hidden="true"></i>
              {{$ui->address}}
            </p>
            <p>
              <i class="fa fa-phone" aria-hidden="true"></i>
             {{$ui->phone}}
            </p>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              {{$ui->email}}
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Information
            </h5>
            <p>
            {{$ui->information}}
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links  " style="margin-left: 120px">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="#">
                  Home
                </a>
              </li>
              <li>
                <a href="{{url('/about')}}">
                  About
                </a>
              </li>
              <li>
                <a href="{{url('/product')}}">
                  Products
                </a>
              </li>
              <li>
                <a href="{{url('/category')}}">
                  Category
                </a>
              </li>
             
              <li>
                <a href="{{url('/testimonial')}}">
                  Testimonial
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"  ></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end info_section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
       Thanks for choosing us!!
      </p>
    </div>
  </footer>
  <!-- footer section -->
  </div>
  <!-- jQery -->
  <script src="{{asset('assets/frontend/js/jquery-3.4.1.min.js')}}"></script>
  <!-- bootstrap js -->
  <script src="{{asset('assets/frontend/js/bootstrap.js')}}"></script>
  <!-- custom js -->
  <script src="{{asset('assets/frontend/js/custom.js')}}"></script>
</body>
</html>




