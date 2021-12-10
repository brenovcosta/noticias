<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Textos;
use App\Models\Videos;
use Illuminate\Http\Request;

class PublicaController extends Controller
{
    public function index()
    {
        //prepara dados para serem usados na view
        $videos =  Videos::all()->first();
        $texto =  Textos::all()->first();
        $noticias =  Noticia::all();

        //chama a view
        return view('index',compact(['videos', 'noticias', 'texto']));

    }

    public function sobre()
    {

        return view('sobre');

    }

    public function contato(){
        return view('contato');
    }

    public function visualizarNoticia(Request $request){
        $noticia = Noticia::where('id', $request->id)->first();
        $noticias =  Noticia::all();

        if (is_null($noticia)){
            return view('404');
        }else{
            return view('noticia', compact('noticia', 'noticias'));
        }
    }

    public function visualizarTextoPrincipal(Request $request){
        $texto = Textos::where('id', $request->id)->first();

        if (is_null($texto)){
            return view('404');
        }else{
            return view('texto', compact('texto'));
        }
    }

}
