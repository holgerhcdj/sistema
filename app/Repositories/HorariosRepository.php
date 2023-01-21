<?php

namespace App\Repositories;

use App\Models\Horarios;
use App\Repositories\BaseRepository;

/**
 * Class HorariosRepository
 * @package App\Repositories
 * @version January 13, 2023, 10:54 pm UTC
*/

class HorariosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'car_id',
        'cur_id',
        'mat_id',
        'usu_id',
        'hor_dia',
        'hor_hora',
        'hor_paralelo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Horarios::class;
    }
}
