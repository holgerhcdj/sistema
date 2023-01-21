<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AsignaCarrera
 * @package App\Models
 * @version January 13, 2023, 10:53 pm UTC
 *
 * @property \App\Models\Carrera $car
 * @property \App\Models\User $usu
 * @property \Illuminate\Database\Eloquent\Collection $horarios
 * @property integer $usu_id
 * @property integer $car_id
 * @property string $asc_fecha
 * @property string $asc_observaciones
 */
class AsignaCarrera extends Model
{

    public $table = 'asigna_carreras';
    protected $primaryKey='asc_id';
    public $timestamps=false;
    
    public $fillable = [
        'usu_id',
        'car_id',
        'asc_fecha',
        'asc_observaciones'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'asc_id' => 'integer',
        'usu_id' => 'integer',
        'car_id' => 'integer',
        'asc_fecha' => 'date',
        'asc_observaciones' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'usu_id' => 'required',
        'car_id' => 'required',
        'asc_observaciones' => 'nullable|string|max:255'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function car()
    {
        return $this->belongsTo(\App\Models\Carrera::class, 'car_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usu()
    {
        return $this->belongsTo(\App\Models\User::class, 'usu_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function horarios()
    {
        return $this->hasMany(\App\Models\Horario::class, 'asc_id');
    }
}
