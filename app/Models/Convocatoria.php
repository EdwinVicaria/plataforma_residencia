<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcionCorta',
        'descripcionLarga',
        'imagen',
        'fechalimite'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function proyectos(){
        return $this->hasMany(Proyecto::class);
    }
}
