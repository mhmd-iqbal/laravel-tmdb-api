@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{ __('You are logged in!') }}
            <div class="row">
              <div class="col-sm-6 col-md-6">
                <div class="card shadow-sm my-4 p-4">
                  <div class="row justify-content-center text-center align-items-center">
                    <div class="col-lg-6">
                      <i class="fa fas fa-folder mb-1" style="font-size: 30px;"></i>
                      <p class="mb-0">
                        Total Categories
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <h3 class="display-4 mb-0">{{ $categories_count }}</h3>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-6">
                <div class="card shadow-sm my-4 p-4">
                  <div class="row justify-content-center text-center align-items-center">
                    <div class="col-lg-6">
                      <i class="fa fas fa-users mb-1" style="font-size: 30px;"></i>
                      <p class="mb-0">
                        Total Users
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <h3 class="display-4 mb-0">{{ $users_count }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
