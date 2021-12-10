@extends('adm.layout')
@section('content')
    @if ($u = Session::get('login'))

    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-14 margin-tb">
            <div class="pull-left">
                <h2>Notícias</h2>
            </div>
            <br> <br>
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('noticia.create') }}">+ Notícia</a>
            </div>
            <br>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Imagem</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Usuário</th>
            <th>Data de Publicação</th>
            <th>Data de Atualização</th>
            <th>Ação</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
                <td style="text-aling-last: center"> <img style="aling-self: center" height="50px" width="50px" src="storage/img_noticia/{{$value->url_img}}"/> </td>
                <td>{{ $value->titulo }}</td>
                <td>{{ $value->autor }}</td>
                <td>
                    @foreach ($usuario as $user)
                        @if ($user->id == $value->id_usuario)
                            {{ $user->usuario }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $value->data_publicacao }}</td>
                <td>{{ $value->data_atualizacao }}</td>
                <td>
                    <form action="{{ route('noticia.destroy',$value->id) }}" method="POST">
                        <a class="show btn btn-info btn-sm" href="{{ route('noticia.show',$value->id) }}">Listar</a>
                        <a class="edit btn btn-success btn-sm" href="{{ route('noticia.edit',$value->id) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="destroy btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {!! $data->links() !!}

    @else
        <div class="card align-content-center">
            <h3>Para acessar os recursos da aplicação, efetue o login.</h3>
            <div class="">
                <a class="btn btn-success float-left" href="/adm">Ir para página de login.</a>
            </div>
        </div>
    @endif
@endsection
