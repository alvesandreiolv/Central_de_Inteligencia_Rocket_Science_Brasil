@extends('layouts/loginmaster')

@section('content')

<div class="text-center personallogincardcentralizer vertical-center">

    <div class="card bg-aeroblack" style="width: 100%; max-width: 400px;">

        <a href="{{ route('welcome') }}"><img src="{{asset('public/images/assets/centrallogo.png')}}" width="180" height="180" style="margin-top: 1.25rem;"></a>

        <!--<div class="card-header" style="padding-top: 5px;">Para acessar o painel, faça o login abaixo:</div>-->

        <div class="card-body " style="padding-top: 0.25rem;">

            <form method="POST" class="form-signin" action="{{ route('login') }}" style="padding-bottom: 0px;">
                @csrf

                <span style="float: left;">Email:</span>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror bg-aeroblack mb-2" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert" >
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <span style="float: left;">Senha:</span>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror bg-aeroblack " placeholder="Senha" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <button class="btn btn-primary btn-block bg-aeroblack my-4 mb-4" type="submit">{{ __('Acessar') }}</button>

                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>{{ __('Lembrar acesso') }}

                <br><small>Esqueceu a senha? Entre em contato: neyelson@gmail.com</small>

            </div>

        </div>

    </div>

</form>

@endsection
