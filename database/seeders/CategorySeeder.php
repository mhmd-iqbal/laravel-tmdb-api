<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $categories = [
      [
        'category_name' => 'Now Playing',
        'category_slug'  => 'now_playing',
      ],
      [
        'category_name' => 'Top Rated',
        'category_slug'  => 'top_rated',
      ],
      [
        'category_name' => 'Upcoming',
        'category_slug'  => 'upcoming',
      ],
      [
        'category_name' => 'Popular',
        'category_slug'  => 'popular',
      ],
    ];

    foreach ($categories as $category) {
      Category::create(
        [
          'category_name' => $category['category_name'],
          'category_slug' => $category['category_slug'],
          'created_at'    => Carbon::now(),
          'updated_at'    => Carbon::now(),
        ],
      );
    }
  }
}
