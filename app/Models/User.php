<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'programa_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->username;
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst($value);
    }

    public function convocatorias(){
        return $this->hasMany(Convocatoria::class);
    }

    public function programa(){
        return $this->belongsTo(Programa::class,'programa_id');
    }

    public function programaCol(){
        return $this->belongsTo(Programa::class,'programa_id');
    }

    public function proyecto(){
        return $this->hasMany(Proyecto::class);
    }


    public function colaborador(){
        return $this->belongsTo(Colaborador::class);
    }

}
