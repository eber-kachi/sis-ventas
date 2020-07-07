@extends('layouts.form')

@section('title','Inicio de Sesion')
@section('subtitle','Ingresa tus datos para iniciar sesion')


@section('content')
<div class="container mt--9 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
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
                <strong>Error!</strong> {{$errors->first()}}
              </div>
              @endif
              <form role="form" method="POST" action="{{ route('login') }}">
              @csrf
              
              <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" id="email" type="email"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contraseña" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input name="remember" class="custom-control-input" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Recordar sesion</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Ingresar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
            @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
              <small>{{ __('¿Olvidaste tu contraseña?') }}</small>
              </a>
            @endif
            </div>
            <div class="col-6 text-right">
              <a href="{{ route('register') }}" class="text-light">
                  <small>Crear nueva cuenta</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
