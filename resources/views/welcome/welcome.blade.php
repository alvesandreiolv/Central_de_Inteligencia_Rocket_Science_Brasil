@extends('layouts/dashboardmaster')

@section('contentdashboard')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<style type="text/css">

    #sidebarmaster {
        display: none;
    }

    #conteudo {
        width: 100% !important;
        max-width: 100%;
        flex: 0px;
    }

</style>

<div class="container">

    <!-- BLOCO INTRODUÇÃO -->

    <h2>Faça parte do projeto</h2>
    A Rocket Science Brasil é uma comunidade brasileira de entusiastas em astronomia e astronáutica. Atualmente estamos procurando pessoas interessadas em contribuir com o nosso trabalho de divulgação científica, através da criação de conteúdo. Quem sabe você não possui uma vocação para trabalhar com a Internet?

    <!-- BLOCO VIDEO E CADASTRO -->
    <hr>

    <div class="row">
        <div class="col">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/Te2Zm14Sc7Y" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="col">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="formGroupExampleInput">Nome completo</label>
                    <input id="name" type="text" class="bg-aeroblack form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Insira o seu nome completo">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input id="email" type="email" class="bg-aeroblack form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Insira o seu e-mail">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Senha</label>
                    <input id="password" type="password" class="bg-aeroblack form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Insira uma senha">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Repetir senha</label>
                    <input id="password-confirm" type="password" class="bg-aeroblack form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repita a senha">
                    <small id="emailHelp" class="form-text">Por segurança, utilize uma senha totalmente nova.</small>
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary bg-aeroblack">Realizar cadastro</button>
                </div>
            </form>
        </div>

    </div>

    <!-- BLOCO VANTAGENS -->

    <hr>

    <div class="container">
      <div class="row">
        <div class="col">
            <center>
                <h4>Não há pressão</h4>
                Você poderá criar conteúdo apenas quando desejar. Sem cobranças e sem cronogramas. Quando quiser parar, apenas pare.
            </center>
        </div>
        <div class="col">
            <center>
                <h4>Aprenda coisas novas</h4>
                Descubra como é participar de um projeto na Internet junto com outros influenciadores e especialistas.
            </center>
        </div>
        <div class="col">
            <center>
                <h4>Seja um influenciador</h4>
                Já possui um público na Internet ou gostaria de ter? Você sempre será creditado ao máximo pelo seu trabalho. Nós te daremos uma voz.
            </center>
        </div>
    </div>
</div>

</div>

<!-- BLOCO VANTAGENS -->

<hr>

<div class="container">
  <div class="row" style="margin-bottom: 15px;">
    <div class="col">
        <center>
            <h4>O que acontece depois que eu me candidatar?</h4>
            Você receberá um e-mail automático com todas as informações necessárias para que possa criar a sua primeira publicação. Após isso analisaresmos tudo, então caso você seja aceito, você será adicionado em nosso grupo fechado.
        </center>
    </div>
    <div class="col">
        <center>
            <h4>Não sei escrever bem, mas quero postar no site, posso?</h4>
            Depende. Você deverá comunicar o que pretende fazer em nome da Rocket Science Brasil, então precisará provar que sabe fazer isso de forma minimamente decente.
        </center>
    </div>
</div>
<div class="row" style="margin-bottom: 15px;">
    <div class="col">
        <center>
            <h4>Quais obrigações eu terei?</h4>
            A única obrigação que você terá é sempre manter um nível de qualidade decente no conteúdo que for criar. Não há cronogramas, sendo assim, você poderá criar conteúdo apenas quando quiser.
        </center>
    </div>
    <div class="col">
        <center>
            <h4>Gosto de ufologia, posso participar?</h4>
            Nosso trabalho é divulgar ciência, portanto, em nenhuma hipótese endossaremos teorias da conspiração. Caso entenda isso e ainda queira participar, não será problema.
        </center>
    </div>
</div>
<div class="row">
    <div class="col">
        <center>
            <h4>Poderei divulgar meu outro projeto em troca?</h4>
            Temos várias opções de como divulgar projetos parceiros e você sempre será creditado ao máximo pelo seu trabalho. Apesar disso, você não poderá exigir nenhum tipo de divulgação em troca.
        </center>
    </div>
    <div class="col">
        <center>
            <h4>Tenho menos de 18 anos e quero fazer parte, como faço?</h4>
            Não faz. Não aceitamos menores de idade. Ao aplicar, estaremos assumindo que você possui mais de 18 anos.
        </center>
    </div>
</div>
</div>

@endsection
