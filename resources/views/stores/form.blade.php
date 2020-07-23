<div class="form-row">
  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-10 ">
    <label for="inputState">Nombre</label>
    <input class="form-control " name="name" type="text" id="name" value="" minlength="1" maxlength="255"  placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block text-danger">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }} col-md-5">
    <label for="inputState">Usuario</label>
    <select class="js-example-basic-single form-control " name="user_id">
      @foreach($user as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group {{ $errors->has('categorie_store_id') ? 'has-error' : '' }} col-md-5">
    <label for="inputState">Categoria</label>
    <select id="inputState" class="js-example-basic-single form-control " name="categorie_store_id">
      @foreach($store as $key => $store)
        <option value="{{$key}}">{{$store}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }} col-md-10">
    <label for="inputState">Descripcion</label>
    <textarea class="form-control" rows="3" name="description" type="text" id="name" value="" minlength="1" maxlength="255"  placeholder="Enter name here..."></textarea>
    {!! $errors->first('description', '<p class="help-block text-danger">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}col-md-5">
    <label for="inputState">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email">
    {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} col-md-5">
    <label for="inputState">Phone</label>
    <input type="number" class="form-control" id="inputPassword4" name="phone">
    {!! $errors->first('phone', '<p class="help-block text-danger">:message</p>') !!}
  </div>
{{--  <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }} col-md-4">--}}
{{--    <label for="inputState">Ubicacion</label>--}}
{{--    <input type="text" class="form-control" id="inputPassword4" name="location">--}}
{{--    {!! $errors->first('location', '<p class="help-block text-danger">:message</p>') !!}--}}
{{--  </div>--}}
  <div class="form-group" hidden>
    <label for="exampleInputEmail1">Latitud</label>
    <input type="text" id="txtLat" class="form-control" style="color:red" name="lat"  aria-describedby="emailHelp">
    <small class="pull-left" style="font-size: 11px;color: #ff6d5e;" id="error-lat"></small>
  </div>

  <div class="form-group" hidden>
    <label for="exampleInputEmail1">Longitud</label>
    <input type="text" id="txtLng" class="form-control" style="color:red" name="lng"  aria-describedby="emailHelp">
    <small class="pull-left" style="font-size: 11px;color: #ff6d5e;" id="error-lng"></small>
  </div>
  <div class="form-group col-md-10" >
    <div id="map_canvas" style="width: auto; height: 300px;"></div>
  </div>
</div>

@section('script')

  <script src="{{asset('assets/js/main.js')}}"></script>
{{--  <script >--}}
{{--    // In your Javascript (external .js resource or <script> tag)--}}
{{--    $(document).ready(function() {--}}
{{--      $('.js-example-basic-single').select2();--}}
{{--    });--}}

{{--  //  maps--}}
{{--  </script>--}}

@endsection
