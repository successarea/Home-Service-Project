@extends('master')

@section('content')
<div class="container">
    
        @foreach($receipts as $item)
    <div class="row service-divider">
        <div class="col-md-6">
        <img src="{{ $item->gallery }}" class="detail-img" alt="">
        </div>
        <div class="col-md-6">
            
            <table class="table">
                <tbody>
                    <tr>
                        <td>Service Type</td>
                        <td>{{ $item->name}}</td>
                    </tr>
                    <tr>
                        <td>Service Fee</td>
                        <td>${{ $item->price}}</td>
                    </tr>
                    <tr>
                        <td>Service Duration</td>
                        <td>{{ $item->Duration }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $item->client_name}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>{{ $item->address}}</td>
                    </tr>
                    <tr>
                        <td>Phone Number</td>
                        <td>{{ $item->phone}}</td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td>{{ $item->payment_method }}</td>
                    </tr>
                    <tr>
                        <td>Confirmation</td>
                        <td>Service Fee Payment Done</td>
                    </tr>
                </tbody>
            </table>
            <a href="/" class="btn btn-success"><<< Back Home</a>
        </div>
    </div>
        @endforeach
</div>
@endsection