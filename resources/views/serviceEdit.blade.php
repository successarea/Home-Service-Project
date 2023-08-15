@extends('master')

@section('content')
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              
                <form action="/serviceUpdate/{{ $data->id }}" method="POST">
                    @csrf
                    <h2 class="text-center">Service Update Form</h2>
                    <div class="form-group">
                        <label for="name" class="form-label">Service Name</label>
                        <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="name" value="{{ $data->name ?? old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    <br>
                    <div class="form-group">
                        <label for="gallery" class="form-label">Gallery</label>
                        <input name="gallery" value="{{ $data->gallery ?? old('gallery') }}" type="text" class="form-control  @error('gallery') is-invalid @enderror" id="gallery" >
                        @error('gallery')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    <br>
                    <div class="form-group">
                        <label for="price" class="form-label">Price</label>
                        <input name="price" value="{{ $data->price ?? old('price') }}" type="text" id="price" class="form-control  @error('price') is-invalid @enderror">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    <br>
                    <div class="form-group">
                        <label for="duration" class="form-label">Duration</label>
                        <input name="duration" value="{{ $data->Duration ?? old('duration') }}" type="text" id="duration" class="form-control  @error('duration') is-invalid @enderror">
                        @error('duration')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    <br>
                    <div class="form-group">
                        <label for="category" class="form-label">Service Category</label>
                        <select name="service_id" value="{{ $data->service_id ?? old('service_id') }}" class="form-control @error('service_id') is-invalid @enderror" id="category">
                        
                        @error('service_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @foreach($services as $service)
                        <option value="{{ $service['id'] }}" @if($service['id'] == $data->service_id) selected @endif>{{ $service['name'] }}</option>
                        
                        @endforeach
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

