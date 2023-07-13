<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    public function convocatorias(){
        return $this->belongsTo(Convocatoria::class);
    }

    public function proyecto(){
        return $this->belongsTo(Proyecto::class, convocatoria_id);
    }
}
