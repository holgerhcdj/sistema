<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Materias
 * @package App\Models
 * @version January 13, 2023, 9:52 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $horarios
 * @property string $mat_descripcion
 * @property string $mat_area
 * @property integer $mat_estado
 */
class Materias extends Model
{
    public $table = 'materias';
    protected $primaryKey='mat_id';
    public $timestamps=false;
    



    public $fillable = [
        'mat_descripcion',
        'mat_area',
        'mat_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'mat_id' => 'integer',
        'mat_descripcion' => 'string',
        'mat_area' => 'string',
        'mat_estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'mat_descripcion' => 'required|string|max:255',
        'mat_area' => 'required|string|max:255',
        'mat_estado' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function horarios()
    {
        return $this->hasMany(\App\Models\Horario::class, 'mat_id');
    }
}
