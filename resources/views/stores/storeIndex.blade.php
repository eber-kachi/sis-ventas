@extends('layouts.adminReports')

@section('content')
  <div class="row">
    <div class="col-sm-12">
      <div class="accordion" id="accordionExample">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link btn-block text-left " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fa fa-filter" aria-hidden="true"></i>
                <span>Busqueda por Categoria</span>
              </button>
            </h2>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <div class="panel-body">
                <ul class="nav nav-pills " id="tabs_2" role="tablist">
                  @foreach($categoryStore as $item)
                    <div class="col-lg-3 col-md-6">
                      <a  href="{{route('stores.store.indexStore',$item->id)}}" class="btn btn-icon-clipboard" role="button">
                        <div>
                          <span>{{$item->name}}</span>
                        </div>
                      </a>
                    </div>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card col-sm-12">
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
        <div class="float-left">
          <h4 class="heading-title">Tiendas</h4>
        </div>

        <div class="btn-group btn-group-sm float-right" role="group">
          <a href="{{route('stores.store.create')}}" class="btn btn-success mb-md-1" title="Editar Categoria">
            <span class="fas fa-pencil-alt" > Añadir Tienda</span>
          </a>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <div class="container">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">Tienda</th>
                <th scope="col" class="sort" data-sort="budget">Usuario</th>
                <th scope="col" class="sort" data-sort="budget">Correo Electronico</th>
                <th scope="col" class="sort" data-sort="status">Telefono</th>
                <th scope="col" class="sort" data-sort="status"></th>
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
                  <td> {{optional($item->user)->name}}</td>
                  <td> {{$item->email}}</td>
                  <td>{{$item->phone}}</td>
                  <td><a href="{{route('stores.store.edit',$item->id)}}" class="btn btn-primary mb-md-1" title="Editar Categoria">
                      <span class="fas fa-pencil-alt" ></span>
                    </a>
                  </td>
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

