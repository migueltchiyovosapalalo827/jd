<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jornai extends Model
{
    use HasFactory;
    protected $fillable  = ['paginas','titulo','nome','ano','tipo','url'];
}
