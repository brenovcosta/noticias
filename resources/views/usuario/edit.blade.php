@extends('adm.layout')
@section('content')
    @if ($u = Session::get('login'))
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editanto Produto</h6>
    </div>
    <div class="card-body">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuario.update',$usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong>
                        <input type="text" name="nome" value="{{ $usuario->nome }}" class="form-control" placeholder="Nome">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Usuário:</strong>
                        <input type="text" name="usuario" value="{{ $usuario->usuario }}" class="form-control" placeholder="Usuario">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Senha:</strong>
                        <input type="password" name="senha" value="{{ $usuario->senha }}" class="form-control" placeholder="Senha">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-right">Atualizar</button>
                <a class="btn btn-danger float-left" href="{{ route('usuario.index') }}"> Cancelar</a>
                </div>
            </div>

        </form>


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
