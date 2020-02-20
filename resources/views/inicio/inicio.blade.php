@extends('layouts/dashboardmaster')

@section('contentdashboard')

        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        Você está logado.

@endsection
