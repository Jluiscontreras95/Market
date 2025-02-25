@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col text-center">
                    <img src="{{asset('image/farma.png')}}" width="250" height="250" alt="">
                    <!-- <h1 class="bg-gradient-primary">Los únicos de los valles</h1> -->
            </div>
        </div>
        <div class="row justify-content-center pt-2 mt-5 m-1">
            <div class="col-md-6 col-sm-8 col-xl-4 col-lg-5 formulario">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group text-center pt-3">
                        <h1 class="text-light">BIENVENIDO</h1>
                    </div>
                    <div class="form-group mx-sm-4 pt-3">
                        <!-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>No es válido el usuario</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mx-sm-4 pb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>No es válida la clave</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col offset-md-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Recuerdame') }}
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn btn-block ingresar">
                                {{ __('Entrar') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection




