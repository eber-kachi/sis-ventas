@extends('layouts.adminReports')

@section('content')

      <div class="col">
        <div class="card">
          <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">{{ !empty($category->name) ? $category->name : 'Category' }}</h3>
            </div>
            <div class="card-body">
              <form method="POST" action="{{ route('categories.category.update', $category->id) }}" id="edit_category_form" name="edit_category_form" accept-charset="UTF-8" class="form-horizontal @error('name') is-invalid @enderror">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @error('name')
                <ul class="alert alert-danger">
                  <li>{{ $message }}</li>
                </ul>
                @enderror
                @include ('categories.form', [
                                            'category' => $category,
                                          ])

                <div class="form-group">
                  <div class="col-md-offset-2 col-md-10">
                    <input class="btn btn-primary" type="submit" value="Actualizar">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
@endsection
