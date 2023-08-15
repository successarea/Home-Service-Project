<?php
use App\Http\Controllers\ServiceController;

$total=0;
if(Auth::check()){
    $total = ServiceController::bookCount();
}

?>

<nav class="navbar navbar-expand-lg navbar-light bg-secondary">
    <div class="ms-3 mb-2 text-white">
    <i class="fa-solid fa-briefcase fa-beat-fade "></i><a class="btn text-white" href="/">Home Service Center</a> 
    </div>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse ms-3" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto nav-bar">
        <li class="nav-item active">
            <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
        <div class=" me-5 text-white"><i class="fa-sharp fa-solid fa-phone fa-beat-fade"></i> +95 9345992837</div> 
        </li>
        
        <li class="nav-item">
            <div class=" text-white" ><i class="fa-solid fa-envelope fa-beat-fade"></i> homeservice@gmail.com</div>
        </li>  
        
        
        </ul>
        @if(Auth::check())
        <a class=" text-white  btn btn-outline-dark" href="/bookList">Booking({{ $total }})</a>
        @endif
        <form action="/search" class="d-flex ms-1" role="search" method="POST">
            @csrf
            <input name="query" class="form-control me-1 search-box" type="search" name="query" placeholder="Search" aria-label="Search">
            
            <button class="btn btn-dark btn-sm">Search</button>
        </form>
    </div>
    
</nav>