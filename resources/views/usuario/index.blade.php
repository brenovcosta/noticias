@extends('adm.layout')
@section('content')
    @if ($u = Session::get('login'))

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Cadastro de Usuarios</h6>


    </div>
    <div class="card-body">
    <div class="row" >
        <div class="col-lg-12 margin-tb">

                                <a class="btn btn-success float-right" href="{{ route('usuario.create') }}"> Novo Usuario</a>

        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <!-- tabela padrão para ser gerada o datatable -->
    <table id="yajra-datatable" class="table table-bordered yajra-datatable">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Usuário</th>
                <th>Ação</th>
            </tr>
        </thead>

        <tbody>
        </tbody>
    </table>

    <!-- inclusão do datatablles, também é necessário o jquery, mas como já iserimos antes, não vamos inserir -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>



    <!-- script de GERAÇÃO do datatable -->
    <script type="text/javascript">
        $(function () {

        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: false,
            ajax: "{{ route('usuarios.ajax') }}",
            language: {
                url: 'http://cdn.datatables.net/plug-ins/1.11.3/i18n/pt_br.json'
            },
            columns: [
                {data: 'nome', name: 'Nome', orderable: true, searchable: true},
                {data: 'usuario', name: 'Usuário', orderable: false, searchable: true},
                {
                    data: 'action',
                    name: 'Ação',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        });
  </script>


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
