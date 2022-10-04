@extends('layouts.front')

@section('content')
  <div class="container" style="margin-top: 100px; padding-bottom: 50px;">
    <div class="d-flex my-5 flex-column flex-wrap justify-content-center align-items-center text-center">
      <img loading="lazy" src="{{ asset('assets/image/hero-image.png') }}" alt="Hero Image" class="img-fluid"
        style="max-height: 300px;">
      <h4 class="display-5">Millions of movies, TV shows and people to discover. Explore now.</h4>
    </div>

    <div class="row justify-content-center align-items-center text-center mb-5">
      <div class="col-md-12">
        <h4 class="mb-4">Please choose category</h4>
        <a class="btn {{ Request::is('/') ? 'btn-primary' : 'btn-outline-primary' }}" href="/">All</a>
        @forelse ($categories as $category)
          <a class="btn {{ Request::is($category->category_slug) ? 'btn-primary' : 'btn-outline-primary' }}"
            href="/{{ $category->category_slug }}">{{ $category->category_name }}</a>
        @empty
          <a href="javascript:void(0)">No category found</a>
        @endforelse
      </div>
    </div>

    @isset($movies)
      <h4 class="mt-5 mb-3">Movies in category : {{ $category_choose->category_name }}</h4>
      <div class="row g-3">
        @forelse ($movies as $movie)
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img loading="lazy"
                src="{{ $movie['poster_path'] == null ? asset('assets/image/placeholder-image.png') : "https://www.themoviedb.org/t/p/w220_and_h330_face/$movie[poster_path]" }}"
                class="card-img-top" alt="{{ $movie['original_title'] }}">
              <div class="card-body">
                <p class="mb-0 user-select-none"><small class="text-muted">Movie name</small></p>
                <p class="card-text">
                  <a href="/detail/{{ $movie['id'] }}" class="h5 text-dark">{{ $movie['original_title'] }}</a>
                </p>
                <p class="mb-0 user-select-none"><small class="text-muted">Rating</small></p>
                <div class="bg-primary p-2 text-white text-center badge user-select-none">
                  {{ $movie['vote_average'] }}
                </div>
              </div>
            </div>
          </div>
        @empty
          <p class="text-center">No data found</p>
        @endforelse
      </div>
    @endisset

    @isset($now_playing)
      <h4 class="mt-5 mb-3">Now Playing</h4>
      <div class="row g-3">
        @forelse ($now_playing as $np)
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img loading="lazy"
                src="{{ $np['poster_path'] == null ? asset('assets/image/placeholder-image.png') : "https://www.themoviedb.org/t/p/w220_and_h330_face/$np[poster_path]" }}"
                class="card-img-top" alt="{{ $np['original_title'] }}">
              <div class="card-body">
                <p class="mb-0 user-select-none"><small class="text-muted">Movie name</small></p>
                <p class="card-text">
                  <a href="/detail/{{ $np['id'] }}" class="h5 text-dark">{{ $np['original_title'] }}</a>
                </p>
                <p class="mb-0 user-select-none"><small class="text-muted">Rating</small></p>
                <div class="bg-primary p-2 text-white text-center badge user-select-none">
                  {{ $np['vote_average'] }}
                </div>
              </div>
            </div>
          </div>
        @empty
          <p class="text-center">No data found</p>
        @endforelse
      </div>
    @endisset

    @isset($populars)
      <h4 class="mt-5 mb-3">Popular Movies</h4>
      <div class="row g-3">
        @forelse ($populars as $popular)
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img loading="lazy"
                src="{{ $np['poster_path'] == null ? asset('assets/image/placeholder-image.png') : "https://www.themoviedb.org/t/p/w220_and_h330_face/$popular[poster_path]" }}"
                class="card-img-top" alt="{{ $popular['original_title'] }}">
              <div class="card-body">
                <p class="mb-0 user-select-none"><small class="text-muted">Movie name</small></p>
                <p class="card-text">
                  <a href="/detail/{{ $popular['id'] }}" class="h5 text-dark">{{ $popular['original_title'] }}</a>
                </p>
                <p class="mb-0 user-select-none"><small class="text-muted">Rating</small></p>
                <div class="bg-primary p-2 text-white text-center badge user-select-none">
                  {{ $popular['vote_average'] }}
                </div>
              </div>
            </div>
          </div>
        @empty
          <p class="text-center">No data found</p>
        @endforelse

      </div>
    @endisset

    @isset($top_rated)
      <h4 class="mt-5 mb-3">Top Rated</h4>
      <div class="row g-3">
        @forelse ($top_rated as $tp)
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img loading="lazy"
                src="{{ $np['poster_path'] == null ? asset('assets/image/placeholder-image.png') : "https://www.themoviedb.org/t/p/w220_and_h330_face/$tp[poster_path]" }}"
                class="card-img-top" alt="{{ $tp['original_title'] }}">
              <div class="card-body">
                <p class="mb-0 user-select-none"><small class="text-muted">Movie name</small></p>
                <p class="card-text">
                  <a href="/detail/{{ $tp['id'] }}" class="h5 text-dark">{{ $tp['original_title'] }}</a>
                </p>
                <p class="mb-0 user-select-none"><small class="text-muted">Rating</small></p>
                <div class="bg-primary p-2 text-white text-center badge user-select-none">
                  {{ $tp['vote_average'] }}
                </div>
              </div>
            </div>
          </div>
        @empty
          <p class="text-center">No data found</p>
        @endforelse
      </div>
    @endisset

    @isset($upcoming)
      <h4 class="mt-5 mb-3">Upcoming</h4>
      <div class="row g-3">
        @forelse ($upcoming as $up)
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <img loading="lazy"
                src="{{ $np['poster_path'] == null ? asset('assets/image/placeholder-image.png') : "https://www.themoviedb.org/t/p/w220_and_h330_face/$up[poster_path]" }} "
                class="card-img-top" alt="{{ $up['original_title'] }}">
              <div class="card-body">
                <p class="mb-0 user-select-none"><small class="text-muted">Movie name</small></p>
                <p class="card-text">
                  <a href="/detail/{{ $up['id'] }}" class="h5 text-dark">{{ $up['original_title'] }}</a>
                </p>
                <p class="mb-0 user-select-none"><small class="text-muted">Rating</small></p>
                <div class="bg-primary p-2 text-white text-center badge user-select-none">
                  {{ $up['vote_average'] }}
                </div>
              </div>
            </div>
          </div>
        @empty
          <p class="text-center">No data found</p>
        @endforelse
      </div>
    @endisset
  </div>
@endsection
