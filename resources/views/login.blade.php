@extends('master')

@section('content')
<section class="vh-100">
  <div class="container-fluid h-custom mb-5 mt-4">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://img.freepik.com/premium-vector/man-has-repaired-old-house-rent_701961-837.jpg?w=2000"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        @error('Auth-alert')
        <div class="alert alert-warning" role="alert">
          {{ $message }}
        </div>
        @enderror
        @error('custom-name')
        <div class="alert alert-warning" role="alert">
          {{ $message }}
        </div>
        @enderror
        <form action="/login" method="POST">
            @csrf
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-primary btn-floating mx-1">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>
            
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Email address</label>
            <input type="email" name="email" id="form3Example3" class="form-control  form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Enter a valid email address" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Password</label>
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Enter password" />
            
          </div>

          <div class="text-center text-lg-start mt-2 pt-2">
            <button type="submit" class="btn btn-primary btn-lg">Login</button>
            
            <p class="fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
@endsection