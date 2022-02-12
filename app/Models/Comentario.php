<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = array('texto','leitor','data','estado','blog_id');

    public function formacao()
    {
        # code...
        return $this->belongsTo(Blog::class);
    }
}
