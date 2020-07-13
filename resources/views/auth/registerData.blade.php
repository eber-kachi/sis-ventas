@extends('layouts.form')

@section('title','Finalizar Registro')
@section('subtitle','Ingresa tus datos para registrarte')

@section('content')
  <div class="container mt--8 pb-5">
    <!-- Table -->
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8">
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
            <form role="form" method="POST" action="{{ route('registerData') }}">
              @csrf
              <input type="text" name="name" value="{{$newUser->name}}" hidden>
              <input type="text" name="email" value="{{$newUser->email}}" hidden>
              <input type="text" name="google_id" value="{{$newUser->google_id}}" hidden>

              @csrf
              {{--Phone--}}
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-phone"></i></span>
                  </div>
                  <input class="form-control" placeholder="Telefono" type="text" name="phone" value="{{ old('phone') }}"
                         required autocomplete="phone" maxlength="8">
                </div>
              </div>
              {{-- CI --}}
              <div class="form-group">
                <div class="input-group input-group-alternative mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                  </div>
                  <input class="form-control" placeholder="Carnet de Identidad" type="text" name="ci"
                         value="{{ old('ci') }}" maxlength="7" required autocomplete="ci">
                </div>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary mt-4">Confirmar Registro</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
