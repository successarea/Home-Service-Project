@extends('master')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-dark">

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

  
  <div class="collapse navbar-collapse row" id="navbarSupportedContent">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <ul class="navbar-nav">
        @foreach($services as $service)
        <li class="nav-item me-2">
            <a class="nav-link btn btn-warning text-white" href="/showServiceDetail/{{ $service['id'] }}">{{ $service['name'] }}<span class="sr-only">(current)</span></a>
        </li>
        <!-- <li class="nav-item me-2">
            <a class="nav-link btn btn-warning text-white" href="#"></a>
        </li>
        <li class="nav-item me-2">
            <a class="nav-link btn btn-warning text-white" href="#">Home Cleaing Service</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn btn-warning text-white" href="#">Pest Controlling Service</a>
        </li> -->
        @endforeach
        </ul>
    </div>
    <div class="col-md-3">

    <ul class="navbar-nav login-reg">
    @auth
  
    <li class="nav-item dropdown ">
      <a class="nav-link dropdown-toggle text-white btn btn-warning" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ Auth::user()->name }}
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu user-dropdown">
      @if(Auth::user()->role == 'admin')
      <li><a class="dropdown-item btn btn-warning text-success" href="/addNewService">Add New Service</a></li><br>
      <li><a class="dropdown-item btn btn-warning text-success" href="">Edit Service Info</a></li><br>
      @endif
      <li><a class="dropdown-item btn btn-warning text-success" href="/logout">Log Out</a></li>
      </ul>
    </li>
    </ul>
    @else
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link text-white btn btn-warning" href="login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white btn btn-warning" href="register">Register</a>
        </li>
      </ul>
    @endauth
        
      
    </div>
  </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide slide-bg" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
    
    
  </div>
  <div class="carousel-inner">
  @foreach($services as $service)
    <div class="carousel-item {{ $service['id'] == 1?'active':''}}">
      <img src="{{ $service['image'] }}" class="img-item w-100"  alt="...">
    </div>
  @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endsection