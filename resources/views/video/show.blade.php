@extends('adm.layout')
@section('content')
    @if ($u = Session::get('login'))

    <div class="row">
        <div class="col-lg-12 margin-tb" >
            <br>
            <div class="pull-left">
                <h2>Visualizar Vídeo</h2>
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

    <form method="POST">
        @csrf

        <div class="row" style="align-content: center">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Título:</strong>
                    <input type="text" name="titulo" value="{{ $video->titulo }}" class="form-control is-valid" placeholder="Insira o novo título" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descrição:</strong>
                    <input type="text" name="autor" value="{{ $video->descricao }}" class="form-control is-valid" placeholder="Insira o novo autor" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Url do Vídeo':</strong>
                    <input type="text" name="texto" value="{{ $video->url_video }}" class="form-control is-valid" placeholder="Insira o novo texto" disabled>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <a class="btn btn-danger float-left" href="{{ route('video.index') }}">Voltar</a>
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
