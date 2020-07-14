@extends('layouts.adminReports')

@section('content')
      <div class="col-sm-5">
        <div class="card card-responsive">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Nueva Categoria</h3>
          </div>
          <!-- Light table -->
          <div class="panel panel-default">
            <div class="panel-body">
              <form method="POST" action="{{ route('categories.category.store') }}" accept-charset="UTF-8" id="create_category_form" name="create_category_form" class="form-horizontal @error('name') is-invalid @enderror">
                {{ csrf_field() }}
                @error('name')
                <ul class="alert alert-danger">
                    <li>{{ $message }}</li>
                </ul>
                @enderror
                @include ('categories.form', [
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
          <!-- Card footer -->
        </div>
      </div>
      <div class="col-sm-7">
        <div class="card">
          <!-- Card header -->
          @if(Session::has('success_message'))
            <div class="alert alert-success">
              <span class="glyphicon glyphicon-ok"></span>
              {!! session('success_message') !!}

              <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="card-header border-0">
{{--            <h3 class="mb-0">Categoria</h3>--}}
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <div class="container">
              <table class="table align-items-center table-flush" id="myTable">
                <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Nombre</th>
                  <th scope="col" class="sort" data-sort="budget"></th>
                  <th scope="col" class="sort" data-sort="status"></th>
                </tr>
                </thead>
                <tbody class="list">
                @foreach($categories as $category)
                  <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                      <a href="{{ route('categories.category.edit', $category->id ) }}" class="btn btn-primary" title="Editar Categoria">
                        <span class="fas fa-pencil-alt" aria-hidden="true"></span>
                      </a>
                    </td>
                    <td>
                      <form method="POST" action="{!! route('categories.category.destroy', $category->id) !!}" accept-charset="UTF-8">
                        <input name="_method" value="DELETE" type="hidden">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" title="Eliminar Categoria" onclick="return confirm('Desea Eliminar?')">
                          <span class="	fas fa-trash-alt" aria-hidden="true"></span>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable( {
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
      } );
    } );
  </script>
@endsection
