@extends('adm.layout')
@section('content')
    @if ($u = Session::get('login'))
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tela Inicial</h6>
        </div>
        <div class="card-body">
            @if ($u = Session::get('login'))
                <div class="alert">
                    <p>Usuário logado: {{ $u }}.</p>
                </div>
            @endif
            <div class="row" style="margin-top: 5rem;">
                <div class="col-lg-12 margin-tb">
                    <h2> Bem vindo(a) à Interface Administrativa </h2>
                </div>
            </div>

        </div>
    </div>

    @else
        <div class="card align-content-center">
            <h3>Para acessar os recursos da aplicação, efetue o login.</h3>
            <div class="">
                <a class="btn btn-success float-left" href="/adm">Ir para página de login.</a>
            </div>
        </div>
    @endif
@endsection
