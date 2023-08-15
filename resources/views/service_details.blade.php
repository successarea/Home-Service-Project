@extends('master')

@section('content')
<div class="container">
    
        @foreach($service_details as $detail)
    <div class="row service-divider">
        <div class="col-md-6">
        <img src="{{ $detail['gallery'] }}" class="detail-img" alt="">
        </div>
        <div class="col-md-3">
            <h2>{{ $detail['name'] }}</h2>
            <h5>Service Fee: ${{ $detail['price'] }}</h5><br>
            <h5>Service Duration: {{ $detail['Duration'] }}</h5>
            <br>
            <form action="/add_to_booking", method="POST">
                @csrf
                <input type="hidden" name="service_id" value="{{ $detail['id'] }}">
                <button class="btn btn-success">Add To Booking List</button>
            </form>
            
        </div>
        <div class="col-md-3">
            <a href="/serviceEdit/{{ $detail['id'] }}" class="btn btn-success float-end">Edit Service Details</a>
            <br><br>
            <a href="/serviceDelete/{{ $detail['id'] }}" class="btn btn-danger float-end">Delete Service</a>
        </div>
    </div>
        @endforeach
</div>
@endsection