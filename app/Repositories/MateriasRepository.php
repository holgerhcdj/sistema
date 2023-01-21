<?php

namespace App\Repositories;

use App\Models\Materias;
use App\Repositories\BaseRepository;

/**
 * Class MateriasRepository
 * @package App\Repositories
 * @version January 13, 2023, 9:52 pm UTC
*/

class MateriasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'mat_descripcion',
        'mat_area',
        'mat_estado'
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
        return Materias::class;
    }
}
