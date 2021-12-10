<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_usuario',
        'titulo',
        'autor',
        'data_publicacao',
        'data_atualizacao',
        'texto',
        'url_img',
    ];
}
