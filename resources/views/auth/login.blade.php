<x-layout>
    <x-slot name='title'>FastSales - {{ __('Entrar') }}</x-slot>

<div class="container-fluid">
    <div class=" d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card card_login">
                <div class="card-header letra_dark">{{ __('Entrar') }}</div>

                <div class="card-body">
                    <form method="POST" class="mi_form" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end letra_dark">{{ __('Email') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{__($message)}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end letra_dark">{{ __('Contraseña') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{__($message)}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label letra_recordar" for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="mi_boton me-3">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="col-md-12 offset-md-4">
                                @if (Route::has('password.request'))
                                    <a class="letra_dark" href="{{ route('password.request') }}">
                                        {{ __('Has olvidado tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</x-layout>
