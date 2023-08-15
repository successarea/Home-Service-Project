@extends('master')

@section('content')
<div class="container">
    
        @foreach($search_services as $service)
    <div class="row service-divider">
        <div class="col-md-6">
        <img src="{{ $service['gallery'] }}" class="detail-img" alt="">
        </div>
        <div class="col-md-6">
            <h2>{{ $service['name'] }}</h2>
            <h5>Service Fee: ${{ $service['price'] }}</h5><br>
            <h5>Service Duration: {{ $service['Duration'] }}</h5>
            <br>
            <a href="" class="btn btn-success">Book</a>
        </div>
    </div>
        @endforeach
</div>
@endsection