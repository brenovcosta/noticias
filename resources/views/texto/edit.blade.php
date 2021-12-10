@extends('adm.layout')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Texto Principal</h6>
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

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('erro'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form action="{{ route('texto.update',$textos->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <img style="align-self: center" height="408" width="381" src="../storage/url_img/{{$textos->url_img}}"/>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">

                            <input type="hidden" name="id_usuario" value="{{ $textos->id_usuario }}" placeholder="id_usuario">
                            <strong>Titulo:</strong>
                            <input type="text" name="titulo" value="{{ $textos->titulo }}" class="form-control" placeholder="titulo">
                        </div>
                    </div>
                    <div class="form-row col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group col-md-6 ">

                            <strong>Autor:</strong>
                            <input type="text" name="autor" class="form-control is-valid" placeholder="Entre com nome do autor" value="{{ $textos->autor }}" required>
                        </div>

                        <div class="form-group col-md-6 ">
                            <div><strong>Imagem do texto:</strong></div>
                            <input type="file" class="form-control wd custom-file-input" id="img_texto" name="img_texto" required>
                            <label class="custom-file-label" title="" for="img_texto">Escolher arquivo</label>
                        </div>


                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Texto:</strong>
                            <textarea class="form-control" style="height:150px" name="texto" placeholder="Texto">{{ $textos->texto }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
@endsection
