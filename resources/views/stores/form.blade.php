<div class="form-row">
  <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-10">
    <label for="inputState">Nombre</label>
    <input class="form-control" name="name" type="text" id="name" value="" minlength="1" maxlength="255" required="true" placeholder="Enter name here...">
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }} col-md-5">
    <label for="inputState">Usuario</label>
    <select class="form-control js-example-basic-single"  name="user_id">
      @foreach($user as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
      @endforeach
    </select><br>
  </div>
  <div class="form-group {{ $errors->has('categorie_store_id') ? 'has-error' : '' }} col-md-5">
    <label for="inputState">Categoria</label>
    <select id="inputState" class="js-example-basic-single form-control " name="categorie_store_id">
      @foreach($store as $item)
        <option value="{{$item->id}}">{{$item->name}}</option>
      @endforeach
    </select><br>
  </div>
  <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }} col-md-10">
    <label for="inputState">Descripcion</label>
    <textarea class="form-control" rows="3" name="description" type="text" id="name" value="" minlength="1" maxlength="255" required="true" placeholder="Enter name here..."></textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}col-md-3">
    <label for="inputState">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email">
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} col-md-3">
    <label for="inputState">Phone</label>
    <input type="number" class="form-control" id="inputPassword4" name="phone">
    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
  </div>
  <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }} col-md-4">
    <label for="inputState">Ubicacion</label>
    <input type="text" class="form-control" id="inputPassword4" name="location">
    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
  </div>
</div>

@section('script')
  <script >
    $(document).ready(function() {
      $('.js-example-basic-single').select2();
    });
  </script>
@endsection
