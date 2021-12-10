@extends('adm.layout')
@section('content')
    @if ($u = Session::get('login'))
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Visualizar Usuário</h6>
    </div>
    <div class="card-body">



    <div class="row">

        <table class="table table-bordered">

            <tr>
                <td>
                    <strong>Nome:</strong>
                    {{ $usuario->nome }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Usuário:</strong>
                    {{ $usuario->usuario }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Senha:</strong>
                    ---
                </td>
            </tr>

        </table>

    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('usuario.index') }}"> Voltar</a>
            </div>
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
