<?php

namespace App\Http\Controllers;

use App\Models\Textos;
use Illuminate\Http\Request;

class TextoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $textos =  Textos::all()->first();
        if(!empty($textos)){
            return view('texto.edit',compact('textos'));
        }else{
            echo("<script>alert('Erro ao alterar Texto Princiapl');</script>");
            return view('adm.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Textos  $textos
     * @return \Illuminate\Http\Response
     */
    public function show(Textos $textos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Textos  $textos
     * @return \Illuminate\Http\Response
     */
    public function edit(Textos $textos)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Textos  $textos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Textos $textos)
    {
        #valida,
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'texto' => 'required',
            //'url_img' => 'required',
        ]);

        $fileNameToStore='';
        // verifica que veio um arquivo no campo
        if($request->hasFile('img_texto')){
            $t =  Textos::all()->first();

            //deleta a imagem
            unlink('storage/url_img/'.$t->url_img);

            // pega o path com a extensão
            $filenameWithExt = $request->file('img_texto')->getClientOriginalName();
            // pega somente o nome do arquivo
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // pega somente a extensão do arquivo
            $extension = $request->file('img_texto')->getClientOriginalExtension();
            // Concatenando nome do arquivo com a data para não termos arquivos repetidos
            $fileNameToStore= $filename.'_'.time().'.'.$extension;

            // Upload da imagem para dentro do storage, e ainda pega
            $path = $request->file('img_texto')->storeAs('public/url_img', $fileNameToStore);
        }

        //atualiza video no banco de dados
        Textos::where('id',1)
            -> update(
                [
                    'id_usuario' => $request->id_usuario,
                    'titulo' => $request->titulo,
                    'autor' => $request->autor,
                    'texto' => $request->texto,
                    'url_img' => $fileNameToStore,
                ]);
        return redirect()->route('texto.index')->with('success','Texto Principal alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Textos  $textos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Textos $textos)
    {
        //
    }
}
