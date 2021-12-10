@extends('adm.layout')
@section('content')
    @if ($u = Session::get('login'))
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <br>
            <div class="pull-left">
                <h2>Adicionar Texto pricipal</h2>
            </div>
            <br> <br>
        </div>
    </div>

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


    <form action="{{ route('texto.store') }}" method="POST" class="container was-validated" enctype="multipart/form-data" novalidate="">
        @csrf

        <div class="row">
            <div class="form-row col-xs-12 col-sm-12 col-md-12">
                <div class="form-group col-md-6">
                    <strong >Usuário:</strong> <br>
                    <select id="is_usuario" name="id_usuario" class="form-control is-valid" required>
                        <option> Selecione um usuário </option>
                        @if(!is_null($usuario))
                            @foreach ($usuario as $key => $value)
                                <option value="{{ $value->id }}"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp {{ $value->usuario }} &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp </option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Título:</strong>
                <input type="text" name="titulo" class="form-control is-valid" placeholder="Insira o título" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <br>
                <strong>Autor:</strong>
                <input type="text" name="autor" class="form-control is-valid" placeholder="Insira o autor" required>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <br>
                    <strong>Texto principal:</strong>
                    <textarea type="text" name="texto" style="height:150px" class="form-control is-valid" placeholder="Insira o texto" required></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Imagem:</strong>
                <div class="form-group col-md-6">
                    <input type="file" class="form-control wd custom-file-input" id="url_img" name="url_img" required>
                    <label class="custom-file-label" for="url_img">Escoher um arquivo</label>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-danger float-right">Adicionar</button>
                <a class="btn btn-danger float-left" href="{{ route('texto.index') }}"> Cancelar</a>
            </div>
        </div>

    </form>

    @else
        <div class="card align-content-center">
            <h3>Para acessar os recursos da aplicação, efetue o login.</h3>
            <div class="">
                <a class="btn btn-success float-left" href="/adm">Ir para página de login.</a>
            </div>
        </div>
    @endif
@endsection
