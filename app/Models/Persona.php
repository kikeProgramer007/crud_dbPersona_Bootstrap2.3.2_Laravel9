<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
     use HasFactory;
    protected $fillable = ['id','nombre','edad'];
    public $timestamps = false;         //Desabilitar el timestamps ya que no se esta ocupando
}
