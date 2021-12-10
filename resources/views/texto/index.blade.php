@extends('adm.layout')
@section('content')
    @if ($u = Session::get('login'))
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-14 margin-tb">
            <div class="pull-left">
                <h2>Texto principal</h2>
            </div>
            <br> <br>
            <div class="pull-right">
                <a class="btn btn-danger" href="{{ route('texto.create') }}">Texto +</a>
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
            <th>Usuário</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Imagem</th>
            <th>Texto</th>
            <th>Ação</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr>
                <td>
                    @foreach ($usuario as $user)
                        @if ($user->id == $value->id_usuario)
                            {{ $user->usuario }}
                        @endif
                    @endforeach
                </td>
                <td>{{ $value->titulo }}</td>
                <td>{{ $value->autor }}</td>
                <td style="text-aling-last: center"> <img style="aling-self: center" height="50px" width="50px" src="storage/url_img/{{$value->url_img}}"/> </td>
                <td>{{ $value->texto }}</td>
                <td>
                    <form action="{{ route('texto.destroy',$value->id) }}" method="POST">
                        <a class="show btn btn-info btn-sm" href="{{ route('texto.show',$value->id) }}">Listar</a>
                        <a class="edit btn btn-success btn-sm" href="{{ route('texto.edit',$value->id) }}">Editar</a>
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
