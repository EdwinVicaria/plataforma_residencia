<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $fillable = [
        'colaborador',
        'proyecto_id',
    ];

    public function users(){
        $this->hasMany(Proyecto::class);
    }
}
