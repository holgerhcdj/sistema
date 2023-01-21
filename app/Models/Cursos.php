<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cursos
 * @package App\Models
 * @version January 13, 2023, 9:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $horarios
 * @property string $cur_siglas
 * @property string $cur_descripcion
 * @property integer $cur_numero
 */
class Cursos extends Model
{

    public $table = 'cursos';
    protected $primaryKey='cur_id';
    public $timestamps=false;




    public $fillable = [
        'cur_siglas',
        'cur_descripcion',
        'cur_numero'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cur_id' => 'integer',
        'cur_siglas' => 'string',
        'cur_descripcion' => 'string',
        'cur_numero' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    
    public static $rules = [
        'cur_siglas' => 'required|string|min:3|max:4',
        'cur_descripcion' => 'required|string|max:20',
        'cur_numero' => 'required|integer|min:1|max:10'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function horarios()
    {
        return $this->hasMany(\App\Models\Horario::class, 'cur_id');
    }
}
