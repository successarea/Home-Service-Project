@extends('master')

@section('content')
<div class="row">
<div class="col-md-3">
    
</div>
<div class="col-md-6">
    <div class="card mt-5 mb-5">
     <div class="card-body">
     <div class="alert alert-primary" role="alert">
        Fill In Information To Confirm Booking!
    </div>
     <form action="/confirmInfo" method="POST" class="mt-5">
            @csrf
            <div class="form-group">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter Your Name" class="form-control @error('name') is-invalid @enderror">
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
            <br><br>
            <div>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter Your Phone Number" class="form-control @error('phone') is-invalid @enderror">
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div> 
             
            <br><br>
            <div class="form-group">
                <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Your Address">{{ old('address') }}</textarea>
                @error('address')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br><br>
            <div class="form-group">
                <label>Payment Method</label><br><br>
                <input class="@error('payment') is-invalid @enderror" type="radio" value="KBZ Pay" name="payment"> <span>KBZ Pay</span><br><br>
                <input class="@error('payment') is-invalid @enderror" type="radio" value="Wave Pay" name="payment"> <span>Wave Pay</span><br><br>
                
            </div>
            <input type="hidden" name="booking_id" value="{{ $booking_id }}">
            
            <button type="submit" class="btn btn-success btn-sm">Submit</button><br><br>
        </form>
        <a href="/" class="btn btn-success"><<< Back Home</a>
     </div>   
    
    </div>
</div>
<div class="col-md-3"></div>
</div>

@endsection