<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Carbon\Carbon;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Noticia::latest()->paginate(5);
        $usuario = Usuario::all();

        return view('noticia.index', compact('data'), ['usuario' => $usuario])->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $data = Noticia::latest()->paginate(5);
        $usuario = Usuario::all();

        return view('noticia.create', compact('data'), ['usuario' => $usuario]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('img_noticia')){
            $filenameWithExt = $request->file('img_noticia')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img_noticia')->getClientOriginalExtension();
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            $path = $request->file('img_noticia')->storeAs('public/img_noticia', $fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.png';
        }

        $request->validate([
            'titulo' => 'required',
            'texto' => 'required',
            'autor' => 'required',
            'img_noticia' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $itens = Noticia::create([
            'id_usuario' => $request->id_usuario,
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'texto' => $request->texto,
            'data_publicacao' => Carbon::now()->toDateTimeString(),
            'data_atualizacao' => Carbon::now()->toDateTimeString(),
            'url_img' => $fileNameToStore
        ]);

        return redirect()->route('noticia.index')
            ->with('success','Notícia adicionada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Usuario::all();

        return view('noticia.show',['noticia'=>Noticia::findOrFail($id), 'usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $usuario = Usuario::all();

        return view('noticia.edit',['noticia'=>Noticia::findOrFail($id), 'usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $noticia = Noticia::findOrFail($id);
        $noticia->update($request->all());
        $noticia->update(['data_atualizacao' => Carbon::now(),]);

        return redirect()->route('noticia.index')
            ->with('success','Notícia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);

        unlink('storage/img_noticia/'.$noticia->url_img);

        $noticia->delete();

        return redirect()->route('noticia.index')
            ->with('success','Notícia excluída com sucesso!');
    }
}
