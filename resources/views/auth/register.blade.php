@extends('layouts.form')

@section('title','Registro')
@section('subtitle','Ingresa tus datos para registrarte')

@section('content')
<div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
          <div class="text-muted text-center mt-2 mb-3"><small>Iniciar Sesion con</small></div>
          <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('img/icons/common/github.svg') }}"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="{{ url('auth/google') }}" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="{{asset('img/icons/common/google.svg') }}"></span>
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            <div class="card-body px-lg-5 py-lg-5">
            @if ($errors->any())
              <div class="alert alert-danger" role="alert">
                <strong>Error!</strong>
                @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
                @endforeach
              </div>
            @endif
              <form role="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" placeholder="Nombre completo" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  </div>
                </div>
                <div class="form-group ">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                  </div>
                </div>
{{--                Phone--}}
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
                    </div>
                    <input class="form-control" placeholder="Telefono" type="text" name="phone" value="{{ old('phone') }}" maxlength="8" required autocomplete="phone">
                  </div>
                </div>
{{--                CI --}}
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                    </div>
                    <input class="form-control" placeholder="Carnet de Identidad" type="text" name="ci" value="{{ old('ci') }}" maxlength="7" required autocomplete="ci">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contraseña" type="password" name="password" required autocomplete="new-password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirmar Contraseña" type="password" name="password_confirmation" required autocomplete="new-password">
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
