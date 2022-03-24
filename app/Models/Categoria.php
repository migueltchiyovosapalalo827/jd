<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'descricao',
    ];

    public function artigos()
    {
        # code...
        return $this->hasMany(Artigo::class);
    }

    public function blogs()
    {
        # code...
        return $this->hasMany(Blog::class);
    }

}
