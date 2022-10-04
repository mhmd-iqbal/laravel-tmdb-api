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

    @isset($movie)
      <h4 class="mt-5 mb-3"></h4>
      <div class="row g-5">
        <div class="col-md-4">
          <img loading="lazy"
            src="{{ $movie['poster_path'] == null ? asset('assets/image/placeholder-image.png') : "https://www.themoviedb.org/t/p/w220_and_h330_face/$movie[poster_path]" }}"
            class="img-fluid" alt="{{ $movie['original_title'] }}" style="min-width: 100%;">
        </div>
        <div class="col-md-8">
          <p class="mb-0 user-select-none"><small class="text-muted">Movie name</small></p>
          <p class="card-text">
            <a href="/detail/{{ $movie['id'] }}" class="h5 text-dark">{{ $movie['original_title'] }}</a>
          </p>
          <p class="mb-0 user-select-none"><small class="text-muted">Rating</small></p>
          <div class="bg-primary mb-2 p-2 text-white text-center badge user-select-none">
            {{ $movie['vote_average'] }}
          </div>
          <p class="mb-0 user-select-none"><small class="text-muted">Genres</small></p>
          <p class="card-text mb-0">
            @foreach ($movie['genres'] as $genre)
              <div class="badge bg-secondary p-2 user-select-none">{{ $genre['name'] }}</div>
            @endforeach
          </p>
          <p class="mb-0 user-select-none"><small class="text-muted">Description</small></p>
          <p class="card-text user-select-none">
            {{ $movie['overview'] }}
          </p>
          <p class="mb-0 user-select-none"><small class="text-muted">Release Date</small></p>
          <p class="card-text user-select-none">
            {{ date('d-m-Y', strtotime($movie['release_date'])) }}
          </p>
        </div>
      </div>
    @endisset

  </div>
@endsection
