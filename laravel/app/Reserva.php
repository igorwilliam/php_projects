<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
  protected $fillable = ['user_id','recurso_id','data'];
}
