<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Carreras
 * @package App\Models
 * @version January 13, 2023, 9:53 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $users
 * @property string $car_siglas
 * @property string $car_nombre
 * @property integer $car_estado
 */
class Carreras extends Model
{
    public $table = 'carreras';
    protected $primaryKey='car_id';
    public $timestamps=false;
    

    public $fillable = [
        'car_siglas',
        'car_nombre',
        'car_estado'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'car_id' => 'integer',
        'car_siglas' => 'string',
        'car_nombre' => 'string',
        'car_estado' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'car_siglas' => 'required|string|max:3|min:3',
        'car_nombre' => 'required|string|max:100',
        'car_estado' => 'required|integer'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class, 'asigna_carreras');
    }
}
