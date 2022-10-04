<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data = [
      'categories'  => Category::paginate(5)->fragment('categories'),
    ];

    // dd($data);
    return view('categories.index', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreCategoryRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreCategoryRequest $request)
  {
    $validatedData = $request->validated();
    $validatedData['category_slug'] = strtolower($validatedData['category_slug']);
    if (!Category::create($validatedData)) {
      return redirect()->back()->with('failed', 'Oops! something when wrong');
    }

    return redirect()->back()->with('success', 'Category added successfull');
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateCategoryRequest  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateCategoryRequest $request, Category $category)
  {
    $validatedData = $request->validated();
    $updateData = [];
    $updateData['category_name'] = $validatedData['update_category_name'];
    $updateData['category_slug'] = strtolower($validatedData['update_category_slug']);


    if (!Category::findOrFail($category->id)->update($updateData)) {
      return redirect()->back()->with('failed', 'Oops! something when wrong');
    }

    return redirect()->back()->with('success', 'Category updated successfull');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    Category::destroy($category->id);
    return redirect()->back()->with('success', 'Data deleted successfull');
  }
}
