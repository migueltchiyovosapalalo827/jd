<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigocertifico extends Model
{
    use HasFactory;
    protected $fillable = ['titulo','Autores','ano','editora','url','volume'];


}


