<?php

namespace App\Repositories;

use App\Models\AsignaCarrera;
use App\Repositories\BaseRepository;

/**
 * Class AsignaCarreraRepository
 * @package App\Repositories
 * @version January 13, 2023, 10:53 pm UTC
*/

class AsignaCarreraRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'usu_id',
        'car_id',
        'asc_fecha',
        'asc_observaciones'
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
        return AsignaCarrera::class;
    }
}
