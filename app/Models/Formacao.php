<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formacao extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = array('nome','formador','data','descricao','custo','foto');

    public function candidatos()
    {
        # code...
        return $this->belongsToMany(Candidato::class,'formacaoscandidatos')->withPivot('estado');
    }
}
