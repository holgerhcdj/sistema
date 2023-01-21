<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Horarios
 * @package App\Models
 * @version January 13, 2023, 10:54 pm UTC
 *
 * @property \App\Models\AsignaCarrera $asc
 * @property \App\Models\Curso $cur
 * @property \App\Models\Materia $mat
 * @property \App\Models\User $usu
 * @property integer $asc_id
 * @property integer $cur_id
 * @property integer $mat_id
 * @property integer $usu_id
 * @property integer $hor_dia
 * @property integer $hor_hora
 * @property integer $hor_paralelo
 */
class Horarios extends Model
{
    public $table = 'horarios';
    protected $primaryKey='hor_id';
    public $timestamps=false;



    public $fillable = [
        'car_id',
        'cur_id',
        'mat_id',
        'usu_id',
        'hor_dia',
        'hor_hora',
        'hor_paralelo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'car_id' => 'integer',
        'hor_id' => 'integer',
        'cur_id' => 'integer',
        'mat_id' => 'integer',
        'usu_id' => 'integer',
        'hor_dia' => 'integer',
        'hor_hora' => 'integer',
        'hor_paralelo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'car_id' => 'required',
        'cur_id' => 'required',
        'mat_id' => 'required',
        'usu_id' => 'required',
        'hor_dia' => 'required',
        'hor_hora' => 'required',
        'hor_paralelo' => 'required'
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
    public function cur()
    {
        return $this->belongsTo(\App\Models\Curso::class, 'cur_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function mat()
    {
        return $this->belongsTo(\App\Models\Materia::class, 'mat_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usu()
    {
        return $this->belongsTo(\App\Models\User::class, 'usu_id');
    }
}
