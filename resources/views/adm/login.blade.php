@extends('adm.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Login</h6>
        </div>
        <div class="card-body">

            @if ($message = Session::get('erro'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <form class="was-validated" action="usuarios_login" method="POST" >
                @csrf

                <div class="row">
                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-12">
                            <strong>Usuario:</strong>
                            <input type="text" name="usuario" class="form-control is-valid" placeholder="Entre com o nome de usuário" required>
                        </div>
                    </div>

                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-12">
                            <strong>Senha:</strong>
                            <input type="password" name="senha" class="form-control is-valid" placeholder="Entre com a senha" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary float-right">Entrar</button>
                    </div>

                </div>

            </form>

        </div>
    </div>
@endsection
