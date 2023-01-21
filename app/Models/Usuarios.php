<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Usuarios
 * @package App\Models
 * @version January 13, 2023, 5:55 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $carreras
 * @property \Illuminate\Database\Eloquent\Collection $horarios
 * @property string $name
 * @property string $email
 * @property string $cedula
 * @property string $phone
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property integer $status
 * @property integer $perfil
 * @property string $remember_token
 */
class Usuarios extends Model
{


    public $table = 'users';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    public $fillable = [
        'name',
        'email',
        'cedula',
        'phone',
        'email_verified_at',
        'password',
        'status',
        'perfil',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'cedula' => 'string',
        'phone' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'status' => 'integer',
        'perfil' => 'integer',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
        // 'cedula' => 'required|string|unique:users'
                // 'email' => ['required', 'email', 'unique:users,email'],
    public static $rules = [
        
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function carreras()
    {
        return $this->belongsToMany(\App\Models\Carrera::class, 'asigna_carreras');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function horarios()
    {
        return $this->hasMany(\App\Models\Horario::class, 'usu_id');
    }
}
