@extends('adm.layout')
@section('content')
@if ($u = Session::get('login'))
<link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>

<!-- para o calendário aparecer nos cadastros -->
<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />

<!-- mascara -->
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
    $('.mask-cpf').mask('000-000.000-00');
    $('.mask-cnpj').mask('00.000.000/0000-00');
    $('.mask-rg').mask('00.000.000-0');
    $('.mask-cep').mask('00000-000');
    $('.mask-data').mask('00/00/0000');
    $('.mask-placaCarro').mask('AAA-0000');
    $('.mask-horasMinutos').mask('00:00');
    $('.mask-cartao').mask('0000 0000 0000 0000');
</script>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Novo Usuário</h6>
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


<form class="was-validated" action="{{ route('usuario.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="form-row col-xs-12 col-sm-12 col-md-12">
            <div class="form-group col-md-12">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control is-valid" placeholder="Entre com o nome" required>

            </div>
        </div>
        <div class="form-row col-xs-12 col-sm-12 col-md-12">

                <div class="form-group col-md-6 ">
                    <strong>usuario:</strong>
                    <input type="text" name="usuario" class="form-control is-valid" placeholder="Entre com o nome de usuario" required>
                </div>

                <div class="form-group col-md-6 ">
                    <strong>Senha:</strong>
                    <input type="password" name="senha" class="form-control is-valid" placeholder="Entre com a senha" required>
                </div>

        </div>




    </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-right">Inserir</button>
                <a class="btn btn-danger float-left" href="{{ route('usuario.index') }}"> Cancelar</a>
        </div>
        <div class="col-lg-12 margin-tb">
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
