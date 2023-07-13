<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'fechainicio',
        'fechafinal',
        'objetivo',
        'resumen',
        'participantes',
        'lugar',
        'costo',
        'user_id',
        'convocatoria_id',
        'colaborador_id',
        'status',
    ];


    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function convocatoria(){
        return $this->belongsTo(Convocatoria::class, 'convocatoria_id');
    }

    public function cols(){
        return $this->belongsTo(User::class, 'colaborador');
    }

    public function usersCol(){
        return $this->belongsTo(User::class, 'colaborador_id');
    }
}
