@extends('adm.layout')
@section('content')
    @if ($u = Session::get('login'))

    <div class="row">
        <div class="col-lg-12 margin-tb" >
            <br>
            <div class="pull-left">
                <h2>Editar Notícia</h2>
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

    <form action="{{ route('video.update',$video->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row" style="align-content: center">
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
                <div class="form-group">
                    <strong>Título:</strong>
                    <input type="text" name="titulo" value="{{ $video->titulo }}" class="form-control is-valid" placeholder="Insira o novo título" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    <input type="text" name="descricao" value="{{ $video->descricao }}" class="form-control is-valid" placeholder="Insira o novo autor" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Link do Vídeo:</strong>
                    <input type="text" name="url_video" value="{{ $video->url_video }}" class="form-control is-valid" placeholder="Insira o novo texto" required>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-danger float-right">Atualizar</button>
                <a class="btn btn-danger float-left" href="{{ route('video.index') }}"> Cancelar</a>
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
