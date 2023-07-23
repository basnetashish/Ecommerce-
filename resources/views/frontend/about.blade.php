@extends('frontend.mainpage')

@section('content')
 
<div class="heading_container heading_center" style="font-family: 'Roboto', sans-serif;">
  <br>
  <h2>About Us </h2>
  <br>
</div>
<section class="about_section" style="background-color:#938ba1" style="font-family: 'Roboto', sans-serif;">
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
              Totam architecto rem beatae veniam, cum officiis adipisci soluta perspiciatis ipsa, expedita maiores quae accusantium. Animi veniam aperiam, necessitatibus mollitia ipsum id optio ipsa odio ab facilis sit labore officia!
              Repellat expedita, deserunt eum soluta rem culpa. Aut, necessitatibus cumque. Voluptas consequuntur vitae aperiam animi sint earum, ex unde cupiditate, molestias dolore quos quas possimus eveniet facilis magnam? Vero, dicta.
            </p>
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

@endsection