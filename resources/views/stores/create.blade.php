@extends('layouts.adminReports')

@section('content')
  <div class="col-md-10">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3>Nueva Tienda</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('stores.store')}}" accept-charset="UTF-8" id="create_category_form" name="create_category_form" class="form-horizontal">
          {{ csrf_field() }}
          @include ('stores.form', [
                                      'category' => null,
                                    ])
          <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
              <input class="btn btn-primary" type="submit" value="Guardar">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection


