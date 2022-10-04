@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header bg-primary text-white d-flex flex-wrap align-items-center">
            <h4 class="mb-0">List of Categories</h4>
            <button class="ms-auto btn btn-success" data-bs-toggle="modal" data-bs-target="#addCategoryModal">Add
              Categories</button>
          </div>
          <div class="card-body  p-3">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <th>#</th>
                  <th>Category Name</th>
                  <th>Category Slug</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @forelse ($categories as $category)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $category->category_name }}</td>
                      <td>{{ $category->category_slug }}</td>
                      <td>
                        <button type="button" data-bs-toggle="modal"
                          data-bs-target="#editCategoryModal{{ $category->id }}" class="btn btn-dark m-1 btn-sm"><i
                            class="fa fas fa-pencil me-1"></i>Edit</button>
                        <form action="{{ route('admin.category.destroy', $category->id) }}" class="d-inline"
                          method="post">
                          @csrf()
                          @method('DELETE')
                          <button class="btn btn-sm btn-danger m-1" type="submit"><i
                              class="fa fas fa-trash me-1"></i>{{ __('Delete') }}</button>
                        </form>
                      </td>
                    </tr>

                    <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1"
                      aria-labelledby="editCategoryModal{{ $category->id }}Label" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="editCategoryModal{{ $category->id }}Label">
                              {{ __('Edit Data Category') }}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                            <div class="modal-body">
                              @csrf
                              @method('PUT')
                              <input type="hidden" name="old_slug" value="{{ $category->category_slug }}">
                              <div class="row mb-3">
                                <label for="update_category_name"
                                  class="col-md-4 col-form-label text-md-end">{{ __('Category Name') }}</label>

                                <div class="col-md-6">
                                  <input id="update_category_name" type="text"
                                    class="form-control @error('update_category_name') is-invalid @enderror"
                                    name="update_category_name" required value="{{ $category->category_name }}"
                                    autofocus>

                                  @error('update_category_name')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="update_category_slug"
                                  class="col-md-4 col-form-label text-md-end">{{ __('Category Slug') }}</label>

                                <div class="col-md-6">
                                  <input id="update_category_slug" type="update_category_slug"
                                    class="form-control @error('update_category_slug') is-invalid @enderror"
                                    name="update_category_slug" value="{{ $category->category_slug }}" required>

                                  @error('update_category_slug')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                              </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">
                                {{ __('Save') }}
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  @empty
                    <tr>
                      <td colspan="4">{{ __('No data found.') }}</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                </tfoot>
              </table>
              {{ $categories->links() }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addCategoryModalLabel">{{ __('Add Category') }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{ route('admin.category.store') }}">
          <div class="modal-body">
            @csrf
            <div class="row mb-3">
              <label for="category_name" class="col-md-4 col-form-label text-md-end">{{ __('Category Name') }}</label>

              <div class="col-md-6">
                <input id="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror"
                  name="category_name" required value="{{ old('category_name') }}" autofocus>

                @error('category_name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="category_slug" class="col-md-4 col-form-label text-md-end">{{ __('Category Slug') }}</label>

              <div class="col-md-6">
                <input id="category_slug" type="category_slug"
                  class="form-control @error('category_slug') is-invalid @enderror" name="category_slug"
                  value="{{ old('category_slug') }}" required>

                @error('category_slug')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">
              {{ __('Save') }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
