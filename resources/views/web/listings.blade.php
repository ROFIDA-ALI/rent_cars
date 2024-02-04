<!DOCTYPE html>
<html lang="en">
  @include('web.includes.head')

<body>

  @include('web.includes.header')

  <div class="hero inner-page" style="background-image: url('{{ asset('assets/images/hero_1_a.jpg') }}');">

    <div class="container">
      <div class="row align-items-end ">
        <div class="col-lg-5">

          <div class="intro">
            <h1><strong>Listings</strong></h1>
            <div class="custom-breadcrumbs"><a href="{{route('index')}}">Home</a> <span class="mx-2">/</span> <strong>Listings</strong></div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="site-section bg-light">

    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <h2 class="section-heading"><strong>Car Listings</strong></h2>
          <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>    
        </div>
      </div>
      
      <div class="row">
        @foreach ($cars as $car)

        <div class="col-md-6 col-lg-4 mb-4">

          <div class="listing d-block  align-items-stretch">
            <div class="listing-img h-100 mr-4">
              <img src="{{ asset('assets/images/'.$car->image)}}" alt="Image" class="img-fluid">
            </div>
            <div class="listing-contents h-100">
              <h3>{{$car->carTitle}}</h3>
              <div class="rent-price">
                <strong>{{$car->price}}</strong><span class="mx-1">/</span>day
              </div>
              <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                <div class="listing-feature pr-4">
                  <span class="caption">Luggage:</span>
                  <span class="number">{{$car->luggage}}</span>
                </div>
                <div class="listing-feature pr-4">
                  <span class="caption">Doors:</span>
                  <span class="number">{{$car->doors}}</span>
                </div>
                <div class="listing-feature pr-4">
                  <span class="caption">Passenger:</span>
                  <span class="number">{{$car->passenger}}</span>
                </div>
              </div>
              <div>
                <p>{{$car->shortdescription}}</p>
                <p><a href="single/{{ $car->id }}" class="btn btn-primary btn-sm">Rent Now</a></p>
              </div>
            </div>

          </div>
        </div>
        @endforeach
       
        {{ $cars->links() }}     </div>

          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  







  @include('web.includes.footer')
</body>
</html>
