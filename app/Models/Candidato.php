<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = array('nome',	'email','profissao','telefone','pais','nivelacademico','user_id','ni');

    public function formacoes()
    {
        # code...
        return $this->belongsToMany(Formacao::class,'formacaoscandidatos')->withPivot('estado');
    }
     public function user()
     {
         # code...
         return $this->belongsTo(User::class);
     }
}
