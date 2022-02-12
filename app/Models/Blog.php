<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = array('titulo','autor','resumo','conteudo','foto','visualizacao');

    public function comentarios()
    {
        # code...
      return $this->hasMany(Comentario::class);
    }

}
