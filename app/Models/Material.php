<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;



    protected $fillable = ['nome','descricao','documento'];
    public $timestamps = true;

    public function formacao()
    {
        # code...
        return $this->belongsTo(Formacao::class);
    }

}
