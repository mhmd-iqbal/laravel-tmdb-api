<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
    $populars = $this->getMoviesByCategory('popular');
    $now_playing = $this->getMoviesByCategory('now_playing');
    $top_rated = $this->getMoviesByCategory('top_rated');
    $upcoming = $this->getMoviesByCategory('upcoming');


    $data = [
      'populars' => $populars,
      'now_playing' => $now_playing,
      'top_rated' => $top_rated,
      'upcoming' => $upcoming,
      'categories'  => Category::all(),
    ];

    return view('front.index', $data);
  }

  function getMovie($id)
  {
    $response = Http::withToken(config('services.tmdb.token'))
      ->get('https://api.themoviedb.org/3/movie/' . $id, [
        'api_key' => config('services.tmdb.token'),
      ])
      ->json();

    return $response;
  }

  function getMoviesByCategory($category)
  {
    $response = Http::withToken(config('services.tmdb.token'))
      ->get('https://api.themoviedb.org/3/movie/' . $category, [
        'api_key' => config('services.tmdb.token'),
        'page'  => 1,
      ])
      ->json('results');

    return $response;
  }

  public function show($category)
  {
    $movies = Http::withToken(config('services.tmdb.token'))
      ->get('https://api.themoviedb.org/3/movie/' . $category, [
        'api_key' => config('services.tmdb.token'),
        'page'  => 1,
      ])
      ->json('results');
    $getCategory = Category::where('category_slug', $category)->first();
    $data = [
      'movies' => $movies,
      'category_choose'  => $getCategory,
      'categories'  => Category::all(),
    ];

    return view('front.index', $data);
  }

  public function detail($id)
  {
    $movie = $this->getMovie($id);
    // dd($movie);
    $data = [
      'movie' => $movie,
      'categories'  => Category::all(),
    ];

    return view('front.detail', $data);
  }
}
