@extends('layouts.adminReports')

@section('content')
  <div class="col-sm-8">
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
      <div class="card-header">
        <a href="{{route('stores.store.create')}}" class="btn btn-success mb-md-1" title="Editar Categoria">
          <span class="fas fa-pencil-alt" aria-hidden="true">Anadir Tienda</span>
        </a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="container">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">Tienda</th>
                <th scope="col" class="sort" data-sort="budget">Usuario</th>
                <th scope="col" class="sort" data-sort="status">Telefono</th>
                <th scope="col" class="sort" data-sort="status"></th>
              </tr>
              </thead>
              <tbody class="list">
              @foreach($store as $item)
                <tr>
                  <th scope="row">
                    <div class="media align-items-center">
                      <div class="media-body">
                        <a href=""><span class="name mb-0 text-sm">{{$item->name}}</span></a>
                      </div>
                    </div>
                  </th>
                  <td>{{$item->user}}</td>
                  <td>{{$item->phone}}</td>
                  <td>
                    <form method="POST" action="{!! route('stores.store.destroy', $item->id) !!}" accept-charset="UTF-8">
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
  </div>
  <div class="col-sm-4">
    <div class="card card-responsive">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0">Categoria</h3>
        <p><a href="{{route('stores.store.index')}}">ver todo</a></p>
      </div>
      <!-- Light table -->
      <div class="panel panel-default">
        <div class="panel-body">
          @foreach($categoryStore as $item)
            <ul class="list-group">
              <li class="list-group-item "><a href="{{route('stores.store.indexStore',$item->id)}}">{{$item->name}}</a></li>
            </ul>
          @endforeach
        </div>
      </div>
      <!-- Card footer -->
    </div>
  </div>
@endsection
@section('script')
  <script>
    $(document).ready(function() {
      $('#myTable').DataTable( {
        "lengthMenu": [[7,10, 25, 50, -1], [7,10, 25, 50, "All"]]
      } );
    } );
  </script>
@endsection

