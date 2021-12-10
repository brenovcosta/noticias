<?php

namespace Database\Seeders;

use App\Models\Noticia;
use App\Models\Usuario;
use App\Models\Videos;
use Illuminate\Database\Seeder;
use Psy\Util\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        factory(10)->create();
        $usuario = Usuario::create([
           'nome'=> 'Breno',
           'usuario'=> 'breno',
           'senha'=> '1234',
        ]);

        $video = Videos::create([
            'id_usuario' => 1,
            'titulo' => 'ABC',
            'descricao' => 'DEFG',
            'url_video' => 'n3kC0l9UfeM'
        ]);

//        Usuario::factory()
//            ->count(50)->create();
//
//        Noticia::factory()
//            ->count(50)->create();
    }
}
