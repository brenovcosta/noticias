<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

//importantíssimo adicionar essa biblioteca.
use Yajra\DataTables\DataTables;

class UsuarioController extends Controller
{

    public function paginacaoAjaxDataTables(Request $request){

        if ($request->ajax()) {
            //pego os dados do meu BD
            $data = Usuario::latest()->get();

            //Retorno um objeto Datatables
            return Datatables::of($data)
                //adicionamos a coluna action para incluir os botões
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn =
                    '
                     <form action='.route('usuario.destroy',['usuario' => $row]).' method="POST">
                     <input type="hidden" name="_token" value="'.csrf_token().'" />
                     <input type="hidden" name="_method" value="delete">
                     <a href="'.route('usuario.edit', ['usuario' => $row]).'"  class="edit btn btn-success btn-sm">Edi</a>
                     <a href="'.route('usuario.show', ['usuario' => $row]).'" class="show btn btn-info btn-sm">Ver</a>
                    <button type="submit" class="destroy btn btn-danger btn-sm">Del</button>
                </form>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //pega produtos cadastrados no bd, usando o recurso de paginação do laravel
         $data = Usuario::latest()->paginate(5);

         //retorna a view principal de produtos passando a página de dados com seu limite
         return view('usuario.index',compact('data'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                //retorna a view com o formulário para inserir produtos
                return view('usuario.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validando a necessidade de se ter um nome e a quantidade
        $request->validate([
            'nome' => 'required',
            'usuario' => 'required',
            'senha' => 'required',
        ]);

        //inserindo o registro na tabela
        //Produto::create($request->all());

        //inserindo o registro na tabela
        $itens = Usuario::create([
            'nome' => $request->nome,
            'usuario' => $request->usuario,
            'senha' => $request->senha,
        ]);

        //redirecionando para a view raiz
        return redirect()->route('usuario.index')
                        ->with('success','Usuario criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        return view('usuario.show',compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view('usuario.edit',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {

        #valida, pois existe a necessicade de nome e qtd estarem preenchidos
        $request->validate([
            'nome' => 'required',
            'usuario' => 'required',
            'senha' => 'required',
        ]);

        //atualiza produto no banco de dados
        $usuario->update($request->all());

        //retorna para a página principal
        return redirect()->route('usuario.index')
                        ->with('success','Usuario alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
                //deleta o produto no banco de dados
                $usuario->delete();

                //redireciona para a página inicial do cadastro
                return redirect()->route('usuario.index')
                                ->with('success','Foi um sucesso a deleção!');
    }

    public function login(Request $request){
        $usuario = $request->usuario;
        $senha = $request->senha;

        $u = Usuario::all()->where('usuario', $usuario)->first();
        $sessao_login = [];

        if(!empty($u)){
            if($u->senha == $senha){
                if ($request->session()->has('login')){
                    session(['login' => []]);
                }
                $sessao_login = $u->nome;
                session(['login' => $sessao_login]);

                return redirect('adm_index')->with('success','Usuário '.$u->usuario.' logado!');
            }else{
                return redirect('adm')->with('erro','Senha inválida para o usuário informado!');
            }
        }else{
            return redirect('adm')->with('erro','Usuário não existente na base de dados!');
        }
    }

    public function logout(Request $request){
        if ($request->session()->has('login')){
            session(['login' => []]);
        }
        Session::flush();

        return redirect('adm')->with('success','Sucesso ao efetuar logout!');
    }
}
