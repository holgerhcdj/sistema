<?php

namespace App\Repositories;

use App\Models\Carreras;
use App\Repositories\BaseRepository;

/**
 * Class CarrerasRepository
 * @package App\Repositories
 * @version January 13, 2023, 9:53 pm UTC
*/

class CarrerasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'car_siglas',
        'car_nombre',
        'car_estado'
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
        return Carreras::class;
    }
}
