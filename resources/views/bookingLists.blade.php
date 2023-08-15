@extends('master')

@section('content')
<div class="container">
    
        @foreach($services as $item)
    <div class="row service-divider">
        <div class="col-md-6">
        <img src="{{ $item->gallery }}" class="detail-img" alt="">
        </div>
        <div class="col-md-6">
            <h2>{{ $item->name }}</h2>
            <h5>Service Fee: ${{ $item->price }}</h5><br>
            <h5>Service Duration: {{ $item->Duration }}</h5>
            <br>
            <form action="/confirmBooking/{{ $item->booking_id }}" method="GET">
                @csrf
                
                <button class="btn btn-success">Comfirm Booking</button>
            </form>
            <br>
            <div>
                <a href="/cancelBookingList/{{ $item->booking_id }}">
                <button class="btn btn-danger">Cancel Booking</button>
                </a>
                
            </div>
        </div>
    </div>
        @endforeach
</div>
@endsection