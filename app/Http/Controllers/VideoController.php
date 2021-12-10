<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Usuario;
use App\Models\Videos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = Usuario::all();
        $data = Videos::latest()->paginate(5);
        return view('video.index', compact('data'), ['usuario' => $usuario])->with('i',(request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Videos::latest()->paginate(5);
        $usuario = Usuario::all();

        return view('video.create', compact('data'), ['usuario' => $usuario]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'url_video' => 'required',
        ]);

        $itens = Videos::create([
            'id_usuario' => $request->id_usuario,
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'url_video' => $request->url_video,
        ]);

        return redirect()->route('video.index')
            ->with('success','Vídedo adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = Videos::all();

        return view('video.show',['video'=>Videos::findOrFail($id), 'usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = Usuario::all();

        return view('video.edit',['video'=>Videos::findOrFail($id), 'usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $video = Videos::findOrFail($id);
        $video->update($request->all());
        $video->update(['data_atualizacao' => Carbon::now(),]);

        return redirect()->route('video.index')
            ->with('success','Vídeo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Videos::findOrFail($id);

        $video->delete();

        return redirect()->route('video.index')
            ->with('success','Vídeo excluído com sucesso!');
    }
}
