@extends('layouts.adminReports')

@section('content')

      <div class="col">
        <div class="card">
          <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">{{ !empty($category->name) ? $category->name : 'Category' }}</h3>
            </div>
            <div class="card-body">

              @if ($errors->any())
                <ul class="alert alert-danger">
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              @endif

              <form method="POST" action="{{ route('categories.category.update', $category->id) }}" id="edit_category_form" name="edit_category_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('categories.form', [
                                            'category' => $category,
                                          ])

                <div class="form-group">
                  <div class="col-md-offset-2 col-md-10">
                    <input class="btn btn-primary" type="submit" value="Update">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
@endsection
