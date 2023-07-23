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
  <meta name="csrf-token" content="{{ csrf_token() }}">
 
  <title>Minics</title>


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
 
  {{-- font-awesome --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous"/>
  {{-- google font awesome --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&family=Roboto:wght@100;400;500;700&family=Spectral:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600&display=swap" rel="stylesheet">

  {{-- // font awesome --}}
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  
</head>

<body>

  <div class="hero_area"  style="font-family: 'Roboto', sans-serif;">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call : {{$ui->phone}}
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
            <div class="user_option_box" style="margin-right:30px">
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
                             <i class="fa fa-sign-out"  style="color: #f4e00b;"></i>
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
              <a href="{{ url('/cart1') }}" class="cart-link" id="cartLink">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>Cart</span>
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
            <a class="navbar-brand" href="/">
              <span>
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
                    @if(Auth::check())
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
    
     
  @yield('content')
    
    <!-- end slider section -->
  </div>


  <!-- product section -->



  <!-- end product section -->

  <!-- about section -->

  

  <!-- end about section -->

  <!-- why us section -->



  <!-- end why us section -->


  <!-- client section -->


  <!-- end client section -->

  <!-- info section -->
  <section class="info_section " style="font-family: 'Roboto', sans-serif;">
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
        <div class="col">
          <div class="info_info" style="margin-left:70px">
            <h5>
              Information
            </h5>
            <p>
              {{$ui->information}}
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links" style=" margin-left:120px">
            <h5>
              Useful Link
            </h5>
            <ul>
              <li>
                <a href="{{url('/')}}">
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
                <a href="{{asset('/testimonial')}}">
                 Testimonial
                </a>
              </li>
            </ul>
          </div>
        
        </div>
        <div class="col-md-3  ">
          <div class="info_form " >
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" ></i>
              </a>
              <a href="">
                <i class="fa fa-instagram"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" ></i>
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

  <!-- jQery -->
  <script src="{{asset('assets/frontend/js/jquery-3.4.1.min.js')}}"></script>
  <!-- bootstrap js -->
  <script src="{{asset('assets/frontend/js/bootstrap.js')}}"></script>
  <!-- custom js -->
  <script src="{{asset('assets/frontend/js/custom.js')}}"></script>
  {{-- //sweetmessage --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(Session('status'))

    <script>
      swal("{{Session('status')}}");
    </script>

    @endif

@yield('script')

</body>

</html>
  

