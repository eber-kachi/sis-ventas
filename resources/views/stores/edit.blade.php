@extends('layouts.adminReports')

@section('content')

  <div class="col">
    <div class="card">
      <!-- Card header -->
      <div class="card-header border-0">
        <h3 class="mb-0">Tienda: {{ $stores->name }}</h3>
      </div>
      <div class="card-body">
        <form method="POST" action="{{route('stores.store.update',$stores->id)}}" id="edit_category_form" name="edit_category_form" accept-charset="UTF-8" class="form-horizontal @error('name') is-invalid @enderror">
          {{ csrf_field() }}
          <input name="_method" type="hidden" value="PUT">
          <div class="form-row">
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-10">
              <label for="inputState">Nombre</label>
              <input class="form-control" name="name" type="text" id="name" value="{{$stores->name}}" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
              {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }} col-md-5">
              <label for="inputState">Usuario</label>
              <select class="js-example-basic-single form-control " name="user_id">
                @foreach($relation as $item)
                  <option value="{{$item->user_id}}" selected >{{$item->name}}</option>
                @endforeach
                @foreach($user as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group {{ $errors->has('categorie_store_id') ? 'has-error' : '' }} col-md-5">
              <label for="inputState">Categoria</label>
              <select id="inputState" class="js-example-basic-single form-control " name="categorie_store_id">
                @foreach($relation as $item)
                  <option value="{{$item->categorie_store_id}}"  selected>{{$item->category}}</option>
                @endforeach
                @foreach($store as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }} col-md-10">
              <label for="inputState">Descripcion</label>
              <textarea class="form-control" rows="3" name="description" type="text" id="name" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">{{$stores->description}}</textarea>
              {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}col-md-3">
              <label for="inputState">Email</label>
              <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$stores->email}}">
              {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} col-md-3">
              <label for="inputState">Phone</label>
              <input type="number" class="form-control" id="inputPassword4" name="phone" value="{{$stores->phone}}">
              {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }} col-md-4">
              <label for="inputState">Ubicacion</label>
              <input type="text" class="form-control" id="inputPassword4" name="location" value="{{$stores->location}}">
              {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
            </div>
          </div>
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
@section('script')
  <script >
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
  </script>
@endsection
