<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = array('titulo','foto','resumo','conteudo','autor','data' , 'tipo','visualizacao');


    public function Categoria()
    {
        # code...
        return $this->belongsTo(Categoria::class);
    }

}
